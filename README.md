<div align="center">

<img src="./public/assets/images/logo.png" alt="Logo Kopeku" width="150">

# Kopeku

### Komunitas Pecinta Kucing Indonesia

[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

[Laporkan Masalah](https://github.com/gerryabel/kopeku/issues)

</div>

---

## Tentang Kopeku

**Kopeku** adalah platform komunitas bagi pencinta kucing untuk menemukan informasi, berdiskusi, berbagi foto, dan mengenal berbagai jenis kucing. Aplikasi ini dibangun menggunakan CodeIgniter 4 dengan pola MVC serta MySQL sebagai basis data.

Kopeku juga menyediakan area admin untuk mengelola artikel dan data kucing yang ditampilkan kepada komunitas.

## Fitur Utama

- **Artikel** — membaca dan mencari informasi seputar perawatan, kesehatan, serta kehidupan kucing
- **Forum diskusi** — membuat topik, bertanya, dan memberikan tanggapan kepada anggota komunitas
- **Galeri komunitas** — mengunggah dan membagikan foto kucing
- **Katalog kucing** — menjelajahi informasi kucing Anggora, Domestik, Persia, Sphynx, dan Maine Coon
- **Detail konten** — melihat informasi lengkap artikel, forum, galeri, dan jenis kucing
- **Panel admin** — autentikasi admin serta pengelolaan artikel dan data kucing

## Teknologi

| Bagian | Teknologi |
| --- | --- |
| Backend | PHP 8.1+, CodeIgniter 4 |
| Frontend | HTML, CSS, JavaScript |
| Database | MySQL |
| Dependency manager | Composer |
| Local development | XAMPP atau PHP built-in server |
| Testing | PHPUnit |

## Menjalankan Secara Lokal

### Prasyarat

Siapkan perangkat dengan:

- PHP 8.1 atau versi yang lebih baru
- Composer
- MySQL atau MariaDB
- Ekstensi PHP yang dibutuhkan CodeIgniter, termasuk `intl` dan `mbstring`

XAMPP dapat digunakan jika ingin menyiapkan PHP, Apache, dan MySQL sekaligus.

### Instalasi

1. Clone repositori.

   ```bash
   git clone https://github.com/gerryabel/kopeku.git
   cd kopeku
   ```

2. Instal dependensi PHP.

   ```bash
   composer install
   ```

3. Salin konfigurasi environment.

   ```bash
   cp env .env
   ```

   Pada Windows PowerShell:

   ```powershell
   Copy-Item env .env
   ```

4. Sesuaikan konfigurasi aplikasi dan database di `.env`.

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = kopeku
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

5. Buat database bernama `kopeku`, lalu impor file:

   ```text
   db/kopeku.sql
   ```

   Impor dapat dilakukan melalui phpMyAdmin atau MySQL CLI.

6. Jalankan aplikasi.

   ```bash
   php spark serve
   ```

7. Buka [http://localhost:8080](http://localhost:8080) pada browser.

## Struktur Proyek

```text
kopeku/
├── app/
│   ├── Config/       # Konfigurasi aplikasi, route, dan database
│   ├── Controllers/  # Logika halaman pengguna dan admin
│   ├── Models/       # Akses serta pengolahan data
│   └── Views/        # Tampilan aplikasi
├── db/
│   └── kopeku.sql    # Struktur dan data awal database
├── public/           # Front controller dan aset publik
├── tests/            # Pengujian aplikasi
├── uploads/          # Berkas unggahan
└── writable/         # Cache, log, session, dan data runtime
```

## Menjalankan Pengujian

```bash
composer test
```

## Kontribusi

Kontribusi, ide fitur, dan laporan bug sangat diterima.

1. Fork repositori ini.
2. Buat branch fitur: `git checkout -b feature/nama-fitur`.
3. Commit perubahan: `git commit -m "feat: menambahkan fitur"`.
4. Push branch: `git push origin feature/nama-fitur`.
5. Buka pull request.

## Lisensi

Proyek ini menggunakan [MIT License](LICENSE).

---

<div align="center">

Dibuat oleh [Gerry Abel Al Ashby](https://github.com/gerryabel)

</div>
