# 🎯 Task-02- Real-Time White Object Tracking with OpenCV

A real-time Computer Vision script written in Python that detects and tracks white-colored objects via webcam feed using **OpenCV**. It highlights the detected object with a bounding circle, tracks its center point, and draws a smooth motion trail of its recent movement.

---

## 📂 Project Structure

```text
Task-02-Real-Time-White-Object-Tracking-with-OpenCV/
│── tracking.ipynb       # Main Python script for real-time tracking
│── README.md            # Project documentation
└── requirements.txt     # Python dependencies
```

---

## 🎥 Demo Video

Watch the project in action on YouTube:

[Watch the Demo](https://youtu.be/3VcbknhvRkE)

---

## ✨ Features

* **Real-time Color Segmentation:** Uses the **HSV color space** to reliably detect white objects under standard lighting.
* **Noise Reduction:** Applies Gaussian Blur followed by morphological operations (`Erode` & `Dilate`) to eliminate background noise.
* **Contour & Center Detection:** Identifies the largest white contour and calculates its spatial center (centroid) using image moments.
* **Dynamic Motion Trail:** Tracks object movement history up to 32 frames using `collections.deque` and renders a fading motion trajectory line.
* **Dual Display Windows:** Shows the real-time annotated camera feed alongside the binary mask stream.

---

## ⚙️ How It Works

1. **Preprocessing:** Flips the webcam stream horizontally (mirror effect) and applies a $(11 \times 11)$ Gaussian filter.
2. **Color Thresholding:** Converts BGR frames to HSV and filters out white pixels within the defined threshold limits (`[0, 0, 200]` to `[180, 50, 255]`).
3. **Tracking & Visualization:**
   - Finds the largest contour exceeding the minimum radius threshold.
   - Plots a bounding green circle and center point over the object.
   - Appends centroid coordinates to a fixed-length queue to draw the red motion trail.

---

## 👩‍💻 Author

**Arwa AlZain**

Computer Science Student

Qassim University

Summer Training Program – 2026
