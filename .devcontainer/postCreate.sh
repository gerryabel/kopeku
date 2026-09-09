#!/usr/bin/env bash
set -euo pipefail

DB_NAME=kopeku
DB_USER=kopeku
DB_PASS=kopeku_pass

cd /workspaces/kopeku

echo "==> Menjalankan MySQL di dalam container"
sudo service mysql start

echo "==> Membuat database & user MySQL"
sudo mysql <<SQL
CREATE DATABASE IF NOT EXISTS \`${DB_NAME}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';
CREATE USER IF NOT EXISTS '${DB_USER}'@'%' IDENTIFIED BY '${DB_PASS}';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO '${DB_USER}'@'localhost';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO '${DB_USER}'@'%';
FLUSH PRIVILEGES;
SQL

echo "==> composer install"
composer install --no-interaction --prefer-dist

echo "==> Menyiapkan .env"
cp .env.example .env
sed -i 's|^DB_CONNECTION=.*|DB_CONNECTION=mysql|' .env
sed -i 's|^# DB_HOST=.*|DB_HOST=127.0.0.1|' .env
sed -i 's|^# DB_PORT=.*|DB_PORT=3306|' .env
sed -i 's|^# DB_DATABASE=.*|DB_DATABASE=kopeku|' .env
sed -i 's|^# DB_USERNAME=.*|DB_USERNAME=kopeku|' .env
sed -i 's|^# DB_PASSWORD=.*|DB_PASSWORD=kopeku_pass|' .env
sed -i 's|^APP_URL=.*|APP_URL=http://localhost:8000|' .env
php artisan key:generate

echo "==> Mengimpor db/komunitas.sql (data contoh TA)"
mysql -h 127.0.0.1 -u "${DB_USER}" -p"${DB_PASS}" "${DB_NAME}" < db/komunitas.sql 2>/dev/null

echo "==> Migrasi & seeder"
php artisan migrate --force
php artisan db:seed --force

echo "==> Symlink storage"
php artisan storage:link || true

echo "==> Selesai. MySQL aktif, app siap di port 8000."
echo "    Admin : admin@example.com / password"