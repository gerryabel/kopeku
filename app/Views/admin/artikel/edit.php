<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
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
        <h1>Edit Artikel</h1>
        <!-- Formulir untuk mengedit artikel -->
        <form action="/admin/artikel/update/<?= $artikel['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $artikel['judul'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea class="form-control" id="isi" name="isi" required><?= $artikel['isi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <img src="/uploads/<?= $artikel['gambar'] ?>" alt="<?= $artikel['judul'] ?>" width="100" class="mt-2">
            </div>
            <div class="mb-3">
                <label for="isi1" class="form-label">Isi-bawah</label>
                <textarea class="form-control" id="isi1" name="isi1" required><?= $artikel['isi1'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="isi2" class="form-label">Isi-bawah</label>
                <textarea class="form-control" id="isi2" name="isi2" required><?= $artikel['isi2'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
