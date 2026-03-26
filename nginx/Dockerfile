# Dockerfile.nginx
FROM nginx:stable-alpine

# копируем конфиг nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# статические файлы (public) будут смонтированы из web контейнера
WORKDIR /var/www/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]