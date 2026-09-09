#!/usr/bin/env bash
set -euo pipefail

cd /workspaces/kopeku

sudo service mysql start >/dev/null 2>&1 || true

if ! pgrep -f "artisan serve" >/dev/null 2>&1; then
  nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/kopeku-serve.log 2>&1 &
fi

echo "KOPEKU: http://localhost:8000 (MySQL aktif di 3306)"