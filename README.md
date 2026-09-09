<div align="center">

# 🐾 KOPEKU

### Komunitas Pecinta Kucing Indonesia

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12-EF4223?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![TailwindCSS](https://img.shields.io/badge/Tailwind%20CSS-4-38BDF8?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

Tugas Akhir — Gerry Abel Al Ashby

</div>

---

## Tentang KOPEKU

**KOPEKU** adalah platform komunitas bagi para pecinta kucing di Indonesia untuk berbagi informasi, berdiskusi, saling membantu, hingga mengadopsi kucing. Aplikasi ini dibangun dengan **Laravel 12** menggunakan pola MVC, **MySQL** sebagai basis data, dan **Tailwind CSS** untuk tampilan antarmuka.

## Fitur Utama

| Area | Fitur |
| --- | --- |
| **Autentikasi** | Login, register, logout, halaman profil, serta manajemen akun |
| **Keamanan** | Role `admin` dan `member`, serta pemblokiran (ban) pengguna |
| **Forum** | Membuat, mengedit, menghapus topik diskusi, komentar, unggah gambar, serta penghapusan permanen oleh admin |
| **Galeri** | Mengunggah dan berbagi foto kucing komunitas |
| **Artikel** | Membaca dan menelusuri artikel per kategori, dikelola lewat panel admin |
| **Adopsi** | Katalog kucing yang tersedia untuk diadopsi, pengajuan adopsi, pengajuan data kucing, persetujuan/penolakan pengajuan, notifikasi, serta informasi pemilik (WhatsApp dan Google Maps) |
| **Panel Admin** | Dashboard statistik, kelola pengguna, forum, galeri, artikel, kategori, kucing, ras (breed), alamat, dan pengajuan adopsi |
| **Laporan** | Ekspor data adopsi ke Excel (maatwebsite/excel) |

## Teknologi

| Bagian | Teknologi |
| --- | --- |
| Backend | PHP 8.2+, Laravel 12 |
| Frontend | Blade, Tailwind CSS, Vite |
| Database | MySQL |
| Image | Intervention Image |
| Export | maatwebsite/excel |
| Local development | `php artisan serve` / Laravel Sail |

## Menjalankan Secara Lokal

### Prasyarat

- PHP 8.2 atau lebih baru
- Composer
- Node.js 20+ dan npm
- MySQL atau MariaDB

### Instalasi

1. Clone repositori.

   ```bash
   git clone https://github.com/gerryabel/kopeku.git
   cd kopeku
   ```

2. Instal dependensi PHP dan frontend.

   ```bash
   composer install
   npm install
   ```

3. Siapkan environment.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Sesuaikan kredensial database di `.env`.

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kopeku
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Buat database bernama `kopeku`, lalu jalankan migrasi dan seeder.

   ```bash
   php artisan migrate --seed
   ```

   > Alternatif: impor dump `db/komunitas.sql` jika ingin data contoh lebih lengkap.
   > File upload (avatar, foto kucing, dsb.) tidak disertakan dalam repositori.

6. Buat symlink storage untuk file upload.

   ```bash
   php artisan storage:link
   ```

7. Build aset frontend.

   ```bash
   npm run build
   ```

8. Jalankan aplikasi.

   ```bash
   php artisan serve
   ```

9. Buka [http://localhost:8000](http://localhost:8000).

### Akun Demo (Seeder)

| Role | Email | Password |
| --- | --- | --- |
| Admin | `admin@example.com` | `password` |
| Member | `test@example.com` | `password` |

## Menjalankan via GitHub Codespaces (Tanpa Instalasi)

Tanpa perlu install PHP, Composer, atau MySQL di mesin lokal — semuanya berjalan di cloud:

1. Buka repo [gerryabel/kopeku](https://github.com/gerryabel/kopeku).
2. Klik tombol **Code ▸ Codespaces ▸ New codespace**.
3. Tunggu container selesai dibangun (±3–6 menit, hanya sekali). Prosesnya otomatis:
   - menginstal dependensi (`composer install`),
   - menyiapkan `.env` (MySQL di service `db`),
   - mengimpor `db/komunitas.sql` (data contoh TA),
   - menjalankan migrasi + seeder,
   - menjalankan server di **port 8000**.
4. Buka tab **Ports ▸ 8000 ▸ Open in Browser** (biasanya muncul otomatis).

Konfigurasi container ada di [`.devcontainer/`](.devcontainer) — dua service: `app` (PHP 8.3 + ekstensi) dan `db` (MySQL 8).

## Struktur Proyek

```text
kopeku/
├── app/
│   ├── Http/
│   │   ├── Controllers/   # Logika pengguna & admin
│   │   └── Middleware/    # IsAdmin, CheckBanned
│   ├── Mail/              # Notifikasi status pengajuan
│   └── Models/            # Akses serta pengolahan data
├── database/
│   ├── factories/         # Factory untuk seeder
│   ├── migrations/        # Skema database
│   └── seeders/           # Data awal
├── db/
│   └── komunitas.sql      # Dump lengkap (opsional)
├── public/                # Aset dan front controller
├── resources/views/       # Template Blade
├── routes/web.php         # Definisi route
└── storage/app/public/    # File upload (tidak di-commit)
```

## Menjalankan Pengujian

```bash
php artisan test
```

## Lisensi

Proyek ini menggunakan [MIT License](LICENSE).

---

<div align="center">

Dibuat oleh [Gerry Abel Al Ashby](https://github.com/gerryabel)

</div>