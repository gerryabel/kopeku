#!/usr/bin/env bash
set -euo pipefail

cd /workspaces/kopeku

echo "==> Pastikan klien MySQL tersedia"
if ! command -v mysqladmin >/dev/null 2>&1; then
  sudo apt-get update -qq && sudo apt-get install -y --no-install-recommends mariadb-client
fi

echo "==> composer install"
composer install --no-interaction --prefer-dist

echo "==> Menyiapkan .env (MySQL di service 'db')"
cp .env.example .env
sed -i 's|^DB_CONNECTION=.*|DB_CONNECTION=mysql|' .env
sed -i 's|^# DB_HOST=.*|DB_HOST=db|' .env
sed -i 's|^# DB_PORT=.*|DB_PORT=3306|' .env
sed -i 's|^# DB_DATABASE=.*|DB_DATABASE=kopeku|' .env
sed -i 's|^# DB_USERNAME=.*|DB_USERNAME=kopeku|' .env
sed -i 's|^# DB_PASSWORD=.*|DB_PASSWORD=kopeku_pass|' .env
sed -i 's|^APP_URL=.*|APP_URL=http://localhost:8000|' .env
php artisan key:generate

echo "==> Tunggu MySQL 'db' siap (maks ~45 detik)"
ok=0
for i in $(seq 1 15); do
  if mysqladmin ping -h db -uroot -pkopeku_root --silent --connect-timeout=5 2>&1; then
    ok=1
    break
  fi
  echo "  ...percobaan ke-$i gagal, coba lagi"
  sleep 3
done
if [ "$ok" != "1" ]; then
  echo "MySQL 'db' tidak terjangkau dari container app." >&2
  echo "Cek log container 'db' di Codespaces (docker logs kopeku_devcontainer-db-1)." >&2
  exit 1
fi

echo "==> Reset & buat ulang database kopeku"
mysql -h db -uroot -pkopeku_root -e "DROP DATABASE IF EXISTS kopeku; CREATE DATABASE kopeku CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

echo "==> Mengimpor db/komunitas.sql (data contoh TA)"
mysql -h db -uroot -pkopeku_root kopeku < db/komunitas.sql

echo "==> Migrasi & seeder (akun demo)"
php artisan migrate --force
php artisan db:seed --force

echo "==> Symlink storage"
php artisan storage:link || true

echo "==> Selesai. MySQL aktif, app siap di port 8000."
echo "    Admin : admin@example.com / password"