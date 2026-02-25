<?php
require 'connection.php'; 
$stmt = $pdo->query("SELECT * FROM barang ORDER BY id DESC"); 
$barang = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Barang</title> 
</head>
<body>
    <h2>Daftar Barang Gudang</h2> 
    <a href="tambah.php">Tambah Barang Baru</a> 
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0"> 
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th> 
        </tr>
        <?php $no = 1; foreach($barang as $row): ?> 
        <tr>
            <td><?= $no++; ?></td> [cite: 72]
            <td><?= htmlspecialchars($row['kode_barang']); ?></td>
            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
            <td><?= htmlspecialchars($row['stok']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> 
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a> 
            </td>
        </tr>
        <?php endforeach; ?> 
    </table>
</body>
</html>