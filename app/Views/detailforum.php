<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="assets/img" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Forum</title>
<style>
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
    .title a{
        text-decoration: none;
        color: black;
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
        top: 20px;
        left: 20px;
    }
    header .logo {
        position: absolute;
        top: 0;
        right: 0;
        border-bottom-left-radius: 50%;
        background-color: #6C94E1;
        padding: 10px;
    }
    header .logo img {
        height: 40px;
        width: auto;
    }
    .content-container {
        display: flex;
        justify-content: left;
        margin: 20px auto;
        width: 90%;
    }
    .forum-detail {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Sans-Serif;
        width: 70%;
    }
    .post {
        background-color: #D7E5FF;
        width: 80%;
        padding: 20px;
        margin: 70px 50px;
        margin-bottom: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .post-title {
        font-size: 24px;
        font-weight: bold;
        margin-top: 15px;
        margin-left: 10px;
    }
    .post-author {
        font-size: 16px;
        color: #555;
        margin-top: 5px;
        margin-left: 10px;
    }
    .post-date {
        font-size: 14px;
        color: #999;
        margin-top: 10px;
        margin-left: 10px;
    }
    .post-description {
        margin: 20px 0;
        font-size: 18px;
        margin-left: 10px;
    }
    .post-actions {
        display: flex;
        justify-content: flex-start;
    }
    .post-actions .love-btn {
        background-color: #F3C772;
        color: white;
        height: 45px;
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
    .post-actions button img {
        margin-right: 0px;
    }
    .post-actions .love-btn img {
        filter: none;
        margin-left: 5px;
    }
    .post-actions .love-btn.liked img {
        filter: invert(32%) sepia(77%) saturate(6463%) hue-rotate(356deg) brightness(100%) contrast(106%);
    }
    .post a {
        text-decoration: none;
        color: black;
    }
    .balasan {
        position: relative;
        font-family: Sans-Serif;
        font-weight: bold;
        font-size: 20px;
    }
    .tombolbalas {
        position: absolute;
        margin-top: 470px;
        margin-left: 850px;
    }
    .tombolbalas a{
        text-decoration: none;
        color: black;
        font-family: Sans-Serif;
        font-weight: bold;
    }
    .comments-section {
        width: 80%;
        margin: 10px 50px;
    }
    .comment {
        background-color: #F9F9F9;
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: -10px;
        border-radius: 5px;
    }
    .comment-author {
        font-size: 18px;
        font-weight: bold;
        color: black;
    }
    .comment-date {
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }
    .comment-text {
        font-size: 16px;
        margin-top: 20px;
    }
    .post .gambar-post {
        width: 400px;
        height: auto;
        object-fit: cover;
        border-radius: 30px; /* Membuat gambar menjadi melengkung */
        overflow: hidden; /* Memastikan gambar terpotong menjadi melengkung */
        margin-left: 10px;
    }
    footer {
        background-color: #E67575;
        margin-top: 30px;
        margin-bottom: -20px;
        padding-left: 100px;
        padding-right: 100px;
        width: 100%;
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
    <a href="/forum">
        < FORUM
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

<div class="balasan">Balasan</div>

<div class="tombolbalas">
    <a href="/balaspost">
        Balas Post
    </a>
</div>

<div class="content-container">
        <div class="forum-detail">
            <div class="post">
                <div class="post-title"><?= esc($post['judul']) ?></div>
                <div class="post-author">Oleh: <?= esc($post['nama_pengirim']) ?></div>
                <div class="post-date">Diunggah: <?= date('d M Y', strtotime($post['created_at'])) ?></div>
                <div class="post-description"><?= esc($post['deskripsi']) ?></div>
                <img class="gambar-post" src="/uploads/<?= esc($post['gambar']) ?>" alt="<?= esc($post['gambar']) ?>">
                <div class="post-actions">
                </div>
                <div class="post-actions">
                        <button class="love-btn"><img src="/assets/images/love1.png" alt="Love" width="25" height="20"></button>
                    </div>
            </div>

            <div class="balasan">Balasan</div>
            <div class="comments-section">
                <?php if ($comments): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <div class="comment-author"><?= esc($comment['author']) ?></div>
                            <div class="comment-date">Diunggah: <?= date('d M Y', strtotime($comment['created_at'])) ?></div>
                            <div class="comment-text"><?= esc($comment['content']) ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Belum ada balasan.</p>
                <?php endif; ?>
            </div>
            <div class="container mt-5">
            <h6 class="h6" style="margin-left: 80px;">Tambahkan Komentar</h6>
                <form action="/detailforum/comment" method="post" class="offset-sm-1">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <input type="text" name="author" class="form-control" placeholder="Nama Kamu" style="background-color: #F9F9F9;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" placeholder="Komentar Kamu" style="background-color: #F9F9F9;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    const loveButtons = document.querySelectorAll('.love-btn');
    loveButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('liked');
        });
    });
</script>

</body>
</html>
