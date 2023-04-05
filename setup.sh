composer install
docker compose up -d
docker compose exec -i fut-login-api cp env_example_local .env
docker compose exec -i fut-login-api php artisan config:clear
docker compose exec -i fut-login-api php artisan migrate:fresh --env=local
docker compose exec -i fut-login-api php artisan db:seed --env=local
