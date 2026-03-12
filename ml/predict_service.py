from flask import Flask, request, jsonify
from flask_cors import CORS
import joblib
import pandas as pd
import os

app = Flask(__name__)
CORS(app)

print("-" * 50)
print("ЗАПУСК ROCKET.BALL")
print("-" * 50)

if not os.path.exists('conversion_model.pkl'):
    print("Ошибка: модель не найдена!")
    exit(1)

model = joblib.load('conversion_model.pkl')
encoders = joblib.load('encoders.pkl')
feature_cols = joblib.load('feature_cols.pkl')
print("Модель загружена успешно!")

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    print(f"\nПолучен запрос на предсказание: {data}") 
    
    try:
        input_data = {
            'service_type_code': encoders['service_type'].transform([data['service_type']])[0],
            'business_sphere_code': encoders['business_sphere'].transform([data['business_sphere']])[0],
            'monthly_budget_code': encoders['monthly_budget'].transform([data['monthly_budget']])[0],
            'has_experience': int(data['has_experience']),
            'segments_count': int(data['segments_count']),
            'marketing_source_code': encoders['marketing_source'].transform([data['marketing_source']])[0],
            'form_completion_time': int(data['form_completion_time']),
            'day_of_week': int(data['day_of_week']),
            'time_of_day': int(data['time_of_day'])
        }
        
        df = pd.DataFrame([input_data])
        probability = float(model.predict_proba(df)[0, 1])
        
        result = {
            'probability': probability,
            'will_buy': bool(probability > 0.5),
            'confidence': 'высокая' if abs(probability - 0.5) > 0.3 else 'средняя'
        }
        
        print(f"Результат: {result}")
        return jsonify(result)
        
    except Exception as e:
        print(f"Ошибка: {e}")
        return jsonify({'error': str(e)}), 400

@app.route('/health', methods=['GET'])
def health():
    return jsonify({'status': 'ok'})

if __name__ == '__main__':
    print("\nСервер запущен на http://localhost:5000")
    print("-" * 50)
    app.run(host='0.0.0.0', port=5000, debug=True)