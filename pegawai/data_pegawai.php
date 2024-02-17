<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Menyiapkan query SQL untuk mengambil semua data pegawai
$sql = "SELECT * FROM Pegawai";

// Menjalankan query
$result = mysqli_query($conn, $sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Menampilkan data pegawai dalam tabel
        echo "<h2>Data Pegawai</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Pegawai</th><th>Nama</th><th>Jabatan</th><th>Gaji</th><th>Tanggal Masuk</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['ID_Pegawai']."</td>";
            echo "<td>".$row['Nama']."</td>";
            echo "<td>".$row['Jabatan']."</td>";
            echo "<td>".$row['Gaji']."</td>";
            echo "<td>".$row['Tanggal_Masuk']."</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "Tidak ada data pegawai.";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
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
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <center>
    <div class="container">
        <div class="button-container">
            <a href="index.php" class="button">Home</a>
        </div>
    </div>
    </center>
</body>
</html>
