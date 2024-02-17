<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Menyiapkan query SQL untuk mengambil semua data pegawai
$sql = "SELECT * FROM Pegawai";

// Menjalankan query
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #005f6b;
        }
    </style>
</head>
<body>
    <h2>Data Pegawai</h2>
    <table border="1">
        <tr>
            <th>ID Pegawai</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Menampilkan data pegawai dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['ID_Pegawai']."</td>";
            echo "<td>".$row['Nama']."</td>";
            echo "<td>".$row['Jabatan']."</td>";
            echo "<td>".$row['Gaji']."</td>";
            echo "<td>".$row['Tanggal_Masuk']."</td>";
            echo "<td>";
            echo "<a href='edit_data.php?id_pegawai=".$row['ID_Pegawai']."'>Edit</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
