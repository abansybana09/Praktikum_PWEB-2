<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

$kode_pinjam = $_POST['kode_pinjam'];
$kode_buku = $_POST['kode_buku'];
$nim = $_POST['nim'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = "UPDATE peminjaman 
          SET kode_buku = '$kode_buku', nim = '$nim', tanggal_pinjam = '$tanggal_pinjam', tanggal_kembali = '$tanggal_kembali'
          WHERE kode_pinjam = '$kode_pinjam'";

if (mysqli_query($koneksi, $query)) {
    echo "✅ Data berhasil diupdate.<br><a href='tampil_peminjaman.php'>Kembali ke Data</a>";
} else {
    echo "❌ Gagal update: " . mysqli_error($koneksi);
}
?>
