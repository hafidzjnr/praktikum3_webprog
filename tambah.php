<?php
require 'connection.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, stok) VALUES (?, ?, ?)"; 
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$kode, $nama, $stok])) { 
        header("Location: index.php");
        exit; 
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Tambah Barang</h2> 
    <form method="POST" action=""> 
        <label>Kode Barang:</label><br>
        <input type="text" name="kode" required><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama" required><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br> 
        <button type="submit">Simpan Data</button> 
        <a href="index.php">Batal</a> 
    </form>
</body>
</html>