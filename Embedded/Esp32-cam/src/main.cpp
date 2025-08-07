#include <WiFi.h>
#include "esp_camera.h"
#include <WebServer.h>

// Wi-Fi credentials
// const char* ssid = "Yepes_Wifi_Wi-Fi5";
// const char* password = "haroldflint@@";

// const char* ssid = "Florida-Fi 📶";
// const char* password = "florida$$$";

//const char* ssid = "Aiz";
//const char* password = "zzzzzzzz";

const char* ssid = "Gaviola wifi";
const char* password = "gaviola2024";

// AI Thinker ESP32-CAM pin definitions
#define PWDN_GPIO_NUM     32
#define RESET_GPIO_NUM    -1
#define XCLK_GPIO_NUM      0
#define SIOD_GPIO_NUM     26
#define SIOC_GPIO_NUM     27
#define Y9_GPIO_NUM       35
#define Y8_GPIO_NUM       34
#define Y7_GPIO_NUM       39
#define Y6_GPIO_NUM       36
#define Y5_GPIO_NUM       21
#define Y4_GPIO_NUM       19
#define Y3_GPIO_NUM       18
#define Y2_GPIO_NUM        5
#define VSYNC_GPIO_NUM    25
#define HREF_GPIO_NUM     23
#define PCLK_GPIO_NUM     22  

WebServer server(80);

// MJPEG Stream for web browsers
void handleStream() {
  WiFiClient client = server.client();
  String response = "HTTP/1.1 200 OK\r\n";
  response += "Access-Control-Allow-Origin: *\r\n";
  response += "Content-Type: multipart/x-mixed-replace; boundary=frame\r\n\r\n";
  server.sendContent(response);

  Serial.println("Streaming started...");

  while (client.connected()) {
    camera_fb_t *fb = esp_camera_fb_get();
    if (!fb) {
      Serial.println("Camera capture failed");
      continue;
    }

    client.printf("--frame\r\n");
    client.printf("Content-Type: image/jpeg\r\n");
    client.printf("Content-Length: %d\r\n\r\n", fb->len);
    client.write(fb->buf, fb->len);
    client.printf("\r\n");

    esp_camera_fb_return(fb);
    delay(50);  // ~20 FPS
  }

  Serial.println("Client disconnected.");
}

// One-shot snapshot (for download)
void handleCapture() {
  camera_fb_t *fb = esp_camera_fb_get();
  if (!fb) {
    server.send(500, "text/plain", "Camera capture failed");
    return;
  }

  server.sendHeader("Access-Control-Allow-Origin", "*");
  server.send_P(200, "image/jpeg", (const char *)fb->buf, fb->len);
  esp_camera_fb_return(fb);
  Serial.println("Snapshot sent from /capture.");
}

// LCD fetch handler (one frame per request)
void handleStream2() {
  camera_fb_t *fb = esp_camera_fb_get();

  if (!fb) {
    server.send(500, "text/plain", "Camera capture failed");
    Serial.println("Capture failed in /stream2 endpoint.");
    return;
  }

  WiFiClient client = server.client();

  client.print("HTTP/1.1 200 OK\r\n");
  client.print("Access-Control-Allow-Origin: *\r\n");
  client.print("Content-Type: image/jpeg\r\n");
  client.print("Content-Length: ");
  client.print(fb->len);
  client.print("\r\n\r\n");
  client.write(fb->buf, fb->len);

  esp_camera_fb_return(fb);
  Serial.println("Sent one frame to /stream2.");
}

// Root HTML page
void handleRoot() {
  String html = "<html><body><h1>ESP32-CAM Stream</h1>";
  html += "<h2>Live MJPEG Stream</h2>";
  html += "<img src=\"/stream\" width=\"640\" height=\"480\"><br><br>";
  html += "<h2>Snapshot</h2>";
  html += "<img src=\"/frame.jpg\" width=\"640\" height=\"480\" style=\"border:1px solid #000;\"><br>";
  html += "</body></html>";
  server.send(200, "text/html", html);
  Serial.println("Root page served.");
}

void startCamera() {
  camera_config_t config;
  config.ledc_channel = LEDC_CHANNEL_0;
  config.ledc_timer = LEDC_TIMER_0;
  config.pin_d0 = Y2_GPIO_NUM;
  config.pin_d1 = Y3_GPIO_NUM;
  config.pin_d2 = Y4_GPIO_NUM;
  config.pin_d3 = Y5_GPIO_NUM;
  config.pin_d4 = Y6_GPIO_NUM;
  config.pin_d5 = Y7_GPIO_NUM;
  config.pin_d6 = Y8_GPIO_NUM;
  config.pin_d7 = Y9_GPIO_NUM;
  config.pin_xclk = XCLK_GPIO_NUM;
  config.pin_pclk = PCLK_GPIO_NUM;
  config.pin_vsync = VSYNC_GPIO_NUM;
  config.pin_href = HREF_GPIO_NUM;
  config.pin_sccb_sda = SIOD_GPIO_NUM;
  config.pin_sccb_scl = SIOC_GPIO_NUM;
  config.pin_pwdn = PWDN_GPIO_NUM;
  config.pin_reset = RESET_GPIO_NUM;
  config.xclk_freq_hz = 20000000;
  config.pixel_format = PIXFORMAT_JPEG;

  if (psramFound()) {
    config.frame_size = FRAMESIZE_CIF;
    config.jpeg_quality = 12;
    config.fb_count = 2;
  } else {
    config.frame_size = FRAMESIZE_QVGA;
    config.jpeg_quality = 15;
    config.fb_count = 1;
  }

  esp_err_t err = esp_camera_init(&config);
  if (err != ESP_OK) {
    Serial.printf("Camera init failed with error 0x%x\n", err);
    return;
  }
  Serial.println("Camera initialized successfully.");
}

void setup() {
  Serial.begin(115200);
  Serial.println("Booting...");

  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("\n✅ WiFi connected!");
  Serial.print("📸 MJPEG stream at: http://");
  Serial.println(WiFi.localIP());

  startCamera();

  server.on("/", HTTP_GET, handleRoot);
  server.on("/stream", HTTP_GET, handleStream);       // MJPEG
  server.on("/capture", HTTP_GET, handleCapture);     // one-shot
  server.on("/frame.jpg", HTTP_GET, handleStream2);   // single frame fetch (LCD, external viewers)
  server.begin();

  Serial.println("HTTP server started.");

  // 🔁 Print IP address again
  Serial.print("📶 ESP32-CAM IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  server.handleClient();
}
