#!/usr/bin/env bash
set -euo pipefail

cd /workspaces/kopeku

echo "==> Menginstal dependensi PHP (composer install)"
composer install --no-interaction --prefer-dist

echo "==> Menyiapkan .env untuk MySQL (host: db)"
cp .env.example .env
sed -i 's|^DB_CONNECTION=.*|DB_CONNECTION=mysql|' .env
sed -i 's|^# DB_HOST=.*|DB_HOST=db|' .env
sed -i 's|^# DB_PORT=.*|DB_PORT=3306|' .env
sed -i 's|^# DB_DATABASE=.*|DB_DATABASE=kopeku|' .env
sed -i 's|^# DB_USERNAME=.*|DB_USERNAME=kopeku|' .env
sed -i 's|^# DB_PASSWORD=.*|DB_PASSWORD=kopeku_pass|' .env
sed -i 's|^APP_URL=.*|APP_URL=http://localhost:8000|' .env
php artisan key:generate

echo "==> Menunggu MySQL di container 'db' siap"
until mysqladmin ping -h db -uroot -pkopeku_root --silent 2>/dev/null; do
  sleep 2
done

echo "==> Mengimpor db/komunitas.sql (data contoh TA)"
mysql -h db -uroot -pkopeku_root kopeku < db/komunitas.sql

echo "==> Migrasi & seeder (akun demo)"
php artisan migrate --force
php artisan db:seed --force

echo "==> Symlink storage"
php artisan storage:link || true

echo "==> Selesai. Server jalan otomatis di port 8000."
echo "    Admin : admin@example.com / password"