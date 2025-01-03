<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <title>Artikel Kucing</title>

<style>
    body {
        font-family: 'Jua', sans-serif;
        background-color: #FDF8F4;
        margin: 0;
        padding: 0;
    }
    header {
        position: relative;
        height: 100px;
    }
    header .background-image {
        position: absolute;
        top: -60px;
        left: -90px;
        z-index: 1;
    }
    header .background-image img {
        width: 730px;
        height: auto;
    }
    header .logo {
        position: absolute;
        top: 0;
        right: 0;
        border-bottom-left-radius: 50%;
        background-color: #E67575;
        padding: 10px;
    }
    header .logo img {
        height: 40px;
        width: auto;
    }
    .jejak {
        position: absolute;
        width: 120px;
        top: 60px;
        left: 1130px;
        z-index: 4;
    }
    .judul {
        position: absolute;
        font-weight: bold;
        top: 110px;
        left: 720px;
        font-size: 30px;
    }
    .garis-panjang {
        margin-top: 60px;
        margin-left: 225px;
        width: 70%;
        height: 5px;
        background-color: #D9D9D9;
        border-radius: 10px;
    }
    .box-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }
    .box {
        width: 400px;
        height: 200px;
        overflow: hidden;
        position: relative;
        border-radius: 20px;
    }
    .box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease; /* Efek transisi saat perubahan ukuran */
    }
    .box h1 {
        position: absolute;
        font-family: sans-serif;
        bottom: 10px;
        left: 10px;
        color: white;
        margin: 0;
        font-size: 18px;
        padding: 5px;
        border-radius: 5px;
        z-index: 999;
        transition: transform 0.3s ease; /* Efek transisi saat perubahan ukuran */
    }
    .box:hover img,
    .box:hover h1 {
        transform: scale(1.05); /* Memperbesar gambar dan teks saat dihover */
    }
    .box::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%; /* Sesuaikan tinggi overlay dengan kebutuhan */
        background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8)); /* Gradient transparan ke hitam */
    }
    footer {
        background-color: #E67575;
        margin-top: 100px;
        padding-left: 100px;
        padding-right: 100px;
        height: 305px;
        color: white;
        font-family: 'jua' , sans-serif;
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

<div class="judul">Artikel</div>

<div class="garis-panjang"></div>

<img src="/assets/images/jejak2.png" alt="jejak" class="jejak">

<list-artikel-hot>
    <div class="box-container">
        <?php $reversedArticles = array_reverse($articles); ?>
        <?php foreach ($reversedArticles as $article): ?>
            <div class="box">
                <a href="/isiartikel/<?= $article['id'] ?>">
                    <img src="/uploads/<?php echo $article['gambar']; ?>" alt="<?php echo $article['judul']; ?>">
                    <h1><?= $article['judul'] ?></h1>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</list-artikel-hot>

<!-- Tambahkan kode untuk list-artikel-cool sesuai kebutuhan -->

<footer>
    <div class="logo-footer">
        <img src="assets/images/logo.png" alt="Logo-footer">
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

</body>
</html>
