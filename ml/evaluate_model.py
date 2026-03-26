import pandas as pd
import numpy as np
import joblib
import matplotlib.pyplot as plt
from sklearn.metrics import (
    accuracy_score, precision_score, recall_score, f1_score,
    roc_auc_score, roc_curve, confusion_matrix, ConfusionMatrixDisplay,
    classification_report
)

print("=" * 60)
print("ОЦЕНКА КАЧЕСТВА МОДЕЛИ ПРЕДСКАЗАНИЯ КОНВЕРСИИ")
print("=" * 60)

# 1. Загружаем модель и энкодеры
print("\n1. Загрузка модели и энкодеров...")
model = joblib.load('conversion_model.pkl')
encoders = joblib.load('encoders.pkl')
feature_cols = joblib.load('feature_cols.pkl')
print("   ✓ Модель загружена")

# 2. Загружаем данные
print("\n2. Загрузка тестовых данных...")
df = pd.read_csv('ml_training_data.csv')
print(f"   ✓ Загружено {len(df)} записей")

# 3. Подготавливаем данные (как при обучении)
print("\n3. Подготовка данных...")

# Кодируем категориальные признаки
categorical_cols = ['service_type', 'business_sphere', 'monthly_budget', 'marketing_source']
for col in categorical_cols:
    df[col + '_code'] = encoders[col].transform(df[col])

# Выделяем признаки и целевую переменную
X = df[feature_cols]
y = df['converted']

from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42, stratify=y
)

y_pred = model.predict(X_test)
y_pred_proba = model.predict_proba(X_test)[:, 1]

accuracy = accuracy_score(y_test, y_pred) # эквивалент (TP + TN) / (TP + TN + FP + FN)
precision = precision_score(y_test, y_pred) # эквивалент TP / (TP + FP)
recall = recall_score(y_test, y_pred) # эквивалент TP / (TP + FN)
f1 = f1_score(y_test, y_pred) # эквивалент 2 * (precision * recall) / (precision + recall)
roc_auc = roc_auc_score(y_test, y_pred_proba) # площадь под ROC-кривой

print(f"Accuracy (точность):           {accuracy:.3f}")
print(f"Precision (точность положительных): {precision:.3f}")
print(f"Recall (полнота):              {recall:.3f}")
print(f"F1-score:                      {f1:.3f}")
print(f"ROC-AUC:                        {roc_auc:.3f}")
print("-" * 40)

# Детальный отчет по классам
print("\nДетальный отчет по классам:")
print(classification_report(y_test, y_pred, target_names=['Не купит', 'Купит']))

# 6. Строим графики
print("\n6. Построение графиков...")

# 6.1 ROC-кривая
plt.figure(figsize=(8, 6))
fpr, tpr, thresholds = roc_curve(y_test, y_pred_proba)
plt.plot(fpr, tpr, 'b-', linewidth=2, label=f'ROC-кривая (AUC = {roc_auc:.3f})')
plt.plot([0, 1], [0, 1], 'r--', linewidth=1, label='Случайная модель')
plt.xlabel('False Positive Rate (FPR)', fontsize=12)
plt.ylabel('True Positive Rate (TPR)', fontsize=12)
plt.title('ROC-кривая модели XGBoost', fontsize=14, fontweight='bold')
plt.legend(loc='lower right')
plt.grid(True, alpha=0.3)
plt.savefig('roc_curve.png', dpi=150, bbox_inches='tight')
plt.close()
print("   ✓ ROC-кривая сохранена (roc_curve.png)")

# 6.2 Матрица ошибок
plt.figure(figsize=(6, 5))
cm = confusion_matrix(y_test, y_pred)
disp = ConfusionMatrixDisplay(confusion_matrix=cm, display_labels=['Не купит', 'Купит'])
disp.plot(cmap='Blues', values_format='d')
plt.title('Матрица ошибок', fontsize=14, fontweight='bold')
plt.savefig('confusion_matrix.png', dpi=150, bbox_inches='tight')
plt.close()
print("   ✓ Матрица ошибок сохранена (confusion_matrix.png)")

# 6.3 Важность признаков
plt.figure(figsize=(12, 6))
importance = model.feature_importances_
indices = np.argsort(importance)[::-1]
names = [feature_cols[i] for i in indices]

