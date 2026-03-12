import requests
import json

print("🔍 Проверка ML сервиса...")

try:
    response = requests.get('http://localhost:5001/health')
    print(f"Health check: {response.json()}")
except:
    print("Сервис не доступен! Запустите: python predict_service.py")
    exit(1)

test_data = {
    'service_type': 'SEO-продвижение',
    'business_sphere': 'Интернет-магазин',
    'monthly_budget': 'от 100к до 250к рублей',
    'has_experience': 1,
    'segments_count': 2,
    'marketing_source': 'Поиск в Google/Yandex',
    'form_completion_time': 180,
    'day_of_week': 2,
    'time_of_day': 14
}

print("\nОтправляем тестовые данные...")
response = requests.post('http://localhost:5001/predict', json=test_data)

if response.status_code == 200:
    result = response.json()
    print(f"\nРезультат предсказания:")
    print(f"   Вероятность конверсии: {result['probability']:.1%}")
    print(f"   Купит? {'ДА' if result['will_buy'] else 'НЕТ'}")
    print(f"   Уверенность: {result['confidence']}")
else:
    print(f"Ошибка: {response.status_code}")
    print(response.json())