<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "gitartuning"; // Pastikan nama DB di phpMyAdmin sama

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek jika koneksi gagal
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>