#!/usr/bin/env bash
set -euo pipefail

cd /workspaces/kopeku

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

echo "==> Reset & import db/komunitas.sql via PDO"
php <<'PHP'
<?php
$pdo = new PDO('mysql:host=db;port=3306;dbname=kopeku', 'kopeku', 'kopeku_pass', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_MULTI_STATEMENTS => true,
]);

$tables = $pdo->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA='kopeku'")->fetchAll(PDO::FETCH_COLUMN);
if ($tables) {
    $names = implode(',', array_map(fn($t) => '`' . str_replace('`', '``', $t) . '`', $tables));
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0; DROP TABLE IF EXISTS $names; SET FOREIGN_KEY_CHECKS=1;");
    echo "  -> hapus " . count($tables) . " tabel lama\n";
}

$sql = file_get_contents('db/komunitas.sql');
if ($sql === false) {
    throw new RuntimeException('gagal baca db/komunitas.sql');
}
$pdo->exec($sql);
echo "  -> import OK (" . round(strlen($sql) / 1024) . " KB)\n";
PHP

echo "==> Migrasi (no-op jika sudah tercatat di dump)"
php artisan migrate --force || echo "  (migrate gagal tapi dilanjutkan; tabel sudah dari dump)"

echo "==> Seeder akun demo (admin@example.com / password)"
php artisan db:seed --force || echo "  (seed gagal, akun demo tetap bisa dibuat manual)"

echo "==> Symlink storage"
php artisan storage:link || true

echo "==> Selesai. MySQL aktif, app siap di port 8000."
echo "    Admin : admin@example.com / password"