<?php
// Koneksi ke database dan pengecekan apakah ada data yang akan dihapus
include "service/database.php";

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $sql_delete = "DELETE FROM user WHERE id = ?";
    $stmt = $db->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Data berhasil dihapus, Anda bisa mengarahkan ulang atau memberikan pesan
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
        /* Gaya untuk membuat tabel lebih rapi dan menarik */
        table {
            width: 100%; /* Lebar penuh */
            border-collapse: collapse; /* Gabungkan batas */
            margin-bottom: 20px; /* Jarak di bawah tabel */
        }

        tr {
            color: #ececec;
        }

        table, th, td {
            border: 1px solid #ececec; /* Batas tipis */
        }

        h2 {
            color: #ececec;
        }

        th {
            background-color: black; /* Warna latar belakang untuk header */
            font-weight: bold; /* Tebalkan teks header */
            text-align: left; /* Selaraskan teks ke kiri */
        }

        th, td {
            padding: 12px; /* Ruang dalam setiap sel */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px; /* Ukuran tombol */
            font-size: 16px; /* Ukuran teks tombol */
            text-align: center;
            text-decoration: none; /* Hilangkan garis bawah */
            color: white; /* Warna teks */
            background-color: #007bff; /* Warna biru */
            border-radius: 5px; /* Sudut membulat */
            transition: background-color 0.3s; /* Animasi transisi */
        }

        .btn:hover {
            background-color: #0056b3; /* Warna lebih gelap saat di-hover */
        }

        .center {
            text-align: center; /* Atur teks ke tengah */
        }

        .delete-btn {
            background-color: #dc3545; /* Warna merah untuk tombol hapus */
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333; /* Warna merah lebih gelap saat di-hover */
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
                    <th>Aksi</th> <!-- Kolom untuk tombol hapus -->
                </tr>
                <?php
                // Loop melalui hasil dan tampilkan data dalam bentuk tabel
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["alamat"] ?></td>
                        <td><?= $row["ttl"] ?></td>
                        <td><?= $row["gender"] ?></td>
                        <td><?= $row["usia"] ?></td>
                        <td>
                            <!-- Tombol untuk menghapus data -->
                            <a class="btn delete-btn" href="?delete=<?= $row["id"] ?>">Hapus</a> <!-- Hapus berdasarkan ID -->
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p style="color: #ececec;">Tidak ada data yang ditemukan.</p>
        <?php endif; ?>

        <!-- Tombol untuk kembali ke halaman utama -->
        <a class="btn" href="index.php">Kembali ke Halaman Utama</a>
    </div>

    <?php
    // Tutup koneksi database
    $db->close();
    ?>

    <?php include "layout/footer.html"; ?>
</body>
</html>
