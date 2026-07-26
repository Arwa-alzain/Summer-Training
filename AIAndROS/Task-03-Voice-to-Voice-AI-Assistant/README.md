# 🎙️ Task-03- Real-Time Voice-to-Voice AI Assistant

A complete, real-time **Voice-to-Voice AI Assistant** built in Python. The assistant listens to human speech via microphone, transcribes audio to text in real-time, processes context-aware responses using Large Language Models (LLM), and synthesizes natural speech output.

---

## 🎬 Project Demo

Watch the assistant in action on YouTube:

[Voice Assistant Demo](https://youtu.be/7JnMkfL2MC8)

---

## 📁 Project Structure

```text
Task-03-Voice-to-Voice-AI-Assistant/
│
├── .env-example            # Template for environment variables
├── .gitignore              # Git ignore rules
├── main.py                 # Main execution script
├── realtimesst.log         # Real-time Speech-to-Text execution logs
├── requirements.txt        # Python dependencies
└── README.md               # Project documentation
```

---

## 🌟 Key Features

- **Real-Time Speech Recognition (STT):** Continuously streams audio input from the microphone with noise cancellation and high transcription accuracy.
- **Intelligent Response Generation (LLM):** Powered by Large Language Models (e.g., Cohere, Hugging Face Hub) for contextual understanding.
- **Text-to-Speech Synthesis (TTS):** Converts generated response text into clear, natural-sounding audio output.
- **Automated Logging:** Saves transcription performance, execution traces, and debugging info directly to `realtimesst.log`.

---

## 🛠️ Prerequisites & Installation

### 1. System Dependencies (PortAudio)

`PyAudio` requires native system audio libraries (`PortAudio`) to interface with your microphone and speakers.

- **macOS:**
  ```bash
  brew install portaudio
  ```
- **Linux (Ubuntu/Debian):**
  ```bash
  sudo apt-get update
  sudo apt-get install portaudio19-dev python3-pyaudio
  ```
- **Windows:**
  PyAudio binaries are usually installed directly through `pip`.

---

### 2. Virtual Environment & Dependencies Setup

1. **Clone this repository to your local machine.**

2. **Create and Activate a Virtual Environment:**
   ```bash
   python3 -m venv venv
   source venv/bin/activate  # On Windows: venv\Scripts\activate
   ```

3. **Install Dependencies:**
   ```bash
   pip install --upgrade pip
   pip install -r requirements.txt
   ```

---

## ⚙️ Environment Configuration

1. **Create `.env` from template:**
   ```bash
   cp .env-example .env
   ```

2. **Configure API Keys in `.env`:**
   ```env
   # Cohere API Key
   COHERE_API_KEY=your_cohere_api_key_here
   ```

---

## 🚀 How to Run

1. Make sure your virtual environment is activated (`source venv/bin/activate`).
2. Run the main application:
   ```bash
   python3 main.py
   ```
3. Speak into your microphone when prompted:
   ```text
   🎙️ المساعد الصوتي يعمل الآن... تحدث في المايك
   ```
4. Check real-time logs in `realtimesst.log` for audio processing details and transcription logs.

---
