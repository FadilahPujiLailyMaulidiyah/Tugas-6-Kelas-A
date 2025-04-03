<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['nama'], $_POST['nim'], $_POST['alamat'], $_POST['email'], $_POST['no_hp'])) {
        $id = $_POST['id'];
        $nama = $conn->real_escape_string($_POST['nama']);
        $nim = $conn->real_escape_string($_POST['nim']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $email = $conn->real_escape_string($_POST['email']);
        $no_hp = $conn->real_escape_string($_POST['no_hp']);

        $sql = "UPDATE users SET 
                    nama='$nama', 
                    nim='$nim', 
                    alamat='$alamat', 
                    email='$email', 
                    no_hp='$no_hp' 
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php?status=success");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Semua field harus diisi!";
    }
} else {
    echo "Akses tidak diizinkan!";
}
?>