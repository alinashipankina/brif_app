# Docker Deployment Guide

## Быстрый старт

Для развертывания приложения выполните одну команду:

```bash
docker compose up --build
```

Приложение будет доступно по адресу: **http://localhost:8080**

## Что происходит при сборке

1. **База данных (MySQL)** - поднимается на порту 3307
2. **ML-сервис** - Python сервис на порту 5001
3. **Web (Laravel + PHP-FPM)** - собирается фронтенд через Vite, устанавливаются зависимости
4. **Nginx** - отдает статику и проксирует PHP запросы

## Структура проекта

```
brif_app/
├── web/                    # Laravel приложение
│   ├── Dockerfile         # Сборка PHP-FPM + фронтенд
│   ├── docker-entrypoint.sh  # Миграции и кеширование
│   └── public/build/      # Собранные Vite ассеты (создается при сборке)
├── nginx/                 # Nginx конфигурация
│   ├── Dockerfile
│   └── nginx.conf        # Настройки для статики и PHP
├── ml/                    # ML сервис
└── docker-compose.yml    # Оркестрация всех сервисов
```

## Важные моменты

### Статические файлы
- Vite собирает CSS/JS в `public/build/` во время сборки Docker образа
- Nginx получает доступ к файлам через `volumes_from: web`
- Все статические файлы кешируются на 1 год

### База данных
- Автоматически создается БД `brif`
- Миграции запускаются автоматически при старте web контейнера
- Данные сохраняются в volume `mysql_data`

### Переменные окружения
- `.env` файл создается автоматически из `.env.example`
- `APP_KEY` генерируется при сборке
- Настройки БД уже прописаны для Docker окружения

## Команды

### Запуск
```bash
# Сборка и запуск
docker compose up --build

# Запуск в фоне
docker compose up -d --build
```

### Остановка
```bash
# Остановить все контейнеры
docker compose down

# Остановить и удалить volumes (ВНИМАНИЕ: удалит данные БД)
docker compose down -v
```

### Логи
```bash
# Все логи
docker compose logs -f

# Логи конкретного сервиса
docker compose logs -f web
docker compose logs -f nginx
```

### Выполнение команд Laravel
```bash
# Artisan команды
docker compose exec web php artisan migrate
docker compose exec web php artisan cache:clear

# Composer
docker compose exec web composer install
```

## Troubleshooting

### CSS файлы не загружаются
Проверьте что:
1. Vite собрал файлы: `docker compose exec web ls -la public/build/`
2. Nginx видит файлы: `docker compose exec nginx ls -la /var/www/html/public/build/`
3. Проверьте логи nginx: `docker compose logs nginx`

### База данных не подключается
```bash
# Проверьте статус БД
docker compose exec db mysqladmin ping -h localhost -uroot -pPassw0rd2

# Проверьте логи
docker compose logs db
```

### Пересборка без кеша
```bash
docker compose build --no-cache
docker compose up
```

## Production deployment

Для продакшена рекомендуется:

1. Изменить пароли в `docker-compose.yml` (MYSQL_ROOT_PASSWORD)
2. Настроить SSL/HTTPS через reverse proxy (например, Traefik или Caddy)
3. Настроить регулярные бэкапы (уже настроен сервис backup в docker-compose.yml)
4. Изменить порт nginx с 8080 на 80 или использовать reverse proxy

## Бэкапы

Автоматические бэкапы настроены через сервис `backup`:
- Запускаются каждый день в 2:00 ночи
- Хранятся 7 дней
- Сохраняются в папку `./backups/`
