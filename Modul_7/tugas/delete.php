<?php
if (!isset($_GET['id'])) {
    die("ID file tidak ditemukan.");
}

include "koneksi.php";

// Ambil data file berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM upload WHERE id = ?";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("File tidak ditemukan di database.");
}

$filename = $data['name'];
$filepath = "data/" . $filename;

// Hapus file dari folder jika ada
if (file_exists($filepath)) {
    unlink($filepath);
}

// Hapus dari database
$query = "DELETE FROM upload WHERE id = ?";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: list.php");
exit;
?>
