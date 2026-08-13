# 🤖 Robot Control System

A web-based robot control system that provides a user-friendly control panel for sending movement commands, converting voice input into text, and storing voice commands in a MySQL database.

## 🌐 Live Demo

**Website:** [Click here to open the Robot Control System](https://arwa-alzain.infinityfree.io/task4/index.html)


## 📌 Project Overview

This project provides a simple web interface for controlling a robot through movement buttons and voice commands.

The system allows the user to:

* Control the robot using directional buttons.
* Convert speech into text using Speech-to-Text.
* Save voice commands to a MySQL database.
* View the current robot state.
* View previously saved voice commands through a Dashboard.
* Navigate easily between the Control Panel and Dashboard.

## ✨ Features

### 🎮 Robot Control Panel

The Control Panel provides five movement commands:

* **Forward**
* **Backward**
* **Left**
* **Right**
* **Stop**

Each button sends a command to the PHP backend, which updates the robot state in the MySQL database.

### 🎤 Speech-to-Text

The system uses the browser's Speech Recognition API to convert spoken commands into text.

The recognized text is displayed on the page and can be saved to the database.

### 🗄️ MySQL Database

The project uses MySQL to store the robot state and voice commands.

#### `robot_state`

Stores the current robot command.

| Value | Command  |
| ----- | -------- |
| `F`   | Forward  |
| `B`   | Backward |
| `L`   | Left     |
| `R`   | Right    |
| `S`   | Stop     |

#### `voice_commands`

Stores the speech-to-text output.

| Field         | Description              |
| ------------- | ------------------------ |
| `id`          | Voice command identifier |
| `text_output` | Converted speech text    |
| `created_at`  | Date and time of saving  |

### 📊 Dashboard

The Dashboard displays:

* Current robot command.
* Last update time.
* Saved voice commands.
* Date and time of each command.
* Refresh button.
* Navigation between the Control Panel and Dashboard.

## 🛠️ Technologies Used

* HTML5
* CSS3
* JavaScript
* PHP
* MySQL
* Web Speech API
* InfinityFree
* phpMyAdmin

## 📂 Project Structure

```text
Robot-Control-System/
│
├── index.html
├── dashboard.php
├── db.php
├── update_command.php
├── get_state.php
├── save_voice.php
└── README.md
```

## ⚙️ Database Setup

Create a MySQL database using the hosting provider's control panel.

Then open **phpMyAdmin → SQL** and run the commands provided in `setup.sql`.

The database contains:

```text
robot_state
voice_commands
```

## 🔐 Database Configuration

Configure `db.php` with your own database credentials:

```php
$host = "YOUR_HOST";
$user = "YOUR_USERNAME";
$pass = "YOUR_PASSWORD";
$dbname = "YOUR_DATABASE_NAME";
```

**Important:** Do not upload real database passwords or private credentials to a public GitHub repository.

## 🚀 How to Use

### Control Panel

Use the directional buttons to send movement commands:

```text
           forward

   right    STOP     left

          Backward
```

### Speech-to-Text

1. Click **Start Recording**.
2. Allow microphone access.
3. Speak your command.
4. Review the converted text.
5. Click **Save Text**.

### Dashboard

Click **📊 Dashboard** to view the current robot state and saved voice commands.

From the Dashboard, click **🎮 Control Panel** to return to the main page.

## 🔄 System Workflow

```text
                 User
                   │
          ┌────────┴────────┐
          │                 │
       Buttons          Microphone
          │                 │
          ↓                 ↓
     JavaScript       Speech-to-Text
          │                 │
          ↓                 ↓
     PHP Backend       Save Voice
          │                 │
          ↓                 ↓
     robot_state      voice_commands
          │                 │
          └────────┬────────┘
                   ↓
              MySQL Database
                   │
                   ↓
               Dashboard
```

## 🌐 Deployment

The project is deployed using InfinityFree for PHP and MySQL hosting.

The project files are uploaded to the `htdocs` directory.

## ⚠️ Notes

* Speech Recognition depends on browser support.
* Google Chrome is recommended for Speech-to-Text.
* Microphone permission must be allowed.
* Database credentials must be configured correctly.
* Do not commit real database credentials to GitHub.

---

## 👩‍💻 Author

**Arwa AlZain**

Computer Science Student

Qassim University

Summer Training Program – 2026
