import os
import ssl
import sys
from dotenv import load_dotenv
from gtts import gTTS

# Disable SSL certificate verification for HTTPS requests
ssl._create_default_https_context = ssl._create_unverified_context
os.environ["HF_HUB_DISABLE_SYMLINKS_WARNING"] = "1"

from RealtimeSTT import AudioToTextRecorder 
from langchain_cohere import ChatCohere

load_dotenv()

# Create a Cohere LLM instance with the API key from environment variables
llm = ChatCohere(
    cohere_api_key=os.getenv("COHERE_API_KEY"),
    model="command-r-08-2024",
    temperature=0.7
)

def play_audio_ar(text):
    """دالة تحويل النص إلى صوت وتشغيله مباشرة على الماك"""
    try:
        tts = gTTS(text=text, lang="ar")
        filename = "response.mp3"
        tts.save(filename)
        # afplay is a command-line utility on macOS to play audio files
        os.system(f"afplay {filename}")
        if os.path.exists(filename):
            os.remove(filename)
    except Exception as err:
        print(f"خطأ في تشغيل الصوت: {err}")

def process_audio_and_respond(user_text):
    user_text = user_text.strip()
    if not user_text:
        return

    print(f"\n[المستخدم]: {user_text}")
    print("[المساعد يفكر...]: ", end="", flush=True)

    prompt = f"أنت مساعد صوتي ذكي وسريع. أجب على السؤال التالي بأسلوب إنساني ومختصر جداً (في حدود سطرين):\n{user_text}"
    
    try:
        response = llm.invoke(prompt)
        response_text = response.content if hasattr(response, 'content') else str(response)
        
        print(f"\n[المساعد]: {response_text}")

        # Live audio playback of the response in Arabic
        play_audio_ar(response_text)

    except Exception as e:
        print(f"\nحدث خطأ أثناء معالجة الطلب: {e}")

if __name__ == '__main__':
    print("==============================================")
    print("🎙️ المساعد الصوتي يعمل الآن... تحدث في المايك")
    print("==============================================")

    recorder = AudioToTextRecorder(
        model="small",
        language="ar",
        spinner=True,
        silero_sensitivity=0.4,
        post_speech_silence_duration=0.8,
        compute_type="float32"
    )

    try:
        while True:
            recorder.text(process_audio_and_respond)
    except (KeyboardInterrupt, SystemExit):
        print("\nجاري إيقاف المساعد الصوتي...")
        try:
            recorder.stop()
            recorder.shutdown()
        except Exception:
            pass
        print("تم الإيقاف بنجاح.")
        sys.exit(0)