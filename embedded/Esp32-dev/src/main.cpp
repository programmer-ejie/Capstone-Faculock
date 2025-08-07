#include <WiFi.h>
#include <HTTPClient.h>
#include <TFT_eSPI.h>
#include <TJpg_Decoder.h>

// const char* ssid = "Florida-Fi 📶";
// const char* password = "florida$$$";

const char* ssid = "Gaviola wifi";
const char* password = "gaviola2024";

const char* computer_ip_address = "http://192.168.100.69";

TFT_eSPI tft = TFT_eSPI();

#define BUTTON_PIN 14  // button pin ni sija for capture sa frame or image
#define BUZZER_PIN 25  // pin ni sa buzzer
#define MASTER_PIN 13  // pin ni sa inner button para sa overall; master button ni sija always grant access
#define RELAY_PIN 12   // pin ni sa relay para sa door lock


void setup() {
  Serial.begin(115200);
  pinMode(BUTTON_PIN, INPUT_PULLUP);  // configure as pull-up for better debounce
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(MASTER_PIN, INPUT_PULLUP);
  pinMode(RELAY_PIN, OUTPUT);

  digitalWrite(BUZZER_PIN, LOW);
  digitalWrite(RELAY_PIN, LOW);

  tft.begin();
  tft.setRotation(1);
  tft.fillScreen(TFT_BLACK);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("WiFi connected");
}

// debounce helper
bool isButtonPressed(uint8_t pin) {
  return digitalRead(pin) == LOW;
}

void loop() {
  static bool sent = false;

  if (isButtonPressed(BUTTON_PIN) && !sent) {
    sent = true;
    sendCaptureTrigger();
    tone(BUZZER_PIN, 1000, 100);
    delay(1000);  // wait a bit before allowing another press
  }

  if (!isButtonPressed(BUTTON_PIN)) {
    sent = false;
  }

}

void sendCaptureTrigger() {
    
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(String(computer_ip_address) + "/api/capture");
    http.addHeader("Content-Type", "application/json");

    String payload = "{\"device\": \"esp32\", \"trigger\": true}";
    int httpResponseCode = http.POST(payload);

    if (httpResponseCode > 0) {
      Serial.println("Trigger sent: " + String(httpResponseCode));
    } else {
      Serial.println("Error in sending trigger");
    }

    http.end();
  } else {
    Serial.println("WiFi not connected");
  }
}