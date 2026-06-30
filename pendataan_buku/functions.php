<?php
// functions.php

// Fungsi 1: Melakukan Koneksi ke Database
function koneksi() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_buku";
    
    // Variabel Koneksi
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    // Percabangan jika koneksi gagal
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
    
    return $conn;
}

// Fungsi 2: Menghitung total data buku di database
function hitung_total_buku($conn) {
    $query = "SELECT COUNT(*) AS total FROM buku";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    return $data['total'];
}
?>