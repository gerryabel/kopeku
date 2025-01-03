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
    <title>Kategori Sphynx</title>

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
            font-weight: bold;
            text-align: center;
            margin-top: 25px;
            font-size: 30px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin: 30px auto;
        }
        .search-box {
            position: relative;
            display: flex;
            align-items: center;
        }
        #search-input {
            height: 30px;
            padding: 5px 10px;
            font-size: 16px;
            border: 0px solid #ccc;
            width: 300px;
            color: black;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            background-color: #F5E6CA;
        }
        #search-input:focus,
        #search-input:active {
            outline: none; /* Menghapus border saat input mendapat fokus */
            border-color: transparent; /* Mengubah warna border menjadi transparan saat input mendapat fokus */
        }
        .iconamoon--search-bold {
            cursor: pointer;
            width: 40px;
            height: 40px;
            background-color: #F3C772;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border: 0px solid #ccc;
        }
        .iconamoon--search-bold::before {
            content: "";
            display: block;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='none' stroke='black' stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314'/%3E%3C/svg%3E");
        }
        .list-kucing {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 70px auto;
            gap: 20px;
        }
        .list-kucing .kucing-item {
            background-color: #FFF3E5;
            padding: 40px;
            border-radius: 10px;
            width: 300px;
            text-align: left;
            font-size: 18px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
        }
        .list-kucing .kucing-item img {
            width: 300px;
            height: 160px;
            border-radius: 10px;
            object-fit: cover;
        }
        .list-kucing .kucing-item .details {
            margin-top: 10px;
            text-align: left;
            width: 100%;
        }
        .list-kucing .kucing-item .details .name {
            font-weight: bold;
            font-size: 22px;
        }
        .list-kucing .kucing-item .details .ready {
            color: green;
            font-weight: normal;
            font-size: 13px;
            margin-left: 0px;
        }
        .list-kucing .kucing-item .details .price-address {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 15px;
        }
        .list-kucing .kucing-item .details .price {
            color: #E67575;
            margin-top: 5px;
        }
        .list-kucing .kucing-item .details .description {
            margin-top: 20px;
            font-size: 14px;
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

<div class="judul">Kategori Kucing Sphynx</div>

<img src="/assets/images/jejak2.png" alt="jejak" class="jejak">

<div class="search-container">
    <div class="search-box">
        <input type="text" id="search-input" placeholder="Cari Disini...">
        <div class="iconamoon--search-bold" id="search-button"></div>
    </div>
</div>

<div class="list-kucing">
    <?php $sphynx = array_reverse($sphynx); // Membalikkan urutan array posts ?>
    <?php foreach ($sphynx as $sphynx): ?>
    <a href="/detailkucingsphynx/<?php echo $sphynx['id']; ?>" class="kucing-item">
        <img src="/uploads/<?php echo $sphynx['gambar']; ?>" alt="<?php echo $sphynx['nama']; ?>">
        <div class="details">
            <div class="name"><?php echo $sphynx['nama']; ?></div>
            <div class="ready">Siap Diadopsi</div>
            <div class="price-address">
                <div class="price">Rp. <?php echo $sphynx['harga']; ?></div>
                <div class="address"><?php echo $sphynx['lokasi']; ?></div>
            </div>
            <div class="description"><?php echo $sphynx['deskripsi']; ?></div>
        </div>
    </a>
    <?php endforeach; ?>
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

<script>
    document.getElementById('search-input').addEventListener('input', function () {
        const searchQuery = this.value.toLowerCase();
        const kucingItems = document.getElementsByClassName('kucing-item');

        for (let i = 0; i < kucingItems.length; i++) {
            const item = kucingItems[i];
            const name = item.getElementsByClassName('name')[0].textContent.toLowerCase();
            const address = item.getElementsByClassName('address')[0].textContent.toLowerCase();

            if (name.includes(searchQuery) || address.includes(searchQuery)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        }
    });
</script>

</body>
</html>
