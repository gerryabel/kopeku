<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .custom-back-button {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
        }
        .custom-back-button:hover {
            background-color: #45a049; /* Darker green */
        }
</style>
<body>
    <div class="container mt-5">
        <button class="btn custom-back-button mb-3" onclick="goBack()">Back</button>
        <h1>Tambah Artikel</h1>
        <!-- Formulir untuk menambahkan artikel -->
        <form action="/admin/artikel/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea class="form-control" id="isi" name="isi" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="mb-3">
                <label for="isi1" class="form-label">Isi-Bawah</label>
                <textarea class="form-control" id="isi1" name="isi1" required></textarea>
            </div>
            <div class="mb-3">
                <label for="isi2" class="form-label">Isi-Bawah</label>
                <textarea class="form-control" id="isi2" name="isi2" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <!-- JavaScript untuk Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
