@echo off
cd /d C:\projects\brif_app\ml
call .venv\Scripts\activate
:loop
echo Запуск ML сервиса...
python predict_service.py
echo Сервис упал, перезапуск через 5 секунд...
timeout /t 5
goto loop