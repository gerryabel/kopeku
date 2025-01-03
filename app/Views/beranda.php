<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Komunitas Pecinta Kucing</title>
    <meta name="description" content="Para Cat Lovers berkumpul disini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    

    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            background-color: #FDF8F4;
            font-family: 'Jua', sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0; 
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        welcome {
            padding: .4rem 0 0;
        }
        /* CSS untuk gambar latar belakang */
        .background-image {
            position: absolute;
            top: -60px;
            left: -90px;
            z-index: 1; /* Menempatkan gambar di belakang */
        }
        .background-image img {
            width: 730px; /* Sesuaikan ukuran gambar */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            /* atur posisi gambar di sini */
            top: 20px;
            left: 20px;
        }
        .menu {
            position: fixed;
            top: 20px; /* Atur agar menu tetap di bagian atas layar */
            left: 20px; /* Atur agar menu tetap di bagian kiri layar */
            z-index: 4; /* Pastikan menu berada di atas konten lain */
        }
        welcome ul {
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: left;
        }
        welcome li {
            display: inline-block;
        }
        welcome li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, 1);
            display: block;
            height: 44px;
            text-decoration: none;
        }
        welcome li.menu-item {
            float: left; /* Menu-item berada di sebelah kanan */
        }
        welcome li.menu-item a {
            border-radius: 30px;
            margin: 10px 0; /* Sesuaikan margin agar menu-item terpisah */
            height: 38px;
            line-height: 36px;
            padding: .4rem 1.5rem;
            text-align: left;
            width: auto;
            font-size: 17px;
        }
        welcome li.menu-item a:hover{
            color: rgba(108, 148, 225, 1);
        }
        welcome .logo {
            float: left;
            width: 44px;
            height: 44px;
            padding: .4rem .5rem;
            margin-right: 50px; /* Berikan ruang antara logo dan menu-item */
        }
        welcome .logo img {
            width: 60px; /* Mengurangi ukuran lebar */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            margin-left: 30px;
        }
        welcome .heroe {
            position: relative;
            margin: 230px 140px;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
            z-index: 2;
        }
        welcome .heroe img {
            width: 600px; /* Sesuaikan lebar gambar dengan kebutuhan Anda */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            position: absolute; /* Tambahkan posisi absolut */
            top: 30%; /* Atur posisi vertikal ke tengah */
            right: -155px; /* Atur posisi horizontal ke ujung kanan */
            transform: translateY(-50%); /* Pusatkan gambar secara vertikal */
        }
        .heroe img:nth-of-type(1) {
            width: 650px; /* Sesuaikan ukuran lebar gambar */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            position: absolute; /* Tambahkan posisi absolut */
            top: 23%; /* Atur posisi vertikal ke tengah */
            left: -95px; /* Atur posisi horizontal ke kiri */
            transform: translateY(-50%); /* Pusatkan gambar secara vertikal */
            z-index: -1;
        }
        .heroe .gam3 {
            position: absolute;
            top: 90%; /* Atur posisi vertikal ke tengah */
            left: 3%; /* Atur posisi horizontal ke kiri */
            transform: translate(-50%, -50%); /* Pusatkan gambar secara vertikal dan horizontal */
            width: 140px; /* Sesuaikan ukuran lebar gambar */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
            z-index: -1; /* Letakkan gambar di belakang konten */
        }
        welcome .heroe h1 {
            color: #ffffff;
            font-size: 2.6rem;
            font-weight: 500;
        }
        welcome .heroe h1.special {
            margin-top: -15px;
            margin-left: 135px;
            font-size: 2.6rem;
        }
        welcome .heroe h2 {
            margin: 80px 35px;
            font-size: 1.3rem;
            font-weight: 300;
        }
        welcome .heroe h2.special {
            margin-top: -70px;
            margin-left: 160px;
            font-size: 1.3rem;
        }
        .social-icons {
            position: absolute;
            top: 20px; /* Sesuaikan jarak dari atas */
            right: 60px; /* Sesuaikan jarak dari kanan */
            z-index: 100; /* Pastikan berada di atas elemen lainnya */
        }
        .social-icons a {
            margin-left: 10px; /* Jarak antar ikon */
            text-decoration: none;
        }
        .social-icons img {
            width: 30px; /* Sesuaikan ukuran lebar ikon */
            height: auto; /* Menyesuaikan tinggi secara proporsional */
        }
        /* Gaya khusus untuk setiap ikon media sosial */
        .social-icons a.tiktok img {
            width: 30px;
        }
        .social-icons a.instagram img {
            width: 40px;
        }
        .social-icons a.whatsapp img {
        }
        .scrollv {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 130px;
            margin-top: -255px;
            animation: float 3s ease-in-out infinite;
        }
        .scrollv h1 {
            font-size: 18px;
        }
        .scrollv p {
            font-size: 18px;
            margin-top: -10px;
        }
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
        .tentang {
            position: relative;
            overflow: hidden;
            background-color: #FFF3E5;
            border-radius: 40px;
            margin: 0 auto;
            max-width: 1050px;
            height: 450px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
            z-index: 3;
            margin-bottom:200px;
        }
        .ten2 {
            position: absolute; /* Tambahkan properti position */
            z-index: -1; /* Atur z-index agar berada di belakang teks */
            top: 63px; /* Atur posisi gambar */
            left: 645px; /* Atur posisi gambar */
        }
        .ten1 {
            margin: 0 20px;
            width: 450px;
            float: left; /* Letakkan gambar di sebelah kiri */
            margin-top:40px;
            margin-right: 20px; /* Berikan sedikit ruang antara gambar dan teks */
            padding-right: 50px;
        }
        .ten3 {
            margin: 0 20px;
            width: 130px;
            margin-top:370px;
            position: absolute;
            margin-left: 350px;
        }
        .tentang h1 {
            color: #ffffff;
            font-size: 32px;
            margin-top: 50px;
            margin-bottom: 70px;
            margin-left: 640px;
        }
        .tentang p {
            margin-right: 50px;
            font-size: 27px;
        }
        .galeri {
            position: relative;
            overflow: hidden;
            background-color: #FFF3E5;
            border-radius: 40px;
            margin: 0 auto;
            max-width: 1050px;
            height: 370px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
            z-index: 3;
        }
        .gal1 {
            position: absolute; /* Tambahkan properti position */
            width: 200px;
            z-index: -1; /* Atur z-index agar berada di belakang teks */
            top: 30px; /* Atur posisi gambar */
            left: 450px; /* Atur posisi gambar */
        }
        .galeri h1{
            font-size: 30px;
            text-align: center;
            margin: 0;
            text-decoration: none;
        }
        .gal1-link {
            color: #ffffff;
            text-decoration: none; /* Menghapus garis bawah pada teks */
        }
        .galal {
            position: absolute;
            display: flex; /* Menata gambar secara horizontal */
            z-index: -1;
            margin-top: 25px;
            margin-left: -20px;
        }
        .galal img {
            width: 225px; /* Atur lebar gambar */
            height: 225px; /* Atur tinggi gambar */
            object-fit: cover; /* Membuat gambar tetap proporsional */
        }
        .galal-loop {
            animation: scroll 200s linear infinite; /* Sesuaikan durasi animasi */
            white-space: nowrap; /* Agar gambar-gambar tidak turun ke baris baru */
            z-index: -1;
        }
        .gal7 {
            position: absolute;
            z-index: 99;
            width: 130px;
            left: 900px;
            top: 330px;
        }
        .artikel {
            position: relative;
            overflow: hidden;
            background-color: #FFF3E5;
            border-radius: 40px;
            margin: 200px auto;
            margin-bottom: -100px;
            max-width: 1050px;
            height: 900px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
            z-index: 3;
        }
        .arti6 {
            position: absolute;
            width: 160px;
            left: 270px;
            top: 2250px;
            z-index: 4;
        }
        .artikel h1 {
            color: #ffffff;
            font-size: 24px;
            margin-top: 13px;
            text-align: center;
        }
        .artikel a {
            text-decoration: none;
        }
        .arti2 {
            position: absolute; /* Tambahkan properti position */
            width: 150px;
            z-index: -1; /* Atur z-index agar berada di belakang teks */
            top: 35px; /* Atur posisi gambar */
            left: 475px; /* Atur posisi gambar */
        }
        .isi {
            position: absolute;
            left: 45px;
        }
        .isi a {
            display: flex; /* Menata gambar secara horizontal */
            text-decoration: none; /* Menghapus garis bawah pada hyperlink */
            color: #000000;; /* Mengambil warna teks dari parent element */
        }
        .isi:nth-of-type(1) {
            top: 125px;
        }

        .isi:nth-of-type(2) {
            top: 340px; /* Sesuaikan jarak vertikal dengan elemen sebelumnya */
        }

        .isi:nth-of-type(3) {
            top: 555px; /* Sesuaikan jarak vertikal dengan elemen sebelumnya */
        }

        .isi:nth-of-type(4) {
            top: 770px; /* Sesuaikan jarak vertikal dengan elemen sebelumnya */
        }
        .isi img {
            width: 270px; /* Atur lebar gambar */
            height: 200px; /* Atur tinggi gambar */
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            object-fit: cover; /* Membuat gambar tetap proporsional */
        }
        .isi1 {
            color: #ffffff;
            font-size: 24px;
            text-align: center;
            margin-top: 12px;
        }
        .isi .isi-text {
            background-color: #FDF8F4;
            width: 720px;
            flex: 1; /* Membuat teks menempati ruang yang tersedia */
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            padding-left: 30px; /* Memberikan ruang antara teks dan gambar */
        }
        .isi .isi-text h2 {
            font-size: 24px; /* Ukuran font */
            margin-bottom: 10px; /* Ruang bawah antara judul dan paragraf */
        }
        .isi .isi-text p {
            width: 600px;
            font-size: 18px; /* Ukuran font */
            line-height: 1.5; /* Jarak antara baris */
        }
        .adopsi {
            position: relative;
            overflow: hidden;
            border-radius: 40px;
            margin: 180px auto;
            max-width: 1050px;
            height: 1200px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
            z-index: 3;
        }
        .judul {
            color: white;
            text-align: center;
        }
        .adopsi1 {
            position: absolute; /* Tambahkan properti position */
            width: 270px;
            z-index: -1; /* Atur z-index agar berada di belakang teks */
            top: 33px; /* Atur posisi gambar */
            left: 420px; /* Atur posisi gambar */
        }
        .kotak {
            position: absolute;
            display: flex; /* Menata elemen secara horizontal */
            flex-direction: column;
            width: 330px;
            height: 350px;
            border-radius: 25px;
            background-color: #FFF3E5; /* Warna latar belakang kotak */
            display: flex;
            justify-content: center; /* Pusatkan teks secara horizontal */
            align-items: center; /* Pusatkan teks secara vertikal */
            margin-top: 50px;
        }
        .kotak-pertama {
            top: 100px;
            left: 215px;
        }
        .kotak-kedua {
            top: 100px;
            right: 215px;
        }
        .kotak-ketiga {
            bottom: 530px;
            left: 360px; /* Menggunakan 'calc' untuk menentukan posisi horizontal tepat di tengah */
            width: 400px;
            height: 250px;
        }
        section#adopsi .kotak-ketiga h1 {
            font-size: 20px;
            margin-top: -150px;
            margin-bottom: 10px;
            text-align: center;
        }
        section#adopsi .kotak-ketiga p {
            font-size: 20px;
            margin-top: 10px;
            text-align: center;
        }
        .kotak h1 {
            position: absolute;
            margin-bottom: 10px; /* Tambahkan margin bawah agar terpisah dari teks */
            text-align: center; /* Pusatkan teks */
            font-size: 19px;
            margin-top: -240px;
        }
        .kotak p {
            position: absolute;
            color: black;
            font-size: 19px;
            text-align: center; /* Pusatkan teks */
            padding-right: 50px;
            padding-left: 50px;
            top: 85px;
        }
        section#adopsi .kotak-pertama::after {
            content: '';
            display: block;
            width: 65%;
            height: 2.5px;
            background-color: #F5E6CA;
            margin-top: -160px; /* Sesuaikan jarak antara garis dan konten di dalam .kotak */
            margin-bottom: 20px; /* Sesuaikan jarak antara garis dan konten di bawah .kotak */
        }
        section#adopsi .kotak-kedua::after {
            content: '';
            display: block;
            width: 65%;
            height: 2.5px;
            background-color: #F5E6CA;
            margin-top: -150px; /* Sesuaikan jarak antara garis dan konten di dalam .kotak */
            margin-bottom: 20px; /* Sesuaikan jarak antara garis dan konten di bawah .kotak */
        }
        section#adopsi .kotak-ketiga::after {
            content: '';
            display: block;
            width: 65%;
            height: 2.5px;
            background-color: #F5E6CA;
            margin-top: -80px; /* Sesuaikan jarak antara garis dan konten di dalam .kotak */
            margin-bottom: 20px; /* Sesuaikan jarak antara garis dan konten di bawah .kotak */
        }
        .garis1 {
            position: absolute;
            display: flex; /* Menata elemen secara horizontal */
            flex-direction: column;
            width: 70%;
            height: 5px;
            border-radius: 25px;
            background-color: #FFF3E5; /* Warna latar belakang kotak */
            display: flex;
            justify-content: center; /* Pusatkan teks secara horizontal */
            align-items: center; /* Pusatkan teks secara vertikal */
            margin-top: 690px;
            margin-left: 135px;
        }
        .jenis {
            position: absolute;
            margin-top: 730px;
            margin-left: 330px;
            font-size: 15px;
        }
        .kotak-keempat {
            position: absolute;
            display: grid; /* Menggunakan grid layout */
            grid-template-columns: repeat(5, 1fr); /* Membagi area menjadi 5 kolom yang sama lebar */
            width: 730px;
            height: 310px;
            border-radius: 25px;
            background-color: #FFF3E5;
            margin-top: 800px;
            margin-left: 150px;
        }
        .gambar-kotak {
            margin-left: 80px;
            margin-top: 40px;   
        }
        .gambar-kotak img {
            width: 170px; /* Atur lebar gambar */
            height: 100px; /* Atur tinggi gambar */
            object-fit: cover; /* Membuat gambar tetap proporsional */
            border-radius: 100px;
            filter: brightness(70%);
        }
        .gambar-kotak:nth-child(1) {
            position: absolute;
            grid-row: 2; /* Menempatkan gambar keempat di baris kedua */
            margin-left:110px;
        }
        .gambar-kotak:nth-child(2) {
            position: absolute;
            grid-row: 2; /* Menempatkan gambar keempat di baris kedua */
            margin-left: 300px;
        }
        .gambar-kotak:nth-child(3) {
            position: absolute;
            grid-column: 1 / span 1; /* Menempatkan gambar keempat di kolom 1 hingga 3 */
            grid-row: 2; /* Menempatkan gambar keempat di baris kedua */
            margin-left: 490px;
        }
        .gambar-kotak:nth-child(4) {
            position: absolute;
            grid-row: 2; /* Menempatkan gambar keempat di baris kedua */
            margin-top: 170px;
            margin-left: 200px;
        }
        /* Posisi khusus untuk gambar kelima */
        .gambar-kotak:nth-child(5) {
            position: absolute;
            grid-row: 2; /* Menempatkan gambar kelima di baris kedua */
            margin-top: 170px;
            margin-left: 390px;
        }
        .teks-di-gambar {
            position: absolute;
            bottom: 40px; /* Penyesuaian posisi teks di bagian bawah gambar */
            left: 50%; /* Pusatkan teks secara horizontal */
            transform: translateX(-50%); /* Pusatkan teks secara horizontal */
            color: white; /* Warna teks */
            font-size: 20px; /* Ukuran teks */
            border-radius: 5px; /* Border radius teks */
        }
        .teks-di-gambar11 {
            position: absolute;
            margin-top: -65px;
            margin-left: 27px;
            font-size: 20px;
            text-decoration: none;
            color: white;
        }
        .forum {
            position: relative;
            background-color: #6C94E1;
            width: 100%;
            height: 300px;
            margin-top: -130px;
            margin-bottom: 50px;
        }
        .forum-teks1 {
            position: absolute;
            color: white;
            margin-top: 80px;
            margin-left: 510px;
        }
        .forum-teks2 img{
            position: absolute;
            width: 300px;;
            margin-top: 1px;
            margin-left: 100px;
        }
        .forum-teks22 {
            position: absolute;
            bottom: -50px; /* Penyesuaian posisi teks di bagian bawah gambar */
            left: 50%; /* Pusatkan teks secara horizontal */
            transform: translateX(-50%); /* Pusatkan teks secara horizontal */
            color: white; /* Warna teks */
            font-size: 25px; /* Ukuran teks */
            border-radius: 5px; /* Border radius teks */
        }
        .forum-jejak {
            position: absolute;
            width: 150px;
            left: 700px;
            top: 175px;
        }
        .donasi {
            position: relative;
            overflow: hidden;
            background-color: #FFF3E5;
            border-radius: 40px;
            margin: 150px auto;
            margin-bottom: 110px;
            max-width: 730px;
            height: 350px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
            z-index: 3;
        }
        .donasi1 {
            position: absolute;
            width: 180px;
            margin-left: 30px;
            margin-top: 5px;
        }
        .teks-donasi1 {
            position: absolute;
            font-size: 35px;
            margin-top: 120px;
            margin-left: 40px;
        }
        .teks-donasi2 {
            position: absolute;
            font-size: 25px;
            margin-top: 170px;
            margin-left: 40px;
            width: 450px;
        }
        .teks-donasi3 {
            position: absolute;
            font-size: 25px;
            margin-top: 270px;
            margin-left: 40px;
        }
        .teks-donasi4 {
            position: absolute;
            font-size: 25px;
            margin-top: 305px;
            margin-left: 40px;
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
            @keyframes scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(-100%); }
            }
    </style>
