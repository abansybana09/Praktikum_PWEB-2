<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$query = "SELECT * FROM upload WHERE id = $id";
$hasil = mysqli_query($db, $query);

if (mysqli_num_rows($hasil) == 0) {
    die("Data tidak ditemukan.");
}

$data = mysqli_fetch_array($hasil);
$filePath = "data/" . $data['name'];

if (!file_exists($filePath)) {
    die("File tidak ditemukan di server: " . htmlspecialchars($filePath));
}

// Set header agar browser langsung mengunduh file
header("Content-Disposition: attachment; filename=\"" . basename($data['name']) . "\"");
header("Content-Length: " . filesize($filePath));
header("Content-Type: " . $data['type']);
readfile($filePath);
exit;
?>
