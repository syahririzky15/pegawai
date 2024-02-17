<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];
    $gaji = $_POST["gaji"];
    $tanggal_masuk = $_POST["tanggal_masuk"];

    // Menyiapkan query SQL untuk memasukkan data
    $sql = "INSERT INTO Pegawai (Nama, Jabatan, Gaji, Tanggal_Masuk) VALUES ('$nama', '$jabatan', '$gaji', '$tanggal_masuk')";

    // Menjalankan query dan memeriksa apakah data berhasil dimasukkan
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, alihkan ke halaman data_pegawai.php
        header("Location: data_pegawai.php");
        exit; // Pastikan agar skrip berhenti setelah pengalihan
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Menutup koneksi database
    mysqli_close($conn);
}
?>
