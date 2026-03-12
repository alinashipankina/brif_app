import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.metrics import accuracy_score, confusion_matrix, classification_report
import xgboost as xgb
import joblib
import os

print("-" * 50)
print("ОБУЧЕНИЕ МОДЕЛИ ПРЕДСКАЗАНИЯ КОНВЕРСИИ")
print("-" * 50)

if not os.path.exists('ml_training_data.csv'):
    print("Ошибка: файл ml_training_data.csv не найден!")
    exit(1)

df = pd.read_csv('ml_training_data.csv')
print(f"\nЗагружено {len(df)} примеров")

encoders = {}
categorical_cols = ['service_type', 'business_sphere', 'monthly_budget', 'marketing_source']

for col in categorical_cols:
    encoders[col] = LabelEncoder()
    df[col + '_code'] = encoders[col].fit_transform(df[col])

feature_cols = [
    'service_type_code', 'business_sphere_code', 'monthly_budget_code',
    'has_experience', 'segments_count', 'marketing_source_code',
    'form_completion_time', 'day_of_week', 'time_of_day'
]

X = df[feature_cols]
y = df['converted']

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42, stratify=y
)

model = xgb.XGBClassifier(
    n_estimators=100, 
    max_depth=4, 
    learning_rate=0.1,
    subsample=0.8, 
    colsample_bytree=0.8, 
    random_state=42,
    eval_metric='logloss'
)

model.fit(X_train, y_train)

y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)

print(f"\nТОЧНОСТЬ МОДЕЛИ: {accuracy:.2%}")

joblib.dump(model, 'conversion_model.pkl')
joblib.dump(encoders, 'encoders.pkl')
joblib.dump(feature_cols, 'feature_cols.pkl')

print("\nМодель сохранена в conversion_model.pkl")
print("-" * 50)