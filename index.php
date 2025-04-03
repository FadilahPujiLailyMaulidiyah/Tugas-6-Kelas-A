<?php
include 'koneksi.php';

$sql = "SELECT id, nama, nim, alamat, email, no_hp FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2>DAFTAR MAHASISWA</h2>
    <form action="insert.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>No HP:</label>
        <input type="text" name="no_hp" required><br>
        <button type="submit">Tambah</button>
    </form>

    <?php if ($result->num_rows > 0) { ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['no_hp']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p style="color: white;">Belum Ada Data yang Dimasukkan! Isi Form Terlebih Dahulu!</p>
    <?php } ?>
</body>
</html>

<?php $conn->close(); ?> 