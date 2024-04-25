<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di Data Verse</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('layout/bckgrnd.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
            height: 100vh; 
        }

        .wrapper {
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 80vh; 
        }

        .container {
            padding: 20px; 
            text-align: center; 
            border: 1px solid #ddd; 
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px; 
        }

        .button {
            display: inline-block;
            padding: 10px 20px; 
            margin: 10px; 
            font-size: 16px; 
            text-align: center;
            text-decoration: none; 
            background-color: #1679AB; 
            color: #ECECEC; 
            border-radius: 5px; 
            transition: background-color 0.3s; 
        }

        .button:hover {
            background-color: #496989; 
        }
    </style>
</head>
<body>
    <?php include "layout/header.html"; ?>

    <div class="wrapper">
        <main class="container">
            <h2>Selamat Datang di Data Verse</h2>
            <p>Silakan pilih opsi di bawah ini:</p>
            <a href="register.php" class="button">Tambah Data</a> 
            <a href="tampilkan.php" class="button">Lihat Data</a>
        </main>
    </div>

    <?php include "layout/footer.html"; ?>
</body>
</html>
