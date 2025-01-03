<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Detail Kucing</title>

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
            text-align: center;
            margin-top: 90px;
            margin-left: 200px;
            font-size: 29px;
        }
        .judul a{
            text-decoration: none;
            color: black;
            font-weight: normal;
        }
        .list-kucing {
            display: flex;
            width: 75%;
            justify-content: center;
            margin: 150px auto;
        }
        .list-kucing .kucing-item {
            background-color: #FFF3E5;
            padding: 40px;
            border-radius: 10px;
            width: 100%; /* Sesuaikan lebar */
            text-align: left;
            font-size: 16px;
            color: #333;
            display: flex;
            flex-direction: row-reverse; /* Balik urutan elemen */
            align-items: center;
            text-decoration: none;
            margin-bottom: 20px; /* Atur spasi antar kucing-item */
        }
        .list-kucing .kucing-item img {
            width: 400px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 20px; /* Atur spasi antara gambar dan teks */
        }
        .list-kucing .kucing-item .details {
            width: calc(100% - 320px); /* Sesuaikan lebar */
        }
        .list-kucing .kucing-item .details .name {
            font-weight: bold;
            font-size: 25px;
        }
        .list-kucing .kucing-item .details .ready {
            position: absolute;
            color: green;
            font-weight: normal;
            font-size: 14px;
            margin-top: -21px;
            margin-left: 175px; /* Geser ke kanan sejauh mungkin */
            margin-bottom: 5px; /* Atur spasi antara nama dan status */
        }
        .list-kucing .kucing-item .details .price-address {
            margin-top: 10px;
            font-size: 19px;
        }
        .list-kucing .kucing-item .details .price {
            color: #E67575;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .list-kucing .kucing-item .details .description {
            margin-top: 20px;
            font-size: 18px;
        }
        .list-kucing .kucing-item .details .buttons {
            margin-top: 40px;
            text-align: left;
        }
        .list-kucing .kucing-item .details .buttons .location-button {
            text-decoration: none;
            color: white;
            background-color: #E67575;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 30px;
            margin-right: 10px; /* Atur jarak antara tombol */
        }
        .list-kucing .kucing-item .details .buttons .whatsapp-button {
            text-decoration: none;
            color: white;
            background-color: #6C94E1;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 30px;
        }
        footer {
            background-color: #E67575;
            margin-top: 100px;
            padding-left: 100px;
            padding-right: 100px;
            height: 305px;
            color: white;
        }
        footer a{
            color: white;
            text-decoration: none;
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

<div class="judul">
    <a href="#" onclick="history.back(); return false;" class="balek">< Deskripsi Kucing</a>
</div>

<img src="/assets/images/jejak2.png" alt="jejak" class="jejak">

<div class="list-kucing">
    <div class="kucing-item">
        <div class="details">
            <div class="name"><?php echo $persia['nama']; ?></div>
            <div class="ready">Siap Diadopsi</div>
            <div class="price-address">
                <div class="price">Rp. <?php echo number_format($persia['harga'], 0, ',', '.'); ?></div>
                <div class="address"><?php echo $persia['lokasi']; ?></div>
            </div>
            <div class="description"><?php echo $persia['deskripsi']; ?></div>
            <div class="buttons">
                <a href="<?php echo $persia['alamat_google_maps']; ?>" target="_blank" class="location-button">Alamat Lengkap</a>
                <a href="https://api.whatsapp.com/send?phone=<?php echo $persia['nomor_whatsapp']; ?>" target="_blank" class="whatsapp-button">Chat dengan pemilik</a>
            </div>
        </div>
        <img src="/uploads/<?php echo $persia['gambar']; ?>" alt="<?php echo $persia['nama']; ?>">
    </div>
</div>

<footer>
    <div class="logo-footer">
        <img src="/assets/images/logo.png" alt="logo-footer">
    </div>
    <div class="tentang-footer">
        <p class="komunitas-pecinta-kucing">Komunitas Pecinta Kucing</p>
        <p>Disini tempat bagi para pecinta kucing untuk terhubung, berbagi, dan belajar bersama! Disini kamu dapat berdiskusi yang memungkinkan kamu untuk berbagi informasi, cerita, pengalaman, dan tips sesama pecinta kucing.</p>
    </div>
    <div class="kontak">
        Kontak Kami
    </div>
    <div class="kontak1">WA: 081234567890 - Abel</div>
    <div class="kontak2">Tlp.: 2131238312 - Abel</div>
    <div class="sosialmedia">
        Sosial Media
    </div>
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
