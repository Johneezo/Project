from flask import Flask, request, jsonify
from flask_cors import CORS
import torch
import random
import json
import re  # For optional extra cleaning

# Assuming the neural network model is in a separate file
from model import NeuralNet
from nltk_utils import bag_of_words, tokenize

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

# Load intents and model data
with open('intents.json', 'r') as json_data:
    intents = json.load(json_data)

FILE = "data.pth"
data = torch.load(FILE)

input_size = data["input_size"]
hidden_size = data["hidden_size"]
output_size = data["output_size"]
all_words = data['all_words']
tags = data['tags']
model_state = data["model_state"]

model = NeuralNet(input_size, hidden_size, output_size).to(device)
model.load_state_dict(model_state)
model.eval()

bot_name = "AI Complaint"

# Optional: text cleaning function
def clean_text(text):
    text = text.lower()                       # Convert to lowercase
    text = re.sub(r'[^\w\s]', '', text)       # Remove punctuation (optional)
    return text.strip()

def get_response(msg):
    msg = clean_text(msg)  # ✅ Normalize the message
    sentence = tokenize(msg)
    X = bag_of_words(sentence, all_words)
    X = X.reshape(1, X.shape[0])
    X = torch.from_numpy(X).to(device)

    output = model(X)
    _, predicted = torch.max(output, dim=1)

    tag = tags[predicted.item()]

    probs = torch.softmax(output, dim=1)
    prob = probs[0][predicted.item()]
    if prob.item() > 0.75:
        for intent in intents['intents']:
            if tag == intent["tag"]:
                return random.choice(intent['responses'])
    
    return "Sorry kindly ask questions or lay complaints related to academics, Examination section will assist..."

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    user_message = data.get("message")
    
    response = get_response(user_message)
    return jsonify({'answer': response})

if __name__ == '__main__':
    app.run(debug=True)
