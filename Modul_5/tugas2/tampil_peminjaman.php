<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");


$query = "
    SELECT 
        p.kode_pinjam,
        p.tanggal_pinjam,
        p.nim,
        m.nama,
        p.kode_buku,
        b.judul,
        p.tanggal_kembali
    FROM 
        peminjaman p
    JOIN 
        mahasiswa m ON p.nim = m.nim
    JOIN 
        buku b ON p.kode_buku = b.kode
";

if (!empty($cari)) {
    $query .= " WHERE p.kode_pinjam LIKE '%$cari%'";
}

$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
</head>
<body>
    <h2>Data Peminjaman Buku</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>Kode Pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['kode_pinjam']; ?></td>
            <td><?= $row['tanggal_pinjam']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kode_buku']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tanggal_kembali']; ?></td>
            <td>
                <a href="edit_peminjaman.php?kode_pinjam=<?= $row['kode_pinjam']; ?>">Edit</a> |
                <a href="hapus_peminjaman.php?kode_pinjam=<?= $row['kode_pinjam']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

