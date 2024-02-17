<?php
// Informasi koneksi database
$servername = "localhost"; // Nama server
$username = "root"; // Username database
$password = ""; // Password database
$database = "DataPegawai"; // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
