<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        .card {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        li a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #ddd;
            display: block;
            transition: background-color 0.3s ease;
        }
        li a:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard Pegawai</h2>
        <div class="card">
            <h3>Jumlah Pegawai:</h3>
            <?php
                // Memasukkan file koneksi.php
                require_once "koneksi.php";

                // Mengambil jumlah pegawai dari database
                $sql = "SELECT COUNT(*) AS total_pegawai FROM Pegawai";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<p>Total: " . $row["total_pegawai"] . "</p>";
                } else {
                    echo "Belum ada pegawai.";
                }

                // Menutup koneksi database
                mysqli_close($conn);
            ?>
        </div>
        
        <!-- Sub-menu -->
        <div class="card">
            <h3>Sub-menu</h3>
            <ul>
                <li><a href="tambah_data.php">Tambah Data Pegawai</a></li>
                <li><a href="data_pegawai1.php">Hapus Data Pegawai</a></li>
                <li><a href="data_pegawai3.php">Edit Data Pegawai</a></li>
                <li><a href="cari_data.php">Cari Data Pegawai</a></li>
                <li><a href="data_pegawai.php">Daftar Data Pegawai</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
