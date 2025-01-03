<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Domestik</title>
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
        <h1>Edit Domestik</h1>
        <form action="/admin/domestik/update/<?= $domestik['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="gambar_lama" value="<?= $domestik['gambar'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $domestik['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $domestik['harga'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $domestik['lokasi'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $domestik['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <img src="/uploads/<?= $domestik['gambar'] ?>" alt="<?= $domestik['nama'] ?>" width="100" class="mt-2">
            </div>
            <div class="mb-3">
                <label for="nomor_whatsapp" class="form-label">Nomor WhatsApp</label>
                <input type="text" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp" value="<?= $domestik['nomor_whatsapp'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat_google_maps" class="form-label">Alamat Google Maps</label>
                <textarea class="form-control" id="alamat_google_maps" name="alamat_google_maps" required><?= $domestik['alamat_google_maps'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>