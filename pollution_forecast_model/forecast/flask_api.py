# {
#  "cells": [],
#  "metadata": {
#   "kernelspec": {
#    "display_name": "Python 3",
#    "language": "python",
#    "name": "python3"
#   },
#   "language_info": {
#    "name": "python",
#    "version": "3.12.2"
#   }
#  },
#  "nbformat": 4,
#  "nbformat_minor": 2
# }


# from flask import Flask, jsonify
# import joblib
# import requests
# import pandas as pd
# from datetime import datetime, timedelta

# app = Flask(__name__)

# # Load models and scalers globally
# pm10_model = joblib.load("../models/pm10/xgboost_model.pkl")
# pm10_x_scaler = joblib.load("../scalers/pm10/x_scaler.pkl")
# pm10_y_scaler = joblib.load("../scalers/pm10/y_scaler.pkl")

# pm25_model = joblib.load("../models/pm25/xgboost_model.pkl")
# pm25_x_scaler = joblib.load("../scalers/pm25/x_scaler.pkl")
# pm25_y_scaler = joblib.load("../scalers/pm25/y_scaler.pkl")

# no2_model = joblib.load("../models/no2/xgboost_model.pkl")
# no2_x_scaler = joblib.load("../scalers/no2/x_scaler.pkl")
# no2_y_scaler = joblib.load("../scalers/no2/y_scaler.pkl")

# def get_weather_data(latitude, longitude):
#     url = f"https://api.open-meteo.com/v1/forecast?latitude={latitude}&longitude={longitude}&hourly=temperature_2m,relative_humidity_2m,windspeed_10m"
#     response = requests.get(url)
#     if response.status_code != 200:
#         raise Exception("Error fetching weather data")
#     return response.json()

# def prepare_data(data):
#     hourly_data = {
#         "time": data["hourly"]["time"],
#         "temperature": data["hourly"]["temperature_2m"],
#         "humidity": data["hourly"]["relative_humidity_2m"],
#         "wind_speed": data["hourly"]["windspeed_10m"]
#     }
#     df = pd.DataFrame(hourly_data)
#     df["time"] = pd.to_datetime(df["time"])
#     current_time = datetime.now()
#     next_2_days = current_time + timedelta(days=2)
#     df_next_2_days = df[(df["time"] >= current_time) & (df["time"] <= next_2_days)].copy()
#     df_next_2_days.loc[:, "hour"] = df_next_2_days["time"].dt.hour
#     df_next_2_days.loc[:, "year"] = df_next_2_days["time"].dt.year
#     df_next_2_days.loc[:, "month"] = df_next_2_days["time"].dt.month
#     df_next_2_days.loc[:, "day"] = df_next_2_days["time"].dt.day
#     return df_next_2_days

# def predict(parameter):
#     if parameter == 'pm10':
#         model = pm10_model
#         x_scaler = pm10_x_scaler
#         y_scaler = pm10_y_scaler
#     elif parameter == 'pm25':
#         model = pm25_model
#         x_scaler = pm25_x_scaler
#         y_scaler = pm25_y_scaler
#     elif parameter == 'no2':
#         model = no2_model
#         x_scaler = no2_x_scaler
#         y_scaler = no2_y_scaler
#     else:
#         raise ValueError("Unknown parameter")
    
#     # Use the latitude and longitude of the desired location
#     latitude = 41.9981
#     longitude = 21.4254
#     data = get_weather_data(latitude, longitude)
    
#     df = prepare_data(data)
#     X = df[['hour', 'year', 'month', 'day', 'temperature', 'humidity', 'wind_speed']]
#     X = x_scaler.transform(X)
#     predictions = model.predict(X)
#     result = y_scaler.inverse_transform(predictions.reshape(-1, 1))
#     return result.tolist()

# @app.route('/predict/pm10')
# def predict_pm10():
#     try:
#         result = predict('pm10')
#         return jsonify({"pm10_predictions": result})
#     except Exception as e:
#         return jsonify({"error": str(e)}), 500

# @app.route('/predict/pm25')
# def predict_pm25():
#     try:
#         result = predict('pm25')
#         return jsonify({"pm25_predictions": result})
#     except Exception as e:
#         return jsonify({"error": str(e)}), 500

