<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Memeriksa apakah parameter id_pegawai terdefinisi dan tidak kosong pada URL
if(isset($_GET['id_pegawai']) && !empty($_GET['id_pegawai'])) {
    // Mengamankan nilai id_pegawai dari serangan SQL Injection
    $id_pegawai = mysqli_real_escape_string($conn, $_GET['id_pegawai']);

    // Menyiapkan query SQL untuk menghapus data pegawai berdasarkan id_pegawai
    $sql = "DELETE FROM Pegawai WHERE ID_Pegawai = '$id_pegawai'";

    // Melakukan query untuk menghapus data
    if(mysqli_query($conn, $sql)) {
        // Jika data berhasil dihapus, arahkan kembali ke halaman data_pegawai.php
        header("Location: data_pegawai1.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Jika parameter id_pegawai tidak terdefinisi atau kosong, tampilkan pesan error
    echo "Parameter id_pegawai tidak valid.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
