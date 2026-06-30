<?php
require 'functions.php';
$conn = koneksi();

// Mengambil ID dari URL (GET)
$id = $_GET['id'];
$query_get = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query_get);
$data = mysqli_fetch_assoc($result);

// Form Processing (POST) untuk Update Data
if (isset($_POST['update'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $tahun = htmlspecialchars($_POST['tahun_terbit']);

    $query_update = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun' WHERE id=$id";
    $update = mysqli_query($conn, $query_update);

    if ($update) {
        echo "<script>alert('Data berhasil diubah!'); window.location='daftar_buku.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data - Sistem Pendataan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card-custom w-50 mx-auto">
            <h3 class="mb-4 text-center">Edit Data Buku</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($data['penulis']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="<?= htmlspecialchars($data['penerbit']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" value="<?= htmlspecialchars($data['tahun_terbit']); ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-warning w-100">Update Data</button>
                <a href="daftar_buku.php" class="btn btn-secondary w-100 mt-2">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>