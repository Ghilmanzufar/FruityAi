import sys
import json
import os
# Tambahkan logging untuk mematikan pesan warning yang mengganggu
import logging
logging.getLogger("ultralytics").setLevel(logging.ERROR)

from ultralytics import YOLO

# 1. Pastikan ada gambar yang dikirim
if len(sys.argv) < 2:
    print(json.dumps([])) # Balikin array kosong aja biar gak error
    sys.exit()

image_path = sys.argv[1]

# 2. Cek Model best.pt
# Pastikan script mencari best.pt di folder yang SAMA dengan script ini
script_dir = os.path.dirname(os.path.abspath(__file__))
model_path = os.path.join(script_dir, "best.pt")

if not os.path.exists(model_path):
    # Jika best.pt tidak ada, coba fallback ke yolov8n.pt biar app ga crash
    model_path = "yolov8n.pt" 

try:
    model = YOLO(model_path)
except:
    print(json.dumps([]))
    sys.exit()

# 3. Dictionary Penerjemah (Sesuaikan dengan label Roboflow Anda)
# Update bagian ini di detect.py
translation_map = {
    # Buah Umum
    "pisang": "banana",
    "alpukat": "avocado",
    "jeruk": "orange",
    "apel": "apple",
    "mangga": "mango",
    "semangka": "watermelon",
    "pepaya": "papaya",
    "nanas": "pineapple",
    "strawberry": "strawberry",
    
    # Buah Eksotis / Lokal Indonesia
    "buah naga": "dragonfruit",
    "durian": "durian",
    "nangka": "jackfruit",
    "sirsak": "soursop",
    "sukun": "breadfruit",
    "jeruk nipis": "lime",
    "manggis": "mangosteen",
    "salak": "snakefruit",
    "belimbing": "starfruit",
    "rambutan": "rambutan",
    "kelengkeng": "longan",
    "melon": "melon",
    "jambu biji": "guava"
}

# 4. Lakukan Deteksi (PENTING: verbose=False agar tidak nyampah di log)
results = model.predict(image_path, conf=0.25, verbose=False)

detected_items = []
seen_classes = set()

for result in results:
    for box in result.boxes:
        class_id = int(box.cls[0])
        original_name = model.names[class_id].lower().strip()
        confidence = float(box.conf[0])

        # Ambil nama Inggris dari kamus, atau pakai nama asli jika tidak ada di kamus
        final_name = translation_map.get(original_name, original_name)

        if final_name not in seen_classes:
            detected_items.append({
                "name": final_name,
                "confidence": round(confidence * 100, 1)
            })
            seen_classes.add(final_name)

# 5. Output Final (Hanya JSON murni)
print(json.dumps(detected_items))