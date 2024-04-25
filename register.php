<?php
include "service/database.php";
session_start();

$register_message = " ";

if (isset($_POST["register"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $ttl = $_POST["ttl"];
    $gender = $_POST["gender"];
    $usia = $_POST["usia"];

    try {
        $sql = "INSERT INTO user (nama, alamat, ttl, gender, usia) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssi", $nama, $alamat, $ttl, $gender, $usia);

        if ($stmt->execute()) {
            $register_message = "Pengisian formulir berhasil, data telah tersimpan.";
        } else {
            $register_message = "Pengisian formulir gagal, silakan coba lagi.";
        }
    } catch (mysqli_sql_exception $e) {
        $register_message = "Terjadi kesalahan saat menyimpan data: " . $e->getMessage();
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('layout/bckgrnd.jpg'); 
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            padding: 15px;
            background-color: #ececec;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            font-size: 1.5em;
            color: #333;
            margin: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input, select {
            width: 470px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }

        .register-message {
            text-align: center;
            margin-top: 15px;
            font-size: 1em;
            color: #333;
        }

        .button {
            font-size: 15px;
            padding: 10px;
            text-decoration: none;
            background-color: #1679AB;
            color: #ececec;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background-color: #496989; 
        }
        
        .button2 {
            font-size: 13px;
            padding: 5px;
            text-decoration: none;
            background-color: #A8CD9F;
            color: black;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button2:hover {
            background-color: #58A399;
        }

        .button-row {
            display: flex;
            justify-content: space-between; 
            margin-top: 5px;
        }

        .button-row .button {
            max-width: 200px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include "layout/header.html"; ?>

    <div class="container">
        <h3>MASUKKAN DATA</h3>

        <div class="register-message">
            <?= $register_message ?>
            <?php if ($register_message === "Pengisian formulir berhasil, data telah tersimpan.") : ?>
                <a href="tampilkan.php" class="button2">Lihat Data</a>
            <?php endif; ?>
        </div>

        <!-- Formulir pendaftaran -->
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
            </div>

            <div class="form-group">
                <label for="ttl">Tempat Tanggal Lahir</label>
                <input type="text" id="ttl" name="ttl" placeholder="Masukkan Tempat dan Tanggal Lahir" required>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="usia">Usia</label>
                <input type="number" id="usia" name="usia" placeholder="Masukkan Usia" required>
            </div>

        <!-- Baris tombol simpan dan kembali -->
        <div class="button-row"> 
                <a href="index.php" class="button">Kembali ke Beranda</a> 
                <button type="submit" name="register" class="button" style="font-size: 15px; border-radius: 5px; border:1px solid white; border-color:none; text-decoration: none; transition: background-color 0.3s;">Simpan Data</button>

            </div>
        </form>

    </div>

    <?php include "layout/footer.html"; ?>
</body>
</html>