# @app.route('/predict/no2')
# def predict_no2():
#     try:
#         result = predict('no2')
#         return jsonify({"no2_predictions": result})
#     except Exception as e:
#         return jsonify({"error": str(e)}), 500

# if __name__ == '__main__':
#     app.run(debug=True)


{
 "cells": [],
 "metadata": {
  "kernelspec": {
   "display_name": "Python 3",
   "language": "python",
   "name": "python3"
  },
  "language_info": {
   "name": "python",
   "version": "3.12.2"
  }
 },
 "nbformat": 4,
 "nbformat_minor": 2
}


from flask import Flask, jsonify
import joblib
import requests
import pandas as pd
from datetime import datetime, timedelta
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes
# CORS(app, resources={r"/*": {"origins": "*"}})


# Load models and scalers globally
pm10_model = joblib.load("../models/pm10/xgboost_model.pkl")
pm10_x_scaler = joblib.load("../scalers/pm10/x_scaler.pkl")
pm10_y_scaler = joblib.load("../scalers/pm10/y_scaler.pkl")

pm25_model = joblib.load("../models/pm25/xgboost_model.pkl")
pm25_x_scaler = joblib.load("../scalers/pm25/x_scaler.pkl")
pm25_y_scaler = joblib.load("../scalers/pm25/y_scaler.pkl")

no2_model = joblib.load("../models/no2/xgboost_model.pkl")
no2_x_scaler = joblib.load("../scalers/no2/x_scaler.pkl")
no2_y_scaler = joblib.load("../scalers/no2/y_scaler.pkl")

def get_weather_data(latitude, longitude):
    url = f"https://api.open-meteo.com/v1/forecast?latitude={latitude}&longitude={longitude}&hourly=temperature_2m,relative_humidity_2m,windspeed_10m"
    response = requests.get(url)
    if response.status_code != 200:
        raise Exception("Error fetching weather data")
    return response.json()

def prepare_data(data):
    hourly_data = {
        "time": data["hourly"]["time"],
        "temperature": data["hourly"]["temperature_2m"],
        "humidity": data["hourly"]["relative_humidity_2m"],
        "wind_speed": data["hourly"]["windspeed_10m"]
    }
    df = pd.DataFrame(hourly_data)
    df["time"] = pd.to_datetime(df["time"])
    current_time = datetime.now()
    next_2_days = current_time + timedelta(days=2)
    df_next_2_days = df[(df["time"] >= current_time) & (df["time"] <= next_2_days)].copy()
    df_next_2_days.loc[:, "hour"] = df_next_2_days["time"].dt.hour
    df_next_2_days.loc[:, "year"] = df_next_2_days["time"].dt.year
    df_next_2_days.loc[:, "month"] = df_next_2_days["time"].dt.month
    df_next_2_days.loc[:, "day"] = df_next_2_days["time"].dt.day
    return df_next_2_days

def predict(parameter):
    if parameter == 'pm10':
        model = pm10_model
        x_scaler = pm10_x_scaler
        y_scaler = pm10_y_scaler
    elif parameter == 'pm25':
        model = pm25_model
        x_scaler = pm25_x_scaler
        y_scaler = pm25_y_scaler
    elif parameter == 'no2':
        model = no2_model
        x_scaler = no2_x_scaler
        y_scaler = no2_y_scaler
    else:
        raise ValueError("Unknown parameter")
    
    # Use the latitude and longitude of the desired location
    latitude = 41.9981
    longitude = 21.4254
    data = get_weather_data(latitude, longitude)
    
    df = prepare_data(data)
    X = df[['hour', 'year', 'month', 'day', 'temperature', 'humidity', 'wind_speed']]
    X = x_scaler.transform(X)
    predictions = model.predict(X)
    result = y_scaler.inverse_transform(predictions.reshape(-1, 1))
    return result.tolist()


@app.route('/predict/pm10')
def predict_pm10():
    try:
        result = predict('pm10')
        return jsonify({"pm10_predictions": result})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/predict/pm25')
def predict_pm25():
    try:
        result = predict('pm25')
        return jsonify({"pm25_predictions": result})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/predict/no2')
def predict_no2():
    try:
        result = predict('no2')
        return jsonify({"no2_predictions": result})
    except Exception as e:
        return jsonify({"error": str(e)}), 500
    
    
if __name__ == '__main__':
    app.run(debug=True, port=3222)