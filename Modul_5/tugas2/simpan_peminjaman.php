<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$kode_buku = $_POST['kode_buku'];
$nim = $_POST['nim'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

// Simpan data ke tabel peminjaman
$query = "INSERT INTO peminjaman (kode_buku, nim, tanggal_pinjam, tanggal_kembali)
          VALUES ('$kode_buku', '$nim', '$tanggal_pinjam', '$tanggal_kembali')";

if (mysqli_query($koneksi, $query)) {
    echo "✅ Peminjaman berhasil disimpan.<br><a href='form_peminjaman.php'>Kembali</a> | <a href='tampil_peminjaman.php'>Lihat Data</a>";
} else {
    echo "❌ Error: " . mysqli_error($koneksi);
}
?>
