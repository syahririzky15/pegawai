<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
    <div class="container">
        <h2>Tambah Data Pegawai</h2>
        <form action="proses_tambah_data.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <select id="jabatan" name="jabatan" required>
                <option value="Manager">Manager</option>
                <option value="Asisten Manager">Asisten Manager</option>
                <option value="Staff">Staff</option>
                <option value="HRD">HRD</option>
                <option value="Marketing">Marketing</option>
                <option value="IT">IT</option>
            </select>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji:</label>
                <input type="number" id="gaji" name="gaji" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" required>
            </div>
            <input type="submit" value="Tambah Data">
        </form>
        <div class="button-container">
            <a href="index.php" class="button">Home</a>
        </div>
    </div>
</body>
</html>
