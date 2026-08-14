# ESP32 Smart Gate – Web Control

A smart gate control system using **ESP32**, **SG90 Servo Motor**, LEDs, and a simple web interface.

The ESP32 works as a **Wi-Fi Access Point**, allowing the user to connect directly to it and control the gate through a web browser.

---

## 🎯 Project Description

The web page contains two buttons:

* 🟢 **OPEN** → Servo moves to 90°, Green LED ON, Red LED OFF.
* 🔴 **CLOSE** → Servo moves to 0°, Red LED ON, Green LED OFF.

The project was first tested and simulated using **Wokwi**, then successfully implemented on the **real ESP32 hardware**.

---

## 🛠️ Components

* ESP32
* SG90 Servo Motor
* Green LED
* Red LED
* 2 Resistors
* Breadboard
* Jumper Wires
* USB Cable

---

## 🔌 Pin Connections

| Component    | ESP32   |
| ------------ | ------- |
| Servo Signal | GPIO 18 |
| Green LED    | GPIO 26 |
| Red LED      | GPIO 27 |
| Servo VCC    | 5V      |
| GND          | GND     |

### Ground Connection

A single **GND pin** from the ESP32 was connected to the breadboard's blue negative rail. The servo and both LEDs were then connected to this common ground rail.

---

## 🌐 Wi-Fi & Web Control

The ESP32 creates its own Wi-Fi network:

```text
Wi-Fi: ESP32-Smart-Gate
Password: 12345678
IP Address: 192.168.4.1
```

After connecting to the ESP32 Wi-Fi, open:

```text
http://192.168.4.1
```

The web page provides **OPEN** and **CLOSE** controls.

---

## ⚙️ How It Works

### OPEN

```text
Servo → 90°
Green LED → ON
Red LED → OFF
```

### CLOSE

```text
Servo → 0°
Green LED → OFF
Red LED → ON
```

The initial state is **CLOSED**.

---

## 💻 Technologies

* ESP32
* Arduino IDE
* C/C++
* HTML & CSS
* Wi-Fi Access Point
* Web Server
* Wokwi

Libraries used:

```cpp
#include <WiFi.h>
#include <WebServer.h>
#include <ESP32Servo.h>
```

---

## 🧪 Wokwi Simulation

The project was first built and tested in Wokwi to verify the circuit, servo movement, LEDs, and web control before using the physical hardware.

🎥 **Wokwi Demo:**
[https://youtu.be/5c1U81HC17I]

---

## 🔧 Real Hardware

After completing the simulation, the same project was uploaded to the physical ESP32 and tested successfully.

🎥 **Real Hardware Demo:**
[https://youtube.com/shorts/4WMi7tFDuLE]

---

## ⚠️ Problems & Solutions

### ESP32 Upload Error

An upload error occurred:

```text
Failed to connect to ESP32:
No serial data received.
```

The USB connection and serial port were checked, and the code was uploaded successfully afterward.

### Servo Wiring

The servo wires did not have suitable connector pins, so jumper wires and the breadboard were used to connect the servo correctly.

### GND Connections

Instead of connecting multiple GND wires directly to the ESP32, one GND connection was connected to the breadboard's blue ground rail and used as the common ground for the components.

---

## ✅ Result

The project was successfully completed in both **Wokwi** and on the **real ESP32**.

The user can control the gate remotely through a web page, while the servo and LEDs respond according to the selected gate state.

---

## 👩‍💻 Author

**Arwa AlZain**

Computer Science Student

Qassim University

Summer Training Program – 2026
