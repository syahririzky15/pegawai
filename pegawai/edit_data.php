<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Mendapatkan ID Pegawai dari URL
if (isset($_GET['id_pegawai']) && !empty($_GET['id_pegawai'])) {
    $id_pegawai = $_GET['id_pegawai'];

    // Menyiapkan query SQL untuk mengambil data pegawai berdasarkan ID Pegawai
    $sql = "SELECT * FROM Pegawai WHERE ID_Pegawai = '$id_pegawai'";

    // Menjalankan query
    $result = mysqli_query($conn, $sql);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $nama = $row['Nama'];
            $jabatan = $row['Jabatan'];
            $gaji = $row['Gaji'];
            $tanggal_masuk = $row['Tanggal_Masuk'];
        } else {
            echo "Data pegawai tidak ditemukan.";
            exit; // Menghentikan eksekusi skrip jika data tidak ditemukan
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit; // Menghentikan eksekusi skrip jika terjadi kesalahan query
    }
} else {
    echo "ID Pegawai tidak valid.";
    exit; // Menghentikan eksekusi skrip jika ID Pegawai tidak ditemukan
}

// Memeriksa apakah form disubmit untuk menyimpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_baru = $_POST['nama'];
    $jabatan_baru = $_POST['jabatan'];
    $gaji_baru = $_POST['gaji'];
    $tanggal_masuk_baru = $_POST['tanggal_masuk'];

    // Menyiapkan query SQL untuk memperbarui data pegawai
    $sql_update = "UPDATE Pegawai SET Nama='$nama_baru', Jabatan='$jabatan_baru', Gaji=$gaji_baru, Tanggal_Masuk='$tanggal_masuk_baru' WHERE ID_Pegawai='$id_pegawai'";

    // Menjalankan query update
    if (mysqli_query($conn, $sql_update)) {
        // Mengarahkan pengguna ke menu home setelah sukses menyimpan perubahan
        header("Location: data_pegawai3.php");
        exit; // Menghentikan eksekusi skrip setelah mengarahkan pengguna
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
</head>
<body>
    <h2>Edit Data Pegawai</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id_pegawai=" . $id_pegawai; ?>" method="POST">
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
        </div>
        <div>
            <label for="jabatan">Jabatan:</label>
            <select id="jabatan" name="jabatan" required>
                <option value="Manager" <?php if ($jabatan == 'Manager') echo 'selected'; ?>>Manager</option>
                <option value="Supervisor" <?php if ($jabatan == 'Supervisor') echo 'selected'; ?>>Supervisor</option>
                <option value="Asisten Manager"<?php if ($jabatan == 'Asisten Manager') echo 'selected'; ?>>Asisten Manager</option>
                <option value="Staff"<?php if ($jabatan == 'Staff') echo 'selected'; ?>>Staff</option>
                <option value="HRD"<?php if ($jabatan == 'HRD') echo 'selected'; ?>>HRD</option>
                <option value="Marketing"<?php if ($jabatan == 'Marketing') echo 'selected'; ?>>Marketing</option>
                <option value="IT"<?php if ($jabatan == 'IT') echo 'selected'; ?>>IT</option>
            </select>
        </div>
        <div>
            <label for="gaji">Gaji:</label>
            <input type="number" id="gaji" name="gaji" value="<?php echo $gaji; ?>" required>
        </div>
        <div>
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>" required>
        </div>
        <input type="submit" value="Simpan Perubahan">
    </form>
    <a href="index.php">Kembali ke Dashboard</a>
</body>
</html>
