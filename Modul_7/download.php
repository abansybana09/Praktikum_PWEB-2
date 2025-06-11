<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "SELECT * FROM upload WHERE id = '$id'";
$hasil = mysqli_query($db, $query);
$data = mysqli_fetch_array($hasil);

$filePath = "data/" . $data['name'];

if (!file_exists($filePath)) {
    die("File tidak ditemukan di server: " . htmlspecialchars($filePath));
}

header("Content-Disposition: attachment; filename=" . $data['name']);
header("Content-length: " . $data['size']);
header("Content-type: " . $data['type']);
$fp = fopen($filePath, 'r');
$content = fread($fp, filesize($filePath));
fclose($fp);

echo $content;
exit;
