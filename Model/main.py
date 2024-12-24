# pip install hezar[vision]
# pip install vietocr
from hezar.models import Model
from hezar.utils import load_image
from vietocr.tool.predictor import Predictor
from vietocr.tool.config import Cfg
from PIL import Image

# Cấu hình và khởi tạo VietOCR
config = Cfg.load_config_from_file('config.yml')  # hoặc sử dụng config mặc định nếu cần

config['weights'] = './weights/transformerocr.pth'  # Đường dẫn tới trọng số đã huấn luyện
config['device'] = 'cpu'  # Sử dụng CPU
detector = Predictor(config)

# Tải mô hình CRAFT để phát hiện vùng chứa văn bản
craft_model = Model.load("hezarai/CRAFT")

# Đọc ảnh đầu vào
image_path = "t1.png"
image = load_image(image_path)

# Dự đoán vùng chứa văn bản
outputs = craft_model.predict(image)

# Lấy bounding boxes từ kết quả CRAFT
boxes = outputs[0]["boxes"]

# Hàm nhóm các boxes theo dòng (dựa trên tọa độ `y`)
def group_boxes_by_line(boxes, line_threshold=15):
    lines = []
    boxes = sorted(boxes, key=lambda box: box[1])  # Sắp xếp các hộp theo trục y (chiều dọc)
    
    current_line = [boxes[0]]
    
    for box in boxes[1:]:
        if abs(box[1] - current_line[-1][1]) < line_threshold:  # Nếu box cùng dòng (khoảng cách y nhỏ)
            current_line.append(box)
        else:
            lines.append(current_line)
            current_line = [box]
    
    lines.append(current_line)  # Thêm dòng cuối cùng
    return lines

# Nhóm các boxes theo dòng
grouped_boxes = group_boxes_by_line(boxes)

# Mở ảnh bằng PIL để crop các vùng chứa văn bản
img_pil = Image.open(image_path)

# Mở file để ghi kết quả
with open('output.txt', 'w', encoding='utf-8') as f:
    # Vòng lặp qua từng dòng
    for line_boxes in grouped_boxes:
        # Sắp xếp các box trong từng dòng từ trái qua phải
        line_boxes = sorted(line_boxes, key=lambda box: box[0])  # Sắp xếp theo tọa độ x (trái qua phải)

        # Nhận diện văn bản trong từng box
        line_texts = []
        for box in line_boxes:
            x, y, w, h = box[0], box[1], box[2], box[3]
            cropped_img = img_pil.crop((x, y, x + w, y + h))  # Cắt vùng chứa văn bản

            # Dự đoán văn bản bằng VietOCR
            s = detector.predict(cropped_img, return_prob=False)
            line_texts.append(s)

        # Ghi kết quả của dòng vào file (với các từ cách nhau bằng khoảng trắng)
        f.write(' '.join(line_texts) + '\n')

# In thông báo hoàn thành
print("Nhận diện hoàn thành, kết quả đã được lưu vào output.txt.")