</head>
<body>

<!-- welcome: MENU + HEROE SECTION -->
<welcome>

<div class="background-image" id="background-section">
    <img src="/assets/images/bg1.png" alt="bg1" />
</div>


    <div class="menu">
        <ul>
        <li class="logo">
            <a href="#background-section">
            <img src="assets/images/logo.png" alt="Logo">
            </a>
        </li>
            <li class="menu-item hidden"><a href="#tentang">Tentang Kami</a></li>
            <li class="menu-item hidden"><a href="#galeri">Gallery</a>
            </li>
            <li class="menu-item hidden"><a href="#artikel">Artikel</a></li>
            <li class="menu-item hidden"><a href="#adopsi">Adopsi</a>
            </li>
            <li class="menu-item hidden"><a href="#donasi">Donasi</a></li>
        </ul>
    </div>

    <div class="heroe">

        <h1>KOMUNITAS PECINTA</h1>
        <h1 class= "special">KUCING</h1>
        <img src="/assets/images/gam2.png" alt="Gam2">
        <h2>Dimana kucing - kucing membawa kita</h2>
        <h2 class="special">bersama</h2>
        <img src="/assets/images/gam1.png" alt="Gam1">
        <img src="/assets/images/gam3.png" alt="Gam3" class="gam3">

    </div>

