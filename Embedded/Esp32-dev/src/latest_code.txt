#include <WiFi.h>
#include <WebServer.h>
#include <HTTPClient.h>
#include <TFT_eSPI.h>
#include <TJpg_Decoder.h>
#include <time.h>

const char* ssid = "Florida-Fi 📶";
const char* password = "florida$$$";

#define STREAM_URL "http://192.168.0.106/stream"  // change to your ESP32-CAM stream URL

#define RELAY_PIN 12
#define BUTTON_PIN 13
#define TRIGGER_BUTTON_PIN 14
#define BUTTON_CHECK_REMAIN 27
#define BUZZER_PIN 25

WebServer server(80);
TFT_eSPI tft = TFT_eSPI();

bool relayActive = false;
unsigned long relayStartTime = 0;
bool triggerFlag = false;
unsigned long remainingSeconds = 0;
bool scheduleReceived = false;
unsigned long lastSecond = 0;
String logBuffer = "";

bool showStream = true;   // Control flag for streaming on TFT

// MJPEG buffer
#define MJPEG_BUFFER_SIZE 30000
uint8_t mjpegBuffer[MJPEG_BUFFER_SIZE];

// Beep function
void beep(int times, int duration) {
  for (int i = 0; i < times; i++) {
    digitalWrite(BUZZER_PIN, HIGH);
    delay(duration);
    digitalWrite(BUZZER_PIN, LOW);
    delay(duration);
  }
}

// Log function
void addLog(String message) {
  String timestamp = "";
  struct tm timeinfo;
  if (getLocalTime(&timeinfo)) {
    char timeStr[20];
    strftime(timeStr, sizeof(timeStr), "%H:%M:%S", &timeinfo);
    timestamp = String(timeStr) + " ";
  }
  logBuffer = timestamp + message + "\n" + logBuffer;
  if (logBuffer.length() > 2000) {
    logBuffer = logBuffer.substring(0, 2000);
  }
  Serial.println(message);
}

// CORS headers for web server
void addCorsHeaders() {
  server.sendHeader("Access-Control-Allow-Origin", "*");
  server.sendHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS");
  server.sendHeader("Access-Control-Allow-Headers", "Content-Type");
}

void handleOptions() {
  addCorsHeaders();
  server.send(204);
}

void handleLogs() {
  addCorsHeaders();
  server.send(200, "text/plain", logBuffer);
}

void handleSetRemainingSeconds() {
  addCorsHeaders();
  if (server.hasArg("plain")) {
    String payload = server.arg("plain");
    addLog("Raw payload: " + payload);
    int startPos = payload.indexOf("remainingSeconds");
    if (startPos >= 0) {
      startPos = payload.indexOf(":", startPos) + 1;
      int endPos = payload.indexOf(",", startPos);
      if (endPos == -1) endPos = payload.indexOf("}", startPos);
      if (endPos > startPos) {
        String secondsStr = payload.substring(startPos, endPos);
        secondsStr.trim();
        remainingSeconds = secondsStr.toInt();
        scheduleReceived = true;
        lastSecond = millis();
        addLog("Remaining seconds set and countdown started: " + String(remainingSeconds));
        server.send(200, "text/plain", "Remaining seconds updated and countdown started: " + String(remainingSeconds));
        return;
      }
    }
    addLog("Failed to parse remaining seconds from: " + payload);
    server.send(400, "text/plain", "Invalid format. Expected {\"remainingSeconds\":123}");
  } else {
    addLog("No data received in setRemainingSeconds");
    server.send(400, "text/plain", "No data received");
  }
}

void handleStartCountdown() {
  addCorsHeaders();
  scheduleReceived = true;
  lastSecond = millis();
  beep(1, 150);
  addLog("Countdown started");
  server.send(200, "text/plain", "Countdown started");
}

void handleDeniedBeep() {
  beep(5, 100);
  showStream = true;
  server.send(200, "text/plain", "Denied beep played");
}

void handleOpenRelay() {
  addCorsHeaders();
  showStream = true;
  if (!relayActive) {
    digitalWrite(RELAY_PIN, HIGH);
    relayStartTime = millis();
    relayActive = true;
    beep(3, 150);
    addLog("Relay activated via web");
    server.send(200, "text/plain", "Relay activated");
  } else {
    addLog("Relay already active");
    beep(1, 1000);
    server.send(200, "text/plain", "Relay already active");
  }
}

void handleProcessDisplay(){
   addCorsHeaders();
   showStream = false;
    addLog("Initiate Process Display");
    server.send(200, "text/plain", "process display");
}

