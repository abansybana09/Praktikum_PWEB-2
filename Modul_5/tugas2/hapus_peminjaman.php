<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

$kode_pinjam = $_GET['kode_pinjam'];
$query = "DELETE FROM peminjaman WHERE kode_pinjam = '$kode_pinjam'";

if (mysqli_query($koneksi, $query)) {
    header("Location: tampil_peminjaman.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>