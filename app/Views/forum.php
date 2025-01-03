<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <title>Forum Diskusi</title>

    <style>
    /* Existing CSS */

    body {
        font-family: 'Jua', sans-serif;
        background-color: #FDF8F4;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    .title {
        position: absolute;
        font-size: 35px;
        margin-top: 30px;
        margin-left: 50px;
        z-index: 999;
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
    .gal2 img {
        position: absolute;
        top: 127.5px;
        left: 930px;
        width: 45px; /* Sesuaikan dengan lebar yang diinginkan */
        height: auto; /* Biarkan tinggi disesuaikan secara proporsional */
    }
    .search-container {
        display: flex;
        justify-content: center;
        margin: 30px;
        margin-left: -30px;
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
        background-color: #FFFFF;
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
        background-color: #6C94E1;
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
    .content-container {
        display: flex;
        justify-content: left;
        margin: 20px auto;
        width: 90%; /* Adjust the width as needed */
    }
    .forum-posts {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Sans-Serif;
        width: 70%; /* Adjust the width to create space for the ad section */
    }
    .post {
        background-color: #D7E5FF;
        width: 80%;
        padding: 20px;
        margin: 10px 50px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .post-title {
        font-size: 24px;
        font-weight: bold;
        margin-top: 15px;
    }
    .post-author {
        font-size: 16px;
        color: #555;
        margin-top: 5px;
    }
    .post-date {
        font-size: 14px;
        color: #999;
        margin-top: 10px;
    }
    .post-description {
        margin: 20px 0;
        font-size: 18px;
    }
    .post-actions {
        display: flex;
        justify-content: flex-start;
    }
    .post-actions .love-btn {
        background-color: #F3C772;
        color: white;
        border: none;
        padding-right: 10px;
        margin-right: 10px;
        border-radius: 30px;
        margin-top: 50px;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
    }
    .post-actions .reply-btn {
        background-color: #E67575;
        color: white;
        border: none;
        padding: 10px 15px;
        margin-right: 10px;
        border-radius: 30px;
        margin-top: 50px;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
    }
    .post-actions button img {
        margin-right: 0px;
    }
    .post-actions .love-btn img {
        filter: none; /* Reset any filters on the love image */
        margin-left: 5px;
    }
    .post-actions .love-btn.liked img {
        filter: invert(32%) sepia(77%) saturate(6463%) hue-rotate(356deg) brightness(100%) contrast(106%);
    }
    .post-actions .reply-btn img {
        margin-right: 10px;
    }
    .post a {
        text-decoration: none; /* Remove underline from links inside post */
        color: black;
    }
    .post .gambar-post {
        width: 400px;
        height: auto;
        object-fit: cover;
        border-radius: 30px; /* Membuat gambar menjadi melengkung */
        overflow: hidden; /* Memastikan gambar terpotong menjadi melengkung */
    }
    footer {
        background-color: #E67575;
        margin-top: 100px;
        margin-bottom: -20px;
        padding-left: 100px;
        padding-right: 100px;
        width: 1350px;
        height: 305px;
        color: white;
    }
    footer a {
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
        margin-left: 1040px;
        font-size: 21px;
    }
    footer .sosialmedia1,
    .sosialmedia2,
    .sosialmedia3 {
        font-size: 17px;
        text-decoration: none;
    }
    footer .sosialmedia1 {
        position: absolute;
        margin-top: 160px;
        margin-left: 1040px;
    }
    footer .sosialmedia2 {
        position: absolute;
        margin-top: 190px;
        margin-left: 1040px;
    }
    footer .sosialmedia3 {
        position: absolute;
        margin-top: 220px;
        margin-left: 1040px;
    }
</style>

</head>
<body>

<div class="title">FORUM</div>

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

<div class="search-container">
    <div class="search-box">
        <input type="text" id="search-input" placeholder="Cari Disini...">
        <div class="iconamoon--search-bold" id="search-button"></div>
    </div>
</div>
<div class="gal2">
    <a href="/buatpostforum">
        <img src="/assets/images/gall2.png" alt="gal1">
    </a>
</div>

<div class="content-container">
    <div class="forum-posts">
        <?php if ($posts): ?>
            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <a href="/detailforum/<?= $post['id'] ?>">
                        <div class="post-title"><?= esc($post['judul']) ?></div>
                        <div class="post-author">Oleh: <?= esc($post['nama_pengirim']) ?></div>
                        <div class="post-date">Diunggah: <?= date('d M Y', strtotime($post['created_at'])) ?></div>
                        <div class="post-description"><?= esc($post['deskripsi']) ?></div>
                        <img class="gambar-post" src="/uploads/<?= esc($post['gambar']) ?>" alt="<?= esc($post['gambar']) ?>">
                    </a>
                    <div class="post-actions">
                        <button class="love-btn"><img src="/assets/images/love1.png" alt="Love" width="25" height="20"></button>
                        <a href="/detailforum/<?= $post['id'] ?>" class="reply-btn">
                            <img src="/assets/images/chat.png" alt="Reply" width="20" height="20">Balas
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
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

<script>
    document.getElementById('search-input').addEventListener('input', function () {
        const searchQuery = this.value.toLowerCase();
        const posts = document.getElementsByClassName('post');

        for (let i = 0; i < posts.length; i++) {
            const post = posts[i];
            const title = post.getElementsByClassName('post-title')[0].textContent.toLowerCase();

            if (title.includes(searchQuery)) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        }
    });

    const loveButtons = document.querySelectorAll('.love-btn');
    loveButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('liked');
        });
    });
</script>

</body>
</html>