void handleShouldStart() {
  addCorsHeaders();
  server.send(200, "text/plain", triggerFlag ? "1" : "0");
  if (triggerFlag) {
    addLog("Trigger flag sent to client");
    triggerFlag = false;
  }
}

void handleGetRemaining() {
  addCorsHeaders();
  server.send(200, "text/plain", String(remainingSeconds));
  addLog("Remaining seconds requested: " + String(remainingSeconds));
}

// TFT callback for TJpg_Decoder
bool tft_output(int16_t x, int16_t y, uint16_t w, uint16_t h, uint16_t *bitmap) {
  tft.pushImage(x, y, w, h, bitmap);
  return true;
}

// Show processing screen with green background
void displayProcessingScreen() {
  tft.fillScreen(TFT_GREEN);
  tft.setTextSize(3);
  tft.setTextColor(TFT_BLACK, TFT_GREEN);

  String text = "Processing...";
  int16_t textWidth = tft.textWidth(text);
  int16_t x = (tft.width() - textWidth) / 2;
  int16_t y = tft.height() / 2 - (8 * 3) / 2; // approx height = 8 pixels * text size
  tft.setCursor(x, y);
  tft.print(text);
}

// Connect to WiFi
void connectWiFi() {
  tft.fillScreen(TFT_BLACK);
  tft.setTextColor(TFT_WHITE, TFT_BLACK);
  tft.setTextSize(2);

  tft.setCursor(10, tft.height() / 2 - 10);
  tft.println("Connecting to WiFi...");

  Serial.print("Connecting to WiFi...");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  tft.fillScreen(TFT_BLACK);
  tft.setCursor(10, tft.height() / 2 - 10);
  tft.setTextColor(TFT_GREEN, TFT_BLACK);
  tft.println("WiFi Connected!");
  
  tft.setTextSize(1);
  tft.setCursor(10, tft.height() / 2 + 15);
  tft.setTextColor(TFT_YELLOW, TFT_BLACK);
  tft.println(WiFi.localIP().toString());

  Serial.println("\nWiFi connected: " + WiFi.localIP().toString());

  delay(1000);
}

// Fetch and display MJPEG stream frames
void fetchAndDisplayMJPEGStream() {
  HTTPClient http;
  http.begin(STREAM_URL);
  int code = http.GET();

  if (code != HTTP_CODE_OK) {
    addLog("HTTP GET failed with code " + String(code));
    http.end();
    delay(1000);
    return;
  }

  WiFiClient *stream = http.getStreamPtr();

  int mjpegIndex = 0;
  bool capturing = false;

  while (http.connected()) {
    while (stream->available()) {
      char c = stream->read();

      if (!capturing) {
        if (c == (char)0xFF) {
          char c2 = stream->peek();
          if (c2 == (char)0xD8) {
            capturing = true;
            mjpegIndex = 0;
            mjpegBuffer[mjpegIndex++] = (uint8_t)c;
            mjpegBuffer[mjpegIndex++] = (uint8_t)stream->read();
            continue;
          }
        }
      } else {
        mjpegBuffer[mjpegIndex++] = (uint8_t)c;
        if (mjpegIndex > 1 &&
            mjpegBuffer[mjpegIndex - 2] == 0xFF &&
            mjpegBuffer[mjpegIndex - 1] == 0xD9) {
          // Got full JPEG frame, decode and display
          uint16_t imgWidth, imgHeight;
          TJpgDec.getJpgSize(&imgWidth, &imgHeight, mjpegBuffer, mjpegIndex);
          if (imgWidth && imgHeight) {
            int x = (tft.width() - imgWidth) / 2;
            int y = (tft.height() - imgHeight) / 2;
            TJpgDec.drawJpg(x, y, mjpegBuffer, mjpegIndex);
          }
          capturing = false;
          mjpegIndex = 0;
          // Break to allow server handling & button reading
          http.end();
          return;
        }
      }

      if (mjpegIndex >= MJPEG_BUFFER_SIZE) {
        capturing = false;
        mjpegIndex = 0;
      }
    }
    delay(1);
  }

  http.end();
}

// FreeRTOS task to fetch stream or show processing screen
void fetchStreamTask(void * parameter) {
  for (;;) {
    if (showStream) {
      fetchAndDisplayMJPEGStream();
    } else {
      displayProcessingScreen();
      delay(1000);
    }
    vTaskDelay(10 / portTICK_PERIOD_MS); // Small delay to yield to other tasks
  }
}

