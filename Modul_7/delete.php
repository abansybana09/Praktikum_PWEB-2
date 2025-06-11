<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']); 

$query = "SELECT * FROM upload WHERE id = $id";
$hasil = mysqli_query($db, $query);

if (mysqli_num_rows($hasil) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_array($hasil);
$namaFile = $data['name'];

// Hapus data dari database
$query = "DELETE FROM upload WHERE id = $id";
mysqli_query($db, $query);

// Hapus file dari folder
$filePath = "data/" . $namaFile;
if (file_exists($filePath)) {
    unlink($filePath);
    echo "File telah dihapus.";
} else {
    echo "File di database sudah dihapus, tapi file fisiknya tidak ditemukan.";
}
?>
