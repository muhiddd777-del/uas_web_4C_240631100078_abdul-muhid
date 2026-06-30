<?php
require 'functions.php';
$conn = koneksi();

// Mengambil ID via GET
$id = $_GET['id'];

// Query Hapus
$query = "DELETE FROM buku WHERE id = $id";
$hapus = mysqli_query($conn, $query);

if ($hapus) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='daftar_buku.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='daftar_buku.php';</script>";
}
?>