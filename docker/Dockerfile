# syntax=docker/dockerfile:1
FROM nginx:latest
WORKDIR /app
COPY . .
RUN npm install
RUN php artisan migrate
CMD ["php artisan serve"]
EXPOSE 80
