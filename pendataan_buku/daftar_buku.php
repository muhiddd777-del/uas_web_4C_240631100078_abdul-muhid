
<?php
require 'functions.php';
$conn = koneksi();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

if ($keyword != "") {
    // Jika ada keyword, filter data berdasarkan judul atau penulis
    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%' ORDER BY id DESC";
} else {
    // Jika tidak ada keyword, tampilkan semua data
    $query = "SELECT * FROM buku ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
?>

<form action="" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="keyword" placeholder="Cari judul/penulis..." value="<?= htmlspecialchars($keyword); ?>">
    <button type="submit">Cari</button>
    <a href="daftar_buku.php">Reset</a>
</form>

<table border="1" cellpadding="10" cellspacing="0">
    ```

// Query mengambil semua data (Read)
$query = "SELECT * FROM buku ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku - Sistem Pendataan Buku</title>
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
                    <li class="nav-item"><a class="nav-link active" href="daftar_buku.php">Daftar Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah Data</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card-custom">
            <h2 class="mb-4">Daftar Buku</h2>
            <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Buku Baru</a>
                       
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    // Perulangan untuk menampilkan data
                    while($row = mysqli_fetch_assoc($result)) : 
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['judul']); ?></td>
                        <td><?= htmlspecialchars($row['penulis']); ?></td>
                        <td><?= htmlspecialchars($row['penerbit']); ?></td>
                        <td><?= htmlspecialchars($row['tahun_terbit']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>