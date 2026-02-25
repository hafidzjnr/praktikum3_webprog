<?php
$host = 'localhost';
$dbname = 'gudang'; // Nama database yang akan kamu buat
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage()); 
}
?>