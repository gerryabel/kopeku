<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <title><?= $article['judul']; ?></title>
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
        header .kembali {
            position: absolute;
            margin-top: 10px;
            margin-left: 80px;
            z-index: 999;
        }
        header .kembali a {
            color: black;
            font-size: 18px;
            text-decoration: none;
        }
        .jejak {
            position: absolute;
            width: 160px;
            top: 80px;
            left: 1200px;
            z-index: 4;
        }
        .garis-panjang {
            margin-top: 70px;
            margin-left: 190px;
            width: 70%;
            height: 5px;
            background-color: #D9D9D9;
            border-radius: 10px;
        }
        artikel .judul {
            font-weight: bold;
            margin-top: 30px;
            margin-left: 190px;
            padding-right: 662px;
            font-size: 30px;
        }
        artikel .isi {
            margin-top: 30px;
            margin-left: 150px;
            width: 60%;
            height: auto;
            background-color: #FFF3E5;
            border-radius: 30px;
        }
        artikel .artikel1 {
            width: 500px;
            height: auto;
            border-radius: 20px;
            margin-left: 200px;
        }
        artikel .isi-atas {
            padding-top: 40px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 25px;
        }
        artikel .isi-bawah1 {
            padding-top: 30px;
            padding-left: 40px;
            padding-right: 40px;
        }
        artikel .sub-judul {
            font-weight: bold;
            padding-top: 40px;
            padding-left: 40px;
            padding-right: 40px;
        }
        artikel .isi-bawah2 {
            padding-top: 10px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 25px;
        }
        .backward, .forward {
            position: relative;
            color: #434343;
            text-decoration: none;
        }
        .backward {
            display: inline-block;
            margin-top: 10px;
            margin-left: 180px;
            margin-bottom: 80px;
        }
        .forward {
            display: inline-block;
            margin-top: 10px;
            margin-left: 550px;
            margin-bottom: 80px;
        }
        .backward a, .forward a {
            text-decoration: none;
            color: #434343;
        }
        footer {
            font-family: 'Jua', sans-serif;
            background-color: #E67575;
            padding-left: 100px;
            padding-right: 100px;
            height: 305px;
            color: white;
            text-decoration: none;
        }
        footer .logo-footer img {
            position: absolute;
            width: 60px;
            margin-top: 40px;
            margin-left: 20px;
        }
        footer .tentang-footer {
            position: absolute;
            padding: 2rem 1.75rem;
            width: 560px;
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
            text-decoration: none;
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
        footer .sosialmedia1 a,
        footer .sosialmedia2 a,
        footer .sosialmedia3 a {
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
    <div class=kembali>
        <a href="/artikel/">
            <h1>< Artikel</h1>
        </a>
    </div>
</header>

<div class="garis-panjang"></div>

<img src="/assets/images/jejak2.png" alt="jejak" class="jejak">

<artikel>
    <div class="judul"><?= $article['judul']; ?></div>
    <div class="isi">
        <p class="isi-atas"><?= $article['isi']; ?></p>
        <img src="/uploads/<?= $article['gambar']; ?>" alt="<?= $article['judul']; ?>" class="artikel1">
        <p class="isi-bawah1"><?= $article['isi1']; ?></p>
        <p class="isi-bawah2"><?= $article['isi2']; ?></p>
    </div>
</artikel>
<div class="backward">
        <a href="/isiartikel/<?= $article['id'] - 1; ?>">
            < Artikel Sebelumnya
        </a>
</div>
<div class="forward">
        <a href="/isiartikel/<?= $article['id'] + 1; ?>">
            Artikel Selanjutnya >
        </a>
</div>

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

</body>
</html>