</welcome>

<sosmed>

    <div class="social-icons">
        <a href="https://www.tiktok.com" target="_blank" class="tiktok">
            <img src="assets/images/tiktok.png" alt="TikTok">
        </a>
        <a href="https://www.instagram.com" target="_blank" class="instagram">
            <img src="assets/images/ig.png" alt="Instagram">
        </a>
        <a href="https://web.whatsapp.com" target="_blank" class="whatsapp">
            <img src="assets/images/wa.png" alt="TikTok">
        </a>
    </div>

</sosmed>

<section class="scrollv">

    <h1>Scroll</h1>
    <p>V</p>

</section>

<!-- CONTENT -->

<section id="tentang" class="tentang">

    <img src="/assets/images/ten2.png" alt="ten1" class="ten2">
    <img src="/assets/images/ten1.png" alt="ten1" class="ten1">
    <img src="/assets/images/jejak1.png" alt="ten1" class="ten3">
    <h1>Tentang Kami</h1>
    <p>Disini tempat bagi para pecinta kucing untuk terhubung, berbagi, dan belajar bersama! Disini kamu dapat berdiskusi yang memungkinkan kamu untuk berbagi informasi, cerita, pengalaman, dan tips sesama pecinta kucing.</p>

</section>

<section id="galeri" class="galeri">


    <img src="/assets/images/jejak1.png" alt="gal7" class="gal7">
    <h1><a href="/galeri" class="gal1-link"><img src="/assets/images/gal1.png" alt="gal1" class="gal1"> Gallery</a></h1>
    <div class=galal>
        <div class="galal galal-loop">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
            <img src="/assets/images/gal2.jpg" alt="gal2">
            <img src="/assets/images/gal3.jpg" alt="gal3">
            <img src="/assets/images/gal4.jpg" alt="gal4">
            <img src="/assets/images/gal5.jpg" alt="gal5">
            <img src="/assets/images/gal6.jpg" alt="gal6">
        </div>
    </div>