void setup() {
  Serial.begin(115200);
  pinMode(BUZZER_PIN, OUTPUT);
  digitalWrite(BUZZER_PIN, LOW);
  pinMode(RELAY_PIN, OUTPUT);
  digitalWrite(RELAY_PIN, LOW);
  pinMode(BUTTON_PIN, INPUT_PULLUP);
  pinMode(TRIGGER_BUTTON_PIN, INPUT_PULLUP);
  pinMode(BUTTON_CHECK_REMAIN, INPUT_PULLUP);

  tft.init();
  tft.setRotation(1);
  tft.setSwapBytes(true);
  tft.fillScreen(TFT_BLACK);

  TJpgDec.setCallback(tft_output);
  TJpgDec.setSwapBytes(false);

  connectWiFi();
  configTime(0, 0, "pool.ntp.org", "time.nist.gov");

  // Web server routes
  server.on("/open", HTTP_GET, handleOpenRelay);
  server.on("/shouldStart", HTTP_GET, handleShouldStart);
  server.on("/setRemainingSeconds", HTTP_POST, handleSetRemainingSeconds);
  server.on("/setRemainingSeconds", HTTP_OPTIONS, handleOptions);
  server.on("/startCountdown", HTTP_POST, handleStartCountdown);
  server.on("/startCountdown", HTTP_OPTIONS, handleOptions);
  server.on("/getRemaining", HTTP_GET, handleGetRemaining);
  server.on("/deniedBeep", HTTP_GET, handleDeniedBeep);
  server.on("/logs", HTTP_GET, handleLogs);
  server.on("/processDisplay", HTTP_GET, handleProcessDisplay);
  server.onNotFound([]() {
    addCorsHeaders();
    server.send(404, "text/plain", "Not Found");
  });
  server.begin();

  // Start the fetch stream FreeRTOS task pinned to core 1
  xTaskCreatePinnedToCore(fetchStreamTask, "FetchStreamTask", 16000, NULL, 1, NULL, 1);

  addLog("System started and HTTP server running");
}

void loop() {
  server.handleClient();

  // Button check for relay activation (remainingSeconds mode)
  if (digitalRead(BUTTON_CHECK_REMAIN) == LOW) {
    delay(50);
    if (digitalRead(BUTTON_CHECK_REMAIN) == LOW) {
      if (!relayActive) {
        if (remainingSeconds > 0) {
          digitalWrite(RELAY_PIN, HIGH);
          relayStartTime = millis();
          relayActive = true;
          beep(3, 150);
          addLog("Relay activated (D27) - Remaining: " + String(remainingSeconds) + "s");
        } else {
          addLog("D27 pressed but time expired");
          beep(1, 1000);
        }
      }
      while (digitalRead(BUTTON_CHECK_REMAIN) == LOW);
    }
  }

  // Button check for manual relay activation
  if (digitalRead(BUTTON_PIN) == LOW) {
    delay(50);
    if (digitalRead(BUTTON_PIN) == LOW) {
      if (!relayActive) {
        digitalWrite(RELAY_PIN, HIGH);
        relayStartTime = millis();
        relayActive = true;
        addLog("Relay activated (D13)");
        beep(3, 150);
      }
      while (digitalRead(BUTTON_PIN) == LOW);
    }
  }

  // Button check for trigger button to stop streaming & set flag
  if (digitalRead(TRIGGER_BUTTON_PIN) == LOW) {
    delay(50);
    if (digitalRead(TRIGGER_BUTTON_PIN) == LOW) {
      triggerFlag = true;
      showStream = false;  // Stop streaming to display processing screen
      addLog("Trigger flag set (D14), stream stopped");
      beep(3, 150);
      while (digitalRead(TRIGGER_BUTTON_PIN) == LOW);
    }
  }

  // Auto turn off relay after 3 seconds
  if (relayActive && millis() - relayStartTime >= 3000) {
    digitalWrite(RELAY_PIN, LOW);
    relayActive = false;
    addLog("Relay deactivated after 3 seconds");
    beep(1, 500);
  }

  // Countdown timer update
  if (scheduleReceived) {
    unsigned long currentMillis = millis();
    if (currentMillis - lastSecond >= 1000) {
      lastSecond = currentMillis;
      if (remainingSeconds > 0) {
        remainingSeconds--;
        if (remainingSeconds % 60 == 0 || remainingSeconds < 10) {
          addLog("Time remaining: " + String(remainingSeconds) + "s");
        }
      } else {
        addLog("Schedule time expired");
        beep(2, 1000);
        scheduleReceived = false;
      }
    }
  }
}
