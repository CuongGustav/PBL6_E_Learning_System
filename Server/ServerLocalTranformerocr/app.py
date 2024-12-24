import requests
from t import process_image  # Import hàm xử lý từ t.py
from PIL import Image
import time  # Thêm module time để thực hiện delay
from googletrans import Translator
from autocorrect import Speller  # Thư viện kiểm tra lỗi chính tả

# URL endpoints
get_image_url = "https://datasendandreceiverserver.onrender.com/get_image"
delete_image_url = "https://datasendandreceiverserver.onrender.com/delete_image"
send_text_url = "https://datasendandreceiverserver.onrender.com/send_text"

translator = Translator()
spell = Speller(lang='en') 

def initial_run():
    """ Chạy một lần duy nhất các lệnh liên quan đến TensorFlow và PyTorch """
    # Các thông báo từ TensorFlow và PyTorch sẽ tự động xuất hiện khi thư viện được import và sử dụng.
    print("Chạy TensorFlow và PyTorch lần đầu tiên...")

def main():
    """ Hàm chính chạy chương trình """
    try:
        # Gửi yêu cầu lấy ảnh
        response = requests.get(get_image_url)
        
        # Kiểm tra mã trạng thái HTTP
        if response.status_code == 404:
            print("Không có ảnh trên server, chương trình kết thúc.")
            return  # Kết thúc chương trình
        
        response.raise_for_status()  # Kiểm tra các lỗi HTTP khác
        
        # Lưu ảnh vào file
        image_filename = "image.jpg"  # Tên file ảnh
        with open(image_filename, "wb") as file:
            file.write(response.content)
        print(f"Ảnh đã được lưu thành công vào {image_filename}")
        
        # Gửi thông báo thành công
        delete_response = requests.delete(delete_image_url, json={"status": "success"})
        if delete_response.status_code == 200:
            print("Thông báo trạng thái thành công đã được gửi.")

            image = Image.open(image_filename)  # Mở ảnh thành đối tượng PIL.Image
            result_english = process_image(image)

            #Nếu ảnh không có văn bản
            if result_english is None: 
                print("Không tìm thấy văn bản trên ảnh.")
                result_english_none = " "
                result_vietnam_none = " "
                send_text_response = requests.post(send_text_url, json={
                    "english": result_english_none,
                    "vietnamese": result_vietnam_none
                })
                if send_text_response.status_code == 200:
                    print("Kết quả nhận diện văn bản đã được gửi thành công.")
                return

            result_english_corrected = spell(result_english)
            result_vietnamese = translator.translate(result_english, src='en', dest='vi').text
            
            # Gửi cả hai bản dịch tiếng Anh và tiếng Việt
            send_text_response = requests.post(send_text_url, json={
                "english": result_english,
                "vietnamese": result_vietnamese
            })
            if send_text_response.status_code == 200:
                print("Kết quả nhận diện văn bản đã được gửi thành công.")
            else:
                print(f"Lỗi khi gửi kết quả: {send_text_response.status_code} - {send_text_response.text}")
        else:
            print(f"Lỗi khi gửi trạng thái: {delete_response.status_code} - {delete_response.text}")

    except requests.exceptions.RequestException as e:
        print(f"Lỗi trong quá trình thực hiện: {e}")


if __name__ == "__main__":
    initial_run()  # Chạy một lần duy nhất các lệnh TensorFlow và PyTorch
    
    while True:
        main()  # Thực hiện công việc chính
        time.sleep(6)  # Chờ 6 giây trước khi thực hiện lại
