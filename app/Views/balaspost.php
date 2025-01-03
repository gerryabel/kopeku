<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <title>Balas Post Kucing</title>

<style>
    body {
        font-weight: bold;
        font-family: sans-serif;
        background-color: #FDF8F4;
        margin: 0; /* Menghapus margin bawaan */
        padding: 0; /* Menghapus padding bawaan */
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
        background-color: #6C94E1; /* Warna latar belakang logo */
        padding: 10px; /* Padding untuk memberi ruang di sekitar logo */
    }
    header .logo img {
        height: 40px; /* Mengatur tinggi logo */
        width: auto; /* Mengatur lebar agar proporsional */
    }
    judul {
        position: relative;
        text-align: center; /* Pusatkan teks */
        top: 35px;
    }
    .isipost {
        margin: 55px auto;
        max-width:750px;
        padding: 20px;
        background-color: #D7E5FF;
        border-radius: 30px;
    }
    .isipost form div {
        margin-bottom: 5px;
    }
    .isipost form label {
    }
    .isipost form input[type="text"] {
        width: 60%; /* Set the width to 100% to fill the container */
        padding: 10px; /* Adjust padding as needed */
        border: 1px solid #ccc; /* Add border for clarity */
        border-radius:20px; /* Add border-radius for rounded corners */
        margin-bottom: 10px; /* Add some margin-bottom for spacing between inputs */
        color: #4E4E4E;
    }
    .isipost form input[type="submit"] {
        background-color: #5281DC;
        color: white;
        width: 15%;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 15px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .isipost form input[type="submit"]:hover {
        background-color: #426DC1
    }
    .isipost form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius:20px;
        resize: none;
    }
    .isipost form input[type="file"] {
        width: 100%; /* Sesuaikan lebar input */
        padding: 10px; /* Sesuaikan padding */
        border: 1px solid #ccc; /* Tambahkan border untuk kejelasan */
        border-radius: 20px; /* Tambahkan border-radius untuk sudut yang dibulatkan */
        margin-bottom: 10px; /* Beri sedikit margin-bottom untuk ruang antar input */
        background-color: white;
    }
    .isipost form .input-container .label-text {
        color: #4E4E4E;
        font-size: 14px;
        font-weight: bold; /* Atur tebal teks label */
        margin-left: 15px;
    }
    .input-container {
        position: relative;
        width: 98.5%;
        margin-bottom: 20px;
        border: none;
    }
    .isipost form {
        display: flex; /* Menjadikan form sebagai flex container */
    }

    .isipost form input[type="submit"] {
        background-color: #5281DC;
        color: white;
        width: 15%;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 15px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        float: right;
    }

    .cancel-button {
        display: inline-block;
        width: 10%; /* Ubah width agar sejajar dengan tombol submit */
        height: 19px;
        padding: 10px 20px;
        text-decoration: none;
        background-color: #E67575;
        color: #FFFFFF;
        font-size: 15px;
        text-align: center;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        float: right;
        margin-right: 15px;
    }
    .cancel-button:hover {
        background-color: #DF5454;
    }
    footer {
        background-color: #E67575;
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

<header>

<div class="background-image" id="background-section">
    <img src="/assets/images/bg1.png" alt="bg1" />
</div>
<div class="logo">
    <a href="/">
        <img src="assets/images/logo.png" alt="Logo">
    </a>
</div>

</header>

<judul>
    <h1>Balas Post</h1>
</judul>

<section class="isipost">
    <form action="/submit_reply" method="post" enctype="multipart/form-data">
        <div class="input-container">
            <div class="input-container">
                <div class="label-text">Nama Pengirim</div>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="input-container">
                <div class="label-text">Balasan</div>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <div class="input-container">
                <div class="label-text">Gambar jika ada</div>
                <input type="file" id="gambar" name="gambar" accept="image/*">
            </div>
            <input type="submit" value="Kirim Balasan" class="submit-button">
            <a href="#" onclick="history.back(); return false;" class="cancel-button">Batal</a>
    </form>
</section>


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



<script>
    <script>
    function removeLabel(textarea) {
        textarea.nextElementSibling.classList.add('active');
    }

    function checkLabel(textarea) {
        if (textarea.value.trim() === '') {
            textarea.nextElementSibling.classList.remove('active');
        }
    }
</script>

</script>


