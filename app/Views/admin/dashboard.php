<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            display: flex;
            flex-direction: column;
            height: 100vh;
            font-weight: 550;
        }
        .nav-item {
            margin-top: 12px;
        }
        .nav.flex-column {
            flex-grow: 1;
        }
        .logout-link {
            margin-top: 350px;
        }
        main {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1.h2 {
            color: #343a40;
            margin-bottom: 20px;
            font-weight: bold;
        }
        p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .logo {
            margin: 20px 10px; /* Adjust margin as needed */
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
            color: #343a40;
        }
        .logo img {
            max-width: 30%;
            height: auto;
        }
        .logo-text {
            margin-top: 10px; /* Adjust margin as needed */
            font-size: 1.2rem;
            color: #007bff; /* Change color as needed */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <div class="logo">
                        <img src="/assets/images/logo.png" alt="Logo">
                        <div class="logo-text">KOPEKU</div>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/artikel">
                                Data Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="kucingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Data Kucing
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="kucingDropdown">
                                <li><a class="dropdown-item" href="/admin/domestik">Domestik</a></li>
                                <li><a class="dropdown-item" href="/admin/anggora">Anggora</a></li>
                                <li><a class="dropdown-item" href="/admin/persia">Persia</a></li>
                                <li><a class="dropdown-item" href="/admin/sphynx">Sphynx</a></li>
                                <li><a class="dropdown-item" href="/admin/mainecoon">Maine Coon</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="logout-link">
                        <a class="nav-link" href="/admin/auth/logout">Log Out</a>
                    </div>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1 class="h2">Kopeku Admin</h1>
                <p>Selamat Datang Admin Kopeku!</p>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
