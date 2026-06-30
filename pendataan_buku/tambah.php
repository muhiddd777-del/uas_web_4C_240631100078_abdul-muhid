<?php
require 'functions.php';
$conn = koneksi();

// Form Processing (POST) untuk Create Data
if (isset($_POST['submit'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $tahun = htmlspecialchars($_POST['tahun_terbit']);

    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit) VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    $insert = mysqli_query($conn, $query);

    // Percabangan pengecekan sukses
    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='daftar_buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data - Sistem Pendataan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Perpustakaan Mini</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar_buku.php">Daftar Data</a></li>
                    <li class="nav-item"><a class="nav-link active" href="tambah.php">Tambah Data</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card-custom w-50 mx-auto">
            <h3 class="mb-4 text-center">Tambah Buku Baru</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Simpan Data</button>
            </form>
        </div>
    </div>
</body>
</html>