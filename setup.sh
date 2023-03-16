docker compose up -d
docker compose exec -i fut-login-api php artisan config:clear
docker compose exec -i fut-login-api php artisan migrate:fresh
docker compose exec -i fut-login-api php artisan db:seed