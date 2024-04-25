<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Kami</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .wrapper {
            display: flex;
            justify-content: center; /* Pusatkan secara horizontal */
            align-items: center; /* Pusatkan secara vertikal */
            height: 80vh; /* Tinggi lebih kecil dari 100vh untuk ruang header dan footer */
        }
        .container {
            padding: 20px;
            text-align: center; /* Untuk memastikan teks berada di tengah */
            border: 1px solid #ddd; /* Batas untuk container */
            background-color: #ececec; 
            border-radius: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #ececec;
            background-color: #3498db; 
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <!-- Menambahkan header -->
    <?php include "layout/header.html" ?>

    <!-- Wrapper untuk mengontrol posisi konten utama -->
    <div class="wrapper">
        <!-- Bagian utama dengan opsi untuk pengguna -->
        <main class="container">
            <h2>Selamat Datang di Data Verse</h2>
            <p>Silakan pilih opsi di bawah ini:</p>
            <!-- Tambahkan tombol untuk menambahkan data dan melihat data -->
            <a href="register.php" class="button">Tambah Data</a> <!-- Link ke halaman registrasi -->
            <a href="tampilkan.php" class="button">Lihat Data</a> <!-- Link ke halaman untuk melihat data -->
        </main>
    </div>
    
    <!-- Menambahkan footer -->
    <?php include "layout/footer.html" ?>
</body>
</html>
