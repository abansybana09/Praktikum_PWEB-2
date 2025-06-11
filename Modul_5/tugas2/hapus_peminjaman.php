<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

$kode_pinjam = $_GET['kode_pinjam'];

$query = "DELETE FROM peminjaman WHERE kode_pinjam = '$kode_pinjam'";

if (mysqli_query($koneksi, $query)) {
    echo "✅ Data berhasil dihapus.<br><a href='tampil_peminjaman.php'>Kembali ke Data</a>";
} else {
    echo "❌ Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
