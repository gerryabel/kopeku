#!/usr/bin/env bash
set -euo pipefail

cd /workspaces/kopeku

echo "==> Pastikan klien MySQL tersedia"
if ! command -v mysql >/dev/null 2>&1; then
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

echo "==> Tunggu MySQL 'db' siap via PDO (maks ~60 detik)"
ok=0
for i in $(seq 1 30); do
  if php -r 'try { new PDO("mysql:host=db;port=3306;dbname=kopeku", "kopeku", "kopeku_pass"); exit(0); } catch (Exception $e) { fwrite(STDERR, "   PDO err: " . $e->getMessage() . PHP_EOL); exit(1); }'; then
    ok=1
    break
  fi
  echo "  ...percobaan ke-$i gagal, coba lagi"
  sleep 2
done
if [ "$ok" != "1" ]; then
  echo "MySQL 'db' tidak bisa dihubungi dari container app (user kopeku)." >&2
  echo "Cek log container db: docker logs kopeku_devcontainer-db-1" >&2
  exit 1
fi

export MYSQL_PWD=kopeku_pass

echo "==> Bersihkan tabel lama (idempotent, user kopeku)"
tables=$(mysql --ssl-mode=DISABLED -h db -u kopeku -N -B -e 'SELECT GROUP_CONCAT(CONCAT("`", TABLE_NAME, "`")) FROM information_schema.TABLES WHERE TABLE_SCHEMA="kopeku"' 2>/dev/null || true)
if [ -n "$tables" ]; then
  mysql --ssl-mode=DISABLED -h db -u kopeku -e "SET FOREIGN_KEY_CHECKS=0; DROP TABLE IF EXISTS $tables; SET FOREIGN_KEY_CHECKS=1;" || echo "  (gagal bersihkan tabel lama, lanjut import)"
fi

echo "==> Mengimpor db/komunitas.sql (data contoh TA)"
mysql --ssl-mode=DISABLED -h db -u kopeku kopeku < db/komunitas.sql

echo "==> Migrasi & seeder (akun demo)"
php artisan migrate --force
php artisan db:seed --force

echo "==> Symlink storage"
php artisan storage:link || true

echo "==> Selesai. MySQL aktif, app siap di port 8000."
echo "    Admin : admin@example.com / password"