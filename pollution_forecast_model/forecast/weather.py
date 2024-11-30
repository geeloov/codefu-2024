from flask import Flask, jsonify
import requests
from datetime import datetime
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route('/get-weather-data')
def get_weather_data():
    response = requests.get("https://wttr.in/Skopje?format=%C")

    if response.status_code == 200:
        weather_condition = response.text.lower()

        if 'rain' in weather_condition:
            weather_type = 'rain'
        elif 'clear' in weather_condition or 'sunny' in weather_condition:
            weather_type = 'sunny'
        else:
            weather_type = 'sunny'
    else:
        weather_type = 'sunny'

    current_hour = datetime.now().hour

    if 19 <= current_hour or current_hour < 5:
        weather_type = 'night'

    return jsonify({"weather": weather_type})


if __name__ == '__main__':
    app.run(debug=True, port=7600)