FROM python:3.12-slim

WORKDIR /app

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY conversion_model.pkl .
COPY encoders.pkl .
COPY feature_cols.pkl .
COPY *.py .

EXPOSE 5000

CMD ["python", "predict_service.py"]