import csv
import random
from datetime import datetime

print("-" * 50)
print("ГЕНЕРАТОР СИНТЕТИЧЕСКИХ ДАННЫХ ДЛЯ ML")
print("-" * 50)

total_samples = 300
data = []

services = [
    'SEO-продвижение',
    'Зарубежное SEO',
    'GEO-продвижение',
    'Перформанс-маркетинг',
    'Контекстная реклама',
    'SERM (управление репутацией)',
    'Контент-поддержка',
    'Веб-аналитика',
    'Аутстафф'
]

spheres = [
    'Интернет-магазин',
    'Услуги для бизнеса (B2B)',
    'Услуги для населения (B2C)',
    'Производство',
    'Образование',
    'Медицина',
    'Недвижимость',
    'Строительство',
    'Туризм и гостиницы',
    'Другое'
]

budgets = [
    'от 30к до 50к рублей',
    'от 50к до 100к рублей',
    'от 100к до 200к рублей',
    'от 200к рублей',
    'от 40к до 100к рублей',
    'от 100к до 250к рублей',
    'от 250к до 500к рублей',
    'от 500к до 1 млн рублей',
    'от 1 млн рублей',
    'от 200к до 400к рублей',
    'от 400к рублей'
]

sources = [
    'Поиск в Google/Yandex',
    'Рекомендация',
    'Социальные сети',
    'Контекстная или таргетированная реклама'
]

print(f"\n📊 Создаем {total_samples} искусственных заявок...")

for i in range(total_samples):
    service = random.choice(services)
    sphere = random.choice(spheres)
    budget = random.choice(budgets)
    experience = random.randint(0, 1)
    segments_count = random.randint(1, 3)
    source = random.choice(sources)
    time = random.randint(60, 600)
    
    day_of_week = random.randint(1, 7)
    time_of_day = random.randint(9, 18)
    
    score = 0
    
    if experience == 1:
        score += 0.3
    
    if '500к' in budget or '1 млн' in budget:
        score += 0.3
    
    if time < 240:
        score += 0.2
    
    if source == 'Рекомендация':
        score += 0.2
    
    score += (segments_count - 1) * 0.1
    
    score += random.randint(-10, 10) / 100
    
    converted = 1 if score > 0.5 else 0
    
    data.append({
        'service_type': service,
        'business_sphere': sphere,
        'monthly_budget': budget,
        'has_experience': experience,
        'segments_count': segments_count,
        'marketing_source': source,
        'form_completion_time': time,
        'day_of_week': day_of_week,
        'time_of_day': time_of_day,
        'converted': converted
    })
    
    if (i + 1) % 50 == 0:
        print(f"   ... создано {i + 1} записей")

filename = 'ml_training_data.csv'
with open(filename, 'w', newline='', encoding='utf-8') as csvfile:
    fieldnames = [
        'service_type', 'business_sphere', 'monthly_budget', 'has_experience',
        'segments_count', 'marketing_source', 'form_completion_time',
        'day_of_week', 'time_of_day', 'converted'
    ]
    
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames, delimiter=',', 
                            quotechar='"', quoting=csv.QUOTE_MINIMAL)
    
    writer.writeheader()
    writer.writerows(data)

converted_count = sum(row['converted'] for row in data)
converted_percent = round(converted_count / total_samples * 100)

print(f"\nГОТОВО! Создан файл: {filename}")
print("\nСтатистика:")
print(f"   Всего примеров: {total_samples}")
print(f"   Стали клиентами: {converted_count} ({converted_percent}%)")
print(f"   Не стали клиентами: {total_samples - converted_count} ({100 - converted_percent}%)")

print("\nДанные для обучения модели готовы!")
print("-" * 50)