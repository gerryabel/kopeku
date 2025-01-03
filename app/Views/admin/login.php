<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom CSS untuk halaman login */
        .login-container {
            margin-top: 200px; /* Menentukan jarak dari atas halaman */
        }
        .logo img {
            max-width: 80%;
            height: auto;
            margin-top: 10px;
            padding-right: 100px;
        }
        .logo-text {
            margin-top: 10px; /* Adjust margin as needed */
            font-size: 2rem;
            color: #007bff; /* Change color as needed */
            font-weight: 600;
            margin-left: 40px;
        }
</style>
<body>
    <div class="container login-container mx-auto">
        <div class="row justify-content-center">
            <div class="logo">
                    <img src="/assets/images/logo.png" alt="Logo">
                    <div class="logo-text">KOPEKU</div>
                </div>
            <div class="col-md-6">
                <h2 class="text-center">Login Admin Kopeku</h2>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <form action="/admin/auth/loginauth" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Menggunakan Bootstrap JavaScript (opsional, tergantung pada kebutuhan Anda) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
