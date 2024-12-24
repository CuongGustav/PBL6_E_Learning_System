from flask import Flask, render_template, Response
import cv2

app = Flask(__name__)

# Đường dẫn RTSP hoặc HTTP của camera Wi-Fi
CAMERA_URL = 'rtsp://Cuonggustav:Cuongqb137@@192.168.2.30:554/stream1'

def generate_frames():
    cap = cv2.VideoCapture(CAMERA_URL)
    while True:
        success, frame = cap.read()
        if not success:
            break
        else:
            # Mã hóa frame thành JPEG
            _, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()

            # Trả về frame dưới dạng bytes
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == "__main__":
    app.run(debug=True)
