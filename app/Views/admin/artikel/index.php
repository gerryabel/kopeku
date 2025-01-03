<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Artikel</title>
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
        <!-- Tombol Back dengan warna custom -->
        <button class="btn custom-back-button mb-3" onclick="goBack()">Back</button>
        
        <h1>Data Artikel</h1>
        <!-- Tautan untuk menambahkan artikel -->
        <a href="/admin/artikel/create" class="btn btn-primary mb-3">Tambah Artikel</a>
        <!-- Tabel untuk menampilkan data artikel -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th>Isi-Bawah1</th>
                    <th>Isi-Bawah2</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artikel as $a): ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= $a['judul'] ?></td>
                    <td><?= $a['isi'] ?></td>
                    <td><img src="/uploads/<?= $a['gambar'] ?>" alt="<?= $a['judul'] ?>" width="100"></td>
                    <td><?= $a['isi1'] ?></td>
                    <td><?= $a['isi2'] ?></td>
                    <td>
                        <!-- Tautan untuk mengedit artikel -->
                        <a href="/admin/artikel/edit/<?= $a['id'] ?>" class="btn btn-warning">Edit</a>
                        <!-- Form untuk menghapus artikel -->
                        <form action="/admin/artikel/delete/<?= $a['id'] ?>" method="post" style="display:inline-block;">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <!-- Tombol untuk menghapus artikel -->
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- JavaScript untuk Bootstrap dan tombol Back -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