</section>

<img src="/assets/images/jejak2.png" alt="arti6" class="arti6">
<section id="artikel" class="artikel">
    <a href="/artikel"><h1>Artikel</h1></a>
    <img src="/assets/images/arti2.png" alt="arti2" class="arti2">
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $beranda): ?>
            <div class="isi">
                <a href="/isiartikel/<?= esc($beranda['id']) ?>"> <!-- Asumsi ada route untuk melihat artikel lengkap -->
                    <img src="/uploads/<?= esc($beranda['gambar']) ?>" alt="<?= esc($beranda['judul']) ?>">
                    <div class="isi-text">
                        <h2><?= esc($beranda['judul']) ?></h2>
                        <p><?= esc($beranda['isi']) ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada artikel yang tersedia.</p>
    <?php endif; ?>
</section>


<section id="adopsi" class="adopsi">

    <h1 class="judul">Pengadopsian Kucing</h1>
    <img src="/assets/images/adopsi1.png" alt="adopsi1" class="adopsi1">
    <div class="kotak kotak-pertama">
        <h1>Apa itu adopsi?</h1>
        <p>Adopsi adalah tindakan memberikan rumah baru bagi hewan yang membutuhkan tetapi juga menciptakan ikatan yang kuat antara manusia dan binatang.</p>
    </div>
    <div class="kotak kotak-kedua">
        <h1>Apa yang diperlukan sebelum mengadopsi kucing?</h1>
        <p>Sebelum mengadopsi hewan, sangat penting untuk mempertimbangkan kesiapan finansial, ruang, waktu, dan komitmen jangka panjang untuk merawat dan menyediakan perawatan yang dibutuhkan oleh kucing.</p>
    </div>
    <div class="kotak kotak-ketiga">
        <h1>Bagaimana cara mengadopsinya?</h1>
        <p>Dengan memberinya makanan yang cukup bergizi, bermain bersama, memandikan kucing agar tetap sehat, dan beri kasih sayang.</p>
    </div>
    <div class="garis1"></div>
    <div class="jenis"><h2>Pilih jenis kucing yang kamu ingin adopsi</h2></div>
    <div class="kotak-keempat">
    <div class="gambar-kotak">
        <a href="/domestik">
            <img src="/assets/images/gal4.jpg" alt="Gambar 1">
            <div class="teks-di-gambar">DOMESTIK</div>
        </a>
    </div>
    <div class="gambar-kotak">
        <a href="/anggora">
            <img src="/assets/images/adop2.jpeg" alt="Gambar 2">
            <div class="teks-di-gambar">ANGGORA</div>
        </a>
    </div>
    <div class="gambar-kotak">
        <a href="/persia">
            <img src="/assets/images/gal3.jpg" alt="Gambar 3">
            <div class="teks-di-gambar">PERSIA</div>
        </a>
    </div>
    <div class="gambar-kotak">
        <a href="/sphynx">
            <img src="/assets/images/adop3.jpg" alt="Gambar 4">
            <div class="teks-di-gambar">SPHYNX</div>
        </a>
    </div>
    <div class="gambar-kotak">
        <a href="/mainecoon">
            <img src="/assets/images/gal6.jpg" alt="Gambar 5">
            <div class="teks-di-gambar11">MAINE COON</div>
        </a>
    </div>
