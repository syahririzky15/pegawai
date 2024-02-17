<?php
// Memasukkan file koneksi.php
require_once "koneksi.php";

// Inisialisasi variabel pencarian
$keyword = "";
$condition = "";

// Memeriksa apakah form pencarian disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
    $condition = $_POST['condition'];

    // Menyiapkan query SQL berdasarkan kondisi pencarian
    if ($condition == "id_pegawai") {
        $sql = "SELECT * FROM Pegawai WHERE ID_Pegawai = '$keyword'";
    } elseif ($condition == "jabatan") {
        $sql = "SELECT * FROM Pegawai WHERE Jabatan = '$keyword'";
    } elseif ($condition == "nama") {
        $sql = "SELECT * FROM Pegawai WHERE Nama LIKE '%$keyword%'";
    } else {
        // Kondisi default jika tidak ada pencarian yang dipilih
        $sql = "SELECT * FROM Pegawai";
    }

    // Menjalankan query
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="text"], select, input[type="submit"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
        }
        a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <h2>Cari Data Pegawai</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="keyword">Kata Kunci:</label>
        <input type="text" id="keyword" name="keyword" value="<?php echo $keyword; ?>" required>
        
        <label for="condition">Pilih Kondisi:</label>
        <select id="condition" name="condition" required>
            <option value="id_pegawai" <?php if ($condition == 'id_pegawai') echo 'selected'; ?>>ID Pegawai</option>
            <option value="jabatan" <?php if ($condition == 'jabatan') echo 'selected'; ?>>Jabatan</option>
            <option value="nama" <?php if ($condition == 'nama') echo 'selected'; ?>>Nama</option>
        </select>
        
        <input type="submit" value="Cari">
    </form>

    <?php
    // Menampilkan hasil pencarian
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Hasil Pencarian</h2>";
                echo "<table>";
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
                echo "Tidak ada hasil pencarian.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
    <center>
    <section>
    <div>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>
</section>
</center>
</body>
</html>
