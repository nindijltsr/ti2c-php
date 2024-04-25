<?php
include "service/database.php";

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $sql_delete = "DELETE FROM user WHERE id = ?";
    $stmt = $db->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $delete_message = "Data dengan ID $id berhasil dihapus.";
    } else {
        $delete_message = "Gagal menghapus data dengan ID $id.";
    }
}

$sql = "SELECT * FROM user";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('layout/bckgrnd.jpg'); 
            background-size: cover;
            font-family: Arial, sans-serif;            
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }

        tr {
            color: #ececec;
        }

        table, th, td {
            border: 1px solid #ececec; 
        }

        h2 {
            color: #ececec;
        }

        th {
            background-color: black; 
            font-weight: bold; 
            text-align: left; 
        }

        th, td {
            padding: 12px; 
        }

        .btn {
            display: inline-block;
            padding: 10px 20px; 
            font-size: 16px; 
            text-align: center;
            text-decoration: none; 
            color: white; 
            background-color: #007bff; 
            border-radius: 5px; 
            transition: background-color 0.3s; 
        }

        .btn:hover {
            background-color: #0056b3; 
        }

        .center {
            text-align: center; 
        }

        .delete-btn {
            background-color: #dc3545; 
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333; 
        }
</style>

    </style>
</head>
<body>
    <?php include "layout/header.html"; ?>
    
    <div class="center">
        <h2>Data User yang Terdaftar</h2>
    
        <?php if (isset($delete_message)): ?>
            <p style="color:#ececec;"><?= $delete_message ?></p>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Aksi</th> 
                </tr>
                <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["alamat"] ?></td>
                        <td><?= $row["ttl"] ?></td>
                        <td><?= $row["gender"] ?></td>
                        <td><?= $row["usia"] ?></td>
                        <td>
                            <a class="btn delete-btn" href="?delete=<?= $row["id"] ?>">Hapus</a> 
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p style="color: #ececec;">Tidak ada data yang ditemukan.</p>
        <?php endif; ?>

        
        <a class="btn" href="index.php">Kembali ke Halaman Utama</a>
    </div>

    <?php
    $db->close();
    ?>

    <?php include "layout/footer.html"; ?>
</body>
</html>
