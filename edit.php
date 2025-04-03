<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<p style='color:red;'>Data tidak ditemukan!</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #c1b2d1, #3170cd);
            text-align: center;
            margin: 10;
            padding: 0;
        }
        .container {
            width: 20%;
            background: white;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .form-group {
            background: #F5F5F5;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
        input {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color:rgb(255, 255, 255); 
        }
        button {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" value="<?php echo htmlspecialchars($row['nim'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" value="<?php echo htmlspecialchars($row['alamat'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label>No HP:</label>
                <input type="text" name="no_hp" value="<?php echo htmlspecialchars($row['no_hp'] ?? ''); ?>" required>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>