from flask import Flask, request, jsonify
from tensorflow.keras.models import load_model
import numpy as np
from tensorflow.keras.preprocessing import image
import io
import base64

app = Flask(__name__)

# Load the model
model = load_model('model-028.model.keras', compile=False)
model.compile(optimizer='adam', loss='binary_crossentropy', metrics=['accuracy'])

IMG_WIDTH = 150
IMG_HEIGHT = 150

# Function to preprocess the image
def preprocess_image(img_data):
    img = image.load_img(io.BytesIO(base64.b64decode(img_data)), target_size=(IMG_WIDTH, IMG_HEIGHT))
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)
    img_array = img_array / 255.0  # Normalize the image
    return img_array

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()  # Get JSON data
    image_data = data['image']  # Base64 image string

    img_array = preprocess_image(image_data)  # Preprocess the image

    prediction = model.predict(img_array)  # Get prediction from the model

    if prediction[0][0] > prediction[0][1]:
        result = "The person is wearing a mask."
    else:
        result = "The person is not wearing a mask."
    
    return jsonify({'prediction': result})  # Return result to Laravel

if __name__ == '__main__':
    app.run(debug=True)
