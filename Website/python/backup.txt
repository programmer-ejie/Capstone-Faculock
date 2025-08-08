import sys
import json
import pickle
import numpy as np
from sklearn.metrics.pairwise import cosine_similarity
from keras_facenet import FaceNet
import cv2
from PIL import Image
import os
import io
import logging


os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0' 
logging.getLogger('tensorflow').setLevel(logging.ERROR)


sys.stderr = open(os.devnull, 'w')


sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

try:
   
    embedder = FaceNet()

   
    embeddings_path = '../embeddings/user_embeddings.pkl'
    if 'embedding_db' not in globals():
        if not os.path.exists(embeddings_path):
            raise FileNotFoundError(f"Embeddings file not found: {embeddings_path}")
        with open(embeddings_path, 'rb') as f:
            embedding_db = pickle.load(f)

   
    face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

  
    if len(sys.argv) < 2:
        raise ValueError("Image path argument is missing")

    image_path = sys.argv[1]
    frame = cv2.imread(image_path)

    if frame is None:
        raise ValueError(f"Failed to load image from {image_path}")

   
    frame = cv2.resize(frame, (320, 240)) 

 
    inverted_frame = cv2.flip(frame, 1)

  
    captured_frame_path = '../captured_frames/captured_frame_inverted.png'
    cv2.imwrite(captured_frame_path, inverted_frame)

  
    gray = cv2.cvtColor(inverted_frame, cv2.COLOR_BGR2GRAY)

   
    faces = face_cascade.detectMultiScale(
        gray,
        scaleFactor=1.2,
        minNeighbors=3,   
        minSize=(30, 30) 
    )

    if len(faces) == 0:
        print(json.dumps({'error': 'No faces detected in the image'}))
        sys.exit(0)

    results = []
    for (x, y, w, h) in faces:
       
        face_img = inverted_frame[y:y+h, x:x+w]
        face_pil = Image.fromarray(cv2.resize(face_img, (160, 160))).convert('RGB')

       
        embedding = embedder.embeddings([np.array(face_pil)])[0]

       
        similarities = {name: cosine_similarity([embedding], [ref])[0][0] for name, ref in embedding_db.items()}
        best_match = max(similarities, key=similarities.get)
        confidence = similarities[best_match]

      
        if confidence >= 0.75:
            label = f"{best_match}"
            color = (0, 255, 0) 
        else:
            label = f"Unauthorized ({confidence:.2f})"
            color = (0, 0, 255) 

      
        cv2.rectangle(inverted_frame, (x, y), (x+w, y+h), color, 2)
        cv2.putText(inverted_frame, label, (x, y-10), cv2.FONT_HERSHEY_SIMPLEX, 0.8, color, 2)

       
        results.append({
            'label': label,
            'confidence': float(confidence) 
        })

  
    processed_frame_path = '../captured_frames/processed_frame_inverted.png'
    cv2.imwrite(processed_frame_path, inverted_frame)

   
    print(json.dumps({'prediction': results}))

except Exception as e:
  
    error_log_path = '../logs/python_error.log'
    with open(error_log_path, 'a') as log_file:
        log_file.write(f"Error: {str(e)}\n")
    print(json.dumps({'error': str(e)}))