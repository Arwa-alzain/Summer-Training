#include <WiFi.h>
#include <WebServer.h>
#include <ESP32Servo.h>

// =========================
// WiFi Access Point
// =========================
const char* ssid = "ESP32-Smart-Gate";
const char* password = "12345678";

// =========================
// Pins
// =========================
const int servoPin = 18;
const int greenLED = 26;
const int redLED = 27;

// =========================
// Servo positions
// =========================
const int OPEN_POSITION = 90;
const int CLOSE_POSITION = 0;

// =========================
// Objects
// =========================
Servo myServo;
WebServer server(80);

// =========================
// Web Page
// =========================
String webpage = R"rawliteral(
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ESP32 Smart Gate</title>

  <style>

    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f2f2f2;
      margin-top: 80px;
    }

    h1 {
      color: #333;
    }

    p {
      font-size: 20px;
    }

    button {
      width: 180px;
      padding: 20px;
      margin: 15px;
      font-size: 22px;
      border: none;
      border-radius: 12px;
      color: white;
      cursor: pointer;
    }

    .open {
      background-color: green;
    }

    .close {
      background-color: red;
    }

    button:hover {
      opacity: 0.8;
    }

  </style>

</head>

<body>

  <h1>ESP32 Smart Gate</h1>

  <p>Control the Gate</p>

  <button class="open" onclick="location.href='/open'">
    OPEN
  </button>

  <button class="close" onclick="location.href='/close'">
    CLOSE
  </button>

</body>
</html>
)rawliteral";

// =========================
// OPEN function
// =========================
void handleOpen() {

  myServo.write(OPEN_POSITION);

  digitalWrite(greenLED, HIGH);
  digitalWrite(redLED, LOW);

  server.send(200, "text/html", webpage);
}

// =========================
// CLOSE function
// =========================
void handleClose() {

  myServo.write(CLOSE_POSITION);

  digitalWrite(greenLED, LOW);
  digitalWrite(redLED, HIGH);

  server.send(200, "text/html", webpage);
}

// =========================
// Home page
// =========================
void handleRoot() {

  server.send(200, "text/html", webpage);
}

// =========================
// Setup
// =========================
void setup() {

  Serial.begin(115200);

  // LEDs
  pinMode(greenLED, OUTPUT);
  pinMode(redLED, OUTPUT);

  // Initial state = CLOSED
  digitalWrite(greenLED, LOW);
  digitalWrite(redLED, HIGH);

  // Servo
  myServo.attach(servoPin);
  myServo.write(CLOSE_POSITION);

  // =========================
  // Start ESP32 Access Point
  // =========================

  WiFi.softAP(ssid, password);

  Serial.println();
  Serial.println("================================");
  Serial.println("ESP32 Smart Gate");
  Serial.println("================================");

  Serial.print("WiFi Network: ");
  Serial.println(ssid);

  Serial.print("Password: ");
  Serial.println(password);

  Serial.print("IP Address: ");
  Serial.println(WiFi.softAPIP());

  // =========================
  // Web Server Routes
  // =========================

  server.on("/", handleRoot);
  server.on("/open", handleOpen);
  server.on("/close", handleClose);

  server.begin();

  Serial.println("Web Server Started!");
  Serial.println("================================");
}

// =========================
// Loop
// =========================
void loop() {

  server.handleClient();

}