# Красивые названия для отчета
feature_names_pretty = {
    'service_type_code': 'Тип услуги',
    'business_sphere_code': 'Сфера деятельности',
    'monthly_budget_code': 'Бюджет',
    'has_experience': 'Наличие опыта',
    'segments_count': 'Кол-во сегментов',
    'marketing_source_code': 'Источник',
    'form_completion_time': 'Время заполнения',
    'day_of_week': 'День недели',
    'time_of_day': 'Час'
}

pretty_names = [feature_names_pretty.get(name, name) for name in names]
importance_values = importance[indices]

# Строим столбчатую диаграмму
bars = plt.bar(range(len(importance_values)), importance_values, 
            color='steelblue', alpha=0.8, edgecolor='navy', linewidth=1)

# Добавляем вертикальные пунктирные линии через каждые 0.05
for x in range(0, len(importance_values)):
    for y in np.arange(0, max(importance_values) + 0.05, 0.05):
        if y > 0 and y < importance_values[x]:
            plt.axvline(x=x, ymin=0, ymax=y/max(importance_values), 
                    linestyle=':', color='gray', alpha=0.3, linewidth=0.8)

# Добавляем горизонтальные пунктирные линии для шкалы
for y in np.arange(0, max(importance_values) + 0.05, 0.05):
    plt.axhline(y=y, linestyle=':', color='gray', alpha=0.3, linewidth=0.8)

plt.xticks(range(len(importance_values)), pretty_names, rotation=45, ha='right')
plt.xlabel('Признаки', fontsize=12)
plt.ylabel('Важность', fontsize=12)
plt.title('Важность признаков модели XGBoost', fontsize=14, fontweight='bold')
plt.ylim(0, max(importance_values) + 0.05)

# Добавляем значения над столбцами
for i, (bar, val) in enumerate(zip(bars, importance_values)):
    plt.text(bar.get_x() + bar.get_width()/2, bar.get_height() + 0.005,
            f'{val:.2f}', ha='center', va='bottom', fontsize=10)

plt.grid(True, axis='y', alpha=0.3, linestyle=':')
plt.tight_layout()
plt.savefig('feature_importance.png', dpi=150, bbox_inches='tight')
plt.close()
print("   ✓ Важность признаков сохранена (feature_importance.png)")

# 7. Выводим таблицу с метриками для диплома
print("\n" + "=" * 60)
print("ГОТОВО! Скопируйте эти данные в диплом:")
print("=" * 60)
print("\nТаблица 2.10 — Метрики качества модели XGBoost\n")
print("| Метрика      | Значение | Пояснение                                                  |")
print("|--------------|----------|------------------------------------------------------------|")
print(f"| Accuracy     | {accuracy:.3f}    | Доля правильно классифицированных объектов                 |")
print(f"| Precision    | {precision:.3f}    | Доля верно предсказанных положительных среди всех предсказанных положительных |")
print(f"| Recall       | {recall:.3f}    | Доля верно предсказанных положительных среди всех реальных положительных |")
print(f"| F1-score     | {f1:.3f}    | Гармоническое среднее Precision и Recall                   |")
print(f"| ROC-AUC      | {roc_auc:.3f}    | Площадь под ROC-кривой (чем ближе к 1, тем лучше)          |")

# 8. Анализ ошибок
print("\n" + "-" * 60)
print("АНАЛИЗ ОШИБОК:")
print("-" * 60)
tn, fp, fn, tp = cm.ravel()
total = len(y_test)
print(f"Всего тестовых примеров: {total}")
print(f"Правильно классифицировано: {tn + tp} ({(tn + tp)/total:.1%})")
print(f"  - Верно предсказано 'Не купит': {tn}")
print(f"  - Верно предсказано 'Купит': {tp}")
print(f"Ошибки: {fp + fn} ({(fp + fn)/total:.1%})")
print(f"  - Ложноположительные (модель сказала 'Купит', а на самом деле 'Не купит'): {fp} ({fp/total:.1%})")
print(f"  - Ложноотрицательные (модель сказала 'Не купит', а на самом деле 'Купит'): {fn} ({fn/total:.1%})")
print("\nВывод: Ложноотрицательные ошибки (пропуск клиента) более критичны для бизнеса,")
print("так как могут привести к потере сделки. Их доля составляет "
    f"{fn/total:.1%}, что является приемлемым показателем для прототипа.")
print("=" * 60)