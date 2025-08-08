#include <WiFi.h>
#include <WebServer.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <TFT_eSPI.h>
#include <TJpg_Decoder.h>
#include <time.h>

// const char* ssid = "Demo";
// const char* password = "ejieflorida";

// const char* ssid = "LABTHREE";
// const char* password = "bbbbbbbb";

// const char* ssid = "TUL ED PISO WIFI";
// const char* password = "";

const char* ssid = "Florida-Fi 📶";
const char* password = "florida$$$";

// const char* ssid = "Gaviola wifi";
// const char* password = "gaviola2024";

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

void beep(int times, int duration) {
  for (int i = 0; i < times; i++) {
    digitalWrite(BUZZER_PIN, HIGH);
    delay(duration);
    digitalWrite(BUZZER_PIN, LOW);
    delay(duration);
  }
}

void handleDeniedBeep() {
  beep(5, 100);
  server.send(200, "text/plain", "Denied beep played");
}

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

bool tft_output(int16_t x, int16_t y, uint16_t w, uint16_t h, uint16_t *bitmap) {
  tft.pushImage(x, y, w, h, bitmap);
  return true;
}

// Center and landscape image display
void resizeImage(uint8_t *jpgBuffer, int bufferLength, uint16_t screenWidth, uint16_t screenHeight) {
  uint16_t imgWidth, imgHeight;
  TJpgDec.getJpgSize(&imgWidth, &imgHeight, jpgBuffer, bufferLength);
  if (imgWidth == 0 || imgHeight == 0) {
    addLog("No face detected");
    tft.fillScreen(TFT_BLACK);
    tft.setCursor(10, 10);
    tft.setTextColor(TFT_RED, TFT_BLACK);
    tft.setTextSize(2);
    tft.println("Slow Wifi Connection!");
    return;
  }
  // Center the image
  int x = (tft.width()  - imgWidth)  / 2;
  int y = (tft.height() - imgHeight) / 2;
  TJpgDec.drawJpg(x, y, jpgBuffer, bufferLength);
}

void handleOpenRelay() {
  addCorsHeaders();
  if (!relayActive) {
    digitalWrite(RELAY_PIN, HIGH);
    relayStartTime = millis();
    relayActive = true;
    beep(3, 150);
    addLog("Relay activated via web");
    server.send(200, "text/plain", "Relay activated");\
  } else {
    addLog("Relay already active");
    beep(1, 1000);
    server.send(200, "text/plain", "Relay already active");
  }
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

void fetchAndRenderJPG(const char *url) {
  HTTPClient http;
  http.begin(url);
  int httpCode = http.GET();
  if (httpCode == HTTP_CODE_OK) {
    WiFiClient *stream = http.getStreamPtr();
    const int maxSize = 30000;
    uint8_t *jpgBuffer = (uint8_t *)malloc(maxSize);
    if (!jpgBuffer) {
      addLog("Memory allocation failed");
      return;
    }
    int index = 0;
    while (http.connected() && stream->available() && index < maxSize) {
      int c = stream->read();
      if (c < 0) break;
      jpgBuffer[index++] = (uint8_t)c;
    }
    tft.fillScreen(TFT_BLACK);
    resizeImage(jpgBuffer, index, tft.width(), tft.height());
    free(jpgBuffer);
  } else {
    tft.fillScreen(TFT_BLACK);
    tft.setCursor(10, 60);
    tft.setTextColor(TFT_RED, TFT_BLACK);
    tft.setTextSize(2);
    tft.println("Image load failed");
    addLog("Image fetch failed: " + String(httpCode));
  }
  http.end();
}

// 🔁 Image Fetch Task (FreeRTOS)
void fetchImageTask(void *parameter) {
  for (;;) {
    fetchAndRenderJPG("http://192.168.100.131/frame.jpg");
    vTaskDelay(500 / portTICK_PERIOD_MS);
  }
}

void setup() {
  Serial.begin(115200);
  addLog("System starting...");
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
  tft.setTextColor(TFT_WHITE, TFT_BLACK);
  tft.setTextSize(2);
  tft.setCursor(10, 10);
  tft.println("Connecting WiFi...");

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  addLog("WiFi connected. IP: " + WiFi.localIP().toString());

  configTime(0, 0, "pool.ntp.org", "time.nist.gov");

  TJpgDec.setCallback(tft_output);
  TJpgDec.setSwapBytes(false);

  server.on("/open", HTTP_GET, handleOpenRelay);
  server.on("/shouldStart", HTTP_GET, handleShouldStart);
  server.on("/setRemainingSeconds", HTTP_POST, handleSetRemainingSeconds);
  server.on("/setRemainingSeconds", HTTP_OPTIONS, handleOptions);
  server.on("/startCountdown", HTTP_POST, handleStartCountdown);
  server.on("/startCountdown", HTTP_OPTIONS, handleOptions);
  server.on("/getRemaining", HTTP_GET, handleGetRemaining);
  server.on("/deniedBeep", HTTP_GET, handleDeniedBeep);
  server.on("/logs", HTTP_GET, handleLogs);
  server.onNotFound([]() {
    addCorsHeaders();
    server.send(404, "text/plain", "Not Found");
  });

  server.begin();

 
  xTaskCreatePinnedToCore(
    fetchImageTask, "FetchImage", 10000, NULL, 1, NULL, 1);

  addLog("HTTP server and image task started");
}

void loop() {
  server.handleClient();

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

  if (digitalRead(TRIGGER_BUTTON_PIN) == LOW) {
    delay(50);
    if (digitalRead(TRIGGER_BUTTON_PIN) == LOW) {
      triggerFlag = true;
      addLog("Trigger flag set (D14)");
      beep(3, 150);
      while (digitalRead(TRIGGER_BUTTON_PIN) == LOW);
    }
  }

  if (relayActive && millis() - relayStartTime >= 3000) {
    digitalWrite(RELAY_PIN, LOW);
    relayActive = false;
    addLog("Relay deactivated after 3 seconds");
    beep(1, 500);
  }

  // ⏱ Accurate countdown using millis
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