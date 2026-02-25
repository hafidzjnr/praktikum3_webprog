<?php
require 'connection.php'; 
$id = $_GET['id']; 
$stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?"); 
$stmt->execute([$id]); 
$data = $stmt->fetch(PDO::FETCH_ASSOC); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $sql = "UPDATE barang SET kode_barang = ?, nama_barang = ?, stok = ? WHERE id = ?"; 
    $stmt = $pdo->prepare($sql); 
    if ($stmt->execute([$kode, $nama, $stok, $id])) { 
        header("Location: index.php"); 
        exit; 
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Edit Barang</h2>
    <form method="POST" action="">
        <label>Kode Barang:</label><br>
        <input type="text" name="kode" value="<?= $data['kode_barang']; ?>" required><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama" value="<?= $data['nama_barang']; ?>" required><br> 
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= $data['stok']; ?>" required><br><br> 
        <button type="submit">Update Data</button> 
        <a href="index.php">Batal</a> 
    </form>
</body>
</html>