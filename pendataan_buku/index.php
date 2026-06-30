<?php
// Menggunakan require untuk memanggil fungsi
require 'functions.php';
$conn = koneksi();
$total_buku = hitung_total_buku($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Pendataan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Perpustakaan Mini</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar_buku.php">Daftar Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah Data</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card-custom text-center py-5">
            <h1 class="display-5 fw-bold">Selamat Datang di Sistem Pendataan Buku</h1>
            <p class="lead mt-3">Sistem ini dibuat untuk memudahkan pendataan dan pengelolaan inventaris buku.</p>
            <div class="alert alert-info d-inline-block mt-3">
                Saat ini terdapat <strong><?= $total_buku; ?></strong> buku di dalam database.
            </div>
            <br>
            <a href="daftar_buku.php" class="btn btn-primary btn-lg mt-3">Lihat Daftar Buku</a>
        </div>
    </div>

    <div class="footer">&copy; 2026 - UAS Pemrograman Web</div>
</body>
</html>