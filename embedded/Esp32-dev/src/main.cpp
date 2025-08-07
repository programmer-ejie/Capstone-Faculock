// Minimal ESP32 fetch and display camera frame on TFT
#include <WiFi.h>
#include <HTTPClient.h>
#include <TFT_eSPI.h>
#include <TJpg_Decoder.h>

const char* ssid = "Florida-Fi 📶";
const char* password = "florida$$$";
TFT_eSPI tft = TFT_eSPI();

#define BUTTON_PIN 14  //button pin ni sija for capture sa frame or image
#define BUZZER_PIN 25 //pin ni sa buzzer
#define MASTER_PIN 13 //pin ni sa inner button para sa overall; master button ni sija always grant access
#define RELAY_PIN 12 //pin ni sa relay para sa door lock


bool captureUserPicture = false;

unsigned long relayStartTime = 0;
bool relayActive = false;


bool tft_output(int16_t x, int16_t y, uint16_t w, uint16_t h, uint16_t *bitmap) {
  tft.pushImage(x, y, w, h, bitmap);
  return true;
}

void beep(int times, int duration) {
  for (int i = 0; i < times; i++) {
    digitalWrite(BUZZER_PIN, HIGH);
    delay(duration);
    digitalWrite(BUZZER_PIN, LOW);
    delay(duration);
  }
}

void captureBeepSuccess() {
  tft.fillScreen(TFT_GREEN);
  beep(3, 50);
}

void captureBeepError() {
   tft.fillScreen(TFT_RED);
  beep(1, 300);
}

void handleOpenRelay() {
  if (!relayActive) {
    digitalWrite(RELAY_PIN, HIGH);
    relayStartTime = millis();
    relayActive = true;
    beep(3, 150);
  } else {
    beep(1, 1000);
  }
}


void setup() {
  Serial.begin(115200);
  tft.init();
  tft.setRotation(1);
  tft.setSwapBytes(true);
  tft.fillScreen(TFT_BLACK);

  pinMode(BUTTON_PIN, INPUT_PULLUP);
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(MASTER_PIN, INPUT_PULLUP);
  pinMode(RELAY_PIN, OUTPUT);

  // Show connecting message
  tft.setTextColor(TFT_WHITE, TFT_BLACK);
  tft.setTextDatum(MC_DATUM);
  tft.drawString("Connecting to WiFi...", tft.width() / 2, tft.height() / 2);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  // Show connected message
  tft.fillScreen(TFT_BLACK);
  tft.drawString("WiFi Connected!", tft.width() / 2, tft.height() / 2);
  delay(1000);
  tft.fillScreen(TFT_BLACK);

  TJpgDec.setCallback(tft_output);
  TJpgDec.setSwapBytes(false);
}

void loop() {

   if (digitalRead(BUTTON_PIN) == LOW) {
    captureUserPicture = true;
    delay(300); // Debounce
  }

  if (digitalRead(MASTER_PIN) == LOW) {
    delay(50);
    if (digitalRead(MASTER_PIN) == LOW) {
      if (!relayActive) {
        digitalWrite(RELAY_PIN, HIGH);
        relayStartTime = millis();
        relayActive = true;
        tft.fillScreen(TFT_GREEN);
        beep(3, 150);
      }
      while (digitalRead(MASTER_PIN) == LOW);
    }
  }

    if (relayActive && millis() - relayStartTime >= 3000) {
      digitalWrite(RELAY_PIN, LOW);
      relayActive = false;
      beep(1, 500);
    }

  if (WiFi.status() != WL_CONNECTED) {
    tft.fillScreen(TFT_BLACK);
    tft.setTextColor(TFT_RED, TFT_BLACK);
    tft.setTextDatum(MC_DATUM);
    tft.drawString("WiFi Disconnected!", tft.width() / 2, tft.height() / 2);
    delay(1000);
    return;
  }

  HTTPClient http;
  http.begin("http://192.168.0.106/frame.jpg"); // or /capture
  int httpCode = http.GET();
  if (httpCode == HTTP_CODE_OK) {
    WiFiClient *stream = http.getStreamPtr();
    const int maxSize = 20000; // Lower buffer for lower quality/speed
    uint8_t *jpgBuffer = (uint8_t *)malloc(maxSize);
    if (jpgBuffer != NULL) {
      int index = 0;
      while (http.connected() && stream->available() && index < maxSize) {
        int c = stream->read();
        if (c < 0) break;
        jpgBuffer[index++] = (uint8_t)c;
      }

      // --- Center the image on the TFT ---
      // Set these to your camera's JPEG output size (e.g., 320x240 for QVGA)
      int jpgWidth = 320;
      int jpgHeight = 240;
      int x = (tft.width() - jpgWidth) / 2;
      int y = (tft.height() - jpgHeight) / 2;
      if (x < 0) x = 0;
      if (y < 0) y = 0;

      TJpgDec.drawJpg(x, y, jpgBuffer, index);

       if (captureUserPicture) { 
            captureUserPicture = false;
            HTTPClient postHttp;
            postHttp.begin("http://192.168.0.105:8000/api/upload_user_picture"); //gamiton and ip address jud sa server or laptop gamit ipconfig
            postHttp.addHeader("Content-Type", "application/octet-stream");
            int postCode = postHttp.POST(jpgBuffer, index);
              tft.fillScreen(TFT_BLACK);
              tft.setTextColor(TFT_WHITE, TFT_BLACK);
              tft.setTextDatum(MC_DATUM);
              tft.drawString("Processing...", tft.width() / 2, tft.height() / 2);

              if (postCode > 0) {
                Serial.println("User picture sent!");
                captureBeepSuccess();
              } else {
                Serial.println("Failed to send user picture!");
                captureBeepError();
              }
            postHttp.end();
          }

            free(jpgBuffer);
          } else {
            tft.fillScreen(TFT_RED);
            tft.setTextColor(TFT_WHITE, TFT_RED);
            tft.setTextDatum(MC_DATUM);
            tft.drawString("Memory Error!", tft.width() / 2, tft.height() / 2);
            delay(1000);
          }
        }
    http.end();
    delay(15); // Faster refresh for smoother video
}