</div>
    
</section>

<section class="forum">

    <div class="forum-teks1">
            <h1>Butuh Bantuan? Join Forum Diskusi kami disini!</h1>
    <div class="forum-teks2">
        <a href="/forum">
            <img src="/assets/images/forum1.png" alt="forum1">
            <div class="forum-teks22">Join forum diskusi!</div>
        </a>
    </div>
    <img src="/assets/images/jejak1.png" alt="forum-jejak" class="forum-jejak">

</section>  

<section id="donasi"class="donasi">

    <img src="/assets/images/donasi1.png" alt="donasi1" class="donasi1">
    <div class="teks-donasi1">DONASI</div>
    <div class="teks-donasi2">Bantu kucing yang membutuhkan dengan berdonasi</div>
    <div class="teks-donasi3">WA: 081234567890 - Abel</div>
    <div class="teks-donasi4">BNI: 2131238312 - Abel</div>
    
</section>
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

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

<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#tentang"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('tentang');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 300); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#background-section"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('background-section');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 300); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#galeri"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('galeri');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 300); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#artikel"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('artikel');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 300); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#adopsi"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('adopsi');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 350); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var tentangLink = document.querySelector('a[href="#donasi"]');
        tentangLink.addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tautan
            var tentangSection = document.getElementById('donasi');
            var headerHeight = document.querySelector('welcome').offsetHeight;
            var scrollPosition = tentangSection.offsetTop - (headerHeight - 300); // Mengurangi offset sedikit
            window.scrollTo({
                top: scrollPosition,
                behavior: 'smooth'
            }); // Menggulir secara halus ke bagian "Tentang" dengan kompensasi header
        });
    });
</script>

<!-- -->

</body>
</html>
