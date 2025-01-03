<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <title>Gallery Kucing</title>

    <style>
        body {
            font-family: 'Jua', sans-serif;
            background-color: #FDF8F4;
            margin: 0; /* Menghapus margin bawaan */
            padding: 0; /* Menghapus padding bawaan */
        }
        .title {
            position: absolute;
            font-size: 35px;
            margin-top: 30px;
            margin-left: 50px;
            z-index: 999;
        }
        .title a{
            text-decoration: none;
            color: black;
        }
        header {
            position: relative; /* Membuat header sebagai posisi relatif */
            height: 100px; /* Tinggi header */
        }
        header .background-image {
            position: absolute;
            top: -60px;
            left: -90px;
            z-index: 1; /* Menempatkan gambar di belakang */
        }
        header .background-image img {
            width: 730px; /* Sesuaikan ukuran gambar */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            /* atur posisi gambar di sini */
            top: 20px;
            left: 20px;
        }
        header .logo {
            position: absolute; /* Membuat posisi logo absolut */
            top: 0; /* Menempatkan logo di bagian atas */
            right: 0; /* Menempatkan logo di bagian kanan */
            border-bottom-left-radius: 50%; /* Melengkungkan sudut kiri bawah */
            background-color: #E67575; /* Warna latar belakang logo */
            padding: 10px; /* Padding untuk memberi ruang di sekitar logo */
        }
        header .logo img {
            height: 40px; /* Mengatur tinggi logo */
            width: auto; /* Mengatur lebar agar proporsional */
        }
        .jejak {
            position: absolute;
            width: 160px;
            top: 500px;
            left: 1250px;
            z-index: 4;
        }
        judul {
            position: relative;
            text-align: center; /* Pusatkan teks */
        }
        judul .gal1 img {
            width: 200px; /* Sesuaikan dengan lebar yang diinginkan */
            height: auto; /* Biarkan tinggi disesuaikan secara proporsional */
        }
        judul .gal2 img {
            position: absolute;
            top: 23px;
            left: 875px;
            width: 50px; /* Sesuaikan dengan lebar yang diinginkan */
            height: auto; /* Biarkan tinggi disesuaikan secara proporsional */
        }
        judul .judul1 {
            position: absolute;
            top: 25px;
            left: 685px;
            font-size: 29px;
            width: 170px;
            color: white;
        }
        galeri .row {
            display: flex;
            margin-left: 10px;
            margin-top: 50px;
        }
        galeri .kotak {
            width: 300px;
            margin-bottom: 20px;
            position: relative;
        }
        galeri .kotak img {
            width: 237px;
            height: 237px;
            display: block;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        galeri .teks {
            background-color: #F5E6CA;
            bottom: 0;
            left: 0;
            width: 100%; /* Lebar teks 100% agar penuh */
            height: 65px;
            max-width: 67.5%;
            color: black;
            font-size: 19px;
            padding: 15px;
            padding-left: 20px;
            padding-bottom: 50px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        galeri .teks1 {
            background-color: #F5E6CA;
            bottom: 0;
            left: 0;
            width: 100%; /* Lebar teks 100% agar penuh */
            height: 65px;
            max-width: 67.5%;
            color: black;
            font-size: 19px;
            padding: 15px;
            padding-left: 20px;
            padding-bottom: 50px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        galeri .teks p {
            margin: 5px -1px 10px;
            font-size: 17px;
            /* Tambahkan properti styling tambahan sesuai kebutuhan */
        }
        galeri .teks1 p {
            margin: 5px -1px;
            font-size: 17px;
            /* Tambahkan properti styling tambahan sesuai kebutuhan */
        }
        .enlarged-image {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.9); /* Ubah warna latar belakang sesuai kebutuhan */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            overflow: hidden; /* Mengatasi kemungkinan gambar yang terlalu besar */
        }
        .enlarged-image img {
            max-width: 90%;
            max-height: 90%;
            display: block;
            margin: 0 auto;
        }
        footer {
            background-color: #E67575;
            padding-left: 100px;
            padding-right: 100px;
            height: 305px;
            color: white;
        }
        footer .logo-footer img{
            position: absolute;
            width: 60px;
            margin-top: 40px;
            margin-left: 20px;
        }
        footer .tentang-footer {
            position: absolute;
            padding: 2rem 1.75rem;
            width:560px;
            font-size: 18px;
            margin-top: 110px;
        }
        footer .tentang-footer p.komunitas-pecinta-kucing {
            position: absolute;
            font-weight: bold;
            font-size: 25px;
            margin-top: -30px;
        }
        footer .kontak {
            position: absolute;
            margin-top: 120px;
            margin-left: 740px;
            font-size: 21px;
        }
        footer .kontak1 {
            position: absolute;
            margin-top: 160px;
            margin-left: 740px;
            font-size: 17px;
            text-decoration: none;
        }
        footer .kontak2 {
            position: absolute;
            margin-top: 190px;
            margin-left: 740px;
            font-size: 17px;
            text-decoration: none;
        }
        footer .sosialmedia {
            position: absolute;
            margin-top: 120px;
            margin-left: 1090px;
            font-size: 21px;
        }
        footer .sosialmedia1 {
            position: absolute;
            margin-top: 160px;
            margin-left: 1090px;
            font-size: 17px;
            text-decoration: none;
            color: white;
        }
        footer .sosialmedia2 {
            position: absolute;
            margin-top: 190px;
            margin-left: 1090px;
            font-size: 17px;
            text-decoration: none;
            color: white;
        }
        footer .sosialmedia3 {
            position: absolute;
            margin-top: 220px;
            margin-left: 1090px;
            font-size: 17px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="title">
    <a href="/">
        < Galeri
    </a>
</div>

<header>
    <div class="background-image" id="background-section">
        <img src="/assets/images/bg1.png" alt="bg1" />
    </div>
    <div class="logo">
        <a href="/">
            <img src="/assets/images/logo.png" alt="Logo">
        </a>
    </div>
</header>

<img src="/assets/images/jejak2.png" alt="jejak" class="jejak">

<judul>
    <div class=gal1>
        <img src="/assets/images/gal1.png" alt="gal1">
            <div class="judul1">Galeri Kucing</div>
    </div>
    <div class=gal2>
        <a href="/buatpostgaleri">
            <img src="/assets/images/gall2.png" alt="gal1">
        </a>
    </div>
</judul>

<galeri style="max-width: 80%; display: flex; flex-wrap: wrap; justify-content: center; margin-left: 180px;">
    <?php if (!empty($posts) && is_array($posts)): ?>
        <?php $posts = array_reverse($posts); // Membalikkan urutan array posts ?>
        <?php foreach ($posts as $post): ?>
            <div class="row">
                <div class="kotak" onclick="showImage(this)">
                    <img src="/gambar/<?= esc($post['gambar']) ?>" alt="Image">
                    <div class="teks">
                        <?= esc($post['nama_pengirim']) ?>
                        <p><?= esc($post['deskripsi']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</galeri>

<footer>
    <div class="logo-footer">
        <img src="/assets/images/logo.png" alt="Logo-footer">
    </div>
    <div class="tentang-footer">
        <p class="komunitas-pecinta-kucing">Komunitas Pecinta Kucing</p>
        <p>Disini tempat bagi para pecinta kucing untuk terhubung, berbagi, dan belajar bersama! Disini kamu dapat berdiskusi yang memungkinkan kamu untuk berbagi informasi, cerita, pengalaman, dan tips sesama pecinta kucing.</p>
    </div>
    <div class="kontak">Kontak</div>
    <div class="kontak1">WA: 081234567890 - Abel</div>
    <div class="kontak2">Tlp.: 2131238312 - Abel</div>
    <div class="sosialmedia">Sosial Media</div>
    <a href="https://web.whatsapp.com" target="_blank">
        <div class="sosialmedia1">WhatsApp</div>
    </a>
    <a href="https://www.instagram.com" target="_blank">
        <div class="sosialmedia2">Instagram</div>
    </a>
    <a href="https://www.tiktok.com" target="_blank">
        <div class="sosialmedia3">TikTok</div>
    </a>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kotakElements = document.querySelectorAll('.kotak img');
        kotakElements.forEach(function(img) {
            img.addEventListener('click', function(event) {
                event.stopPropagation();
                var imgSrc = this.src;
                var enlargedImage = document.createElement('div');
                enlargedImage.className = 'enlarged-image';
                enlargedImage.innerHTML = '<img src="' + imgSrc + '" alt="Enlarged Image">';
                enlargedImage.addEventListener('click', function() {
                    this.parentNode.removeChild(this);
                });
                document.body.appendChild(enlargedImage);
            });
        });
    });
</script>

</body>
</html>
