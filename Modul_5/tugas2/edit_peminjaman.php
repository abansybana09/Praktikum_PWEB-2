<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

$kode_pinjam = $_GET['kode_pinjam'];
$data = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE kode_pinjam = '$kode_pinjam'");
$peminjaman = mysqli_fetch_assoc($data);

$buku = mysqli_query($koneksi, "SELECT kode, judul FROM buku");
$mahasiswa = mysqli_query($koneksi, "SELECT nim, nama FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
</head>
<body>
    <h2>Edit Data Peminjaman</h2>
    <form action="update_peminjaman.php" method="post">
        <input type="hidden" name="kode_pinjam" value="<?= $peminjaman['kode_pinjam']; ?>">

        <label>Kode Buku:</label>
        <select name="kode_buku" required>
            <?php while($b = mysqli_fetch_assoc($buku)) { ?>
                <option value="<?= $b['kode']; ?>" <?= ($b['kode'] == $peminjaman['kode_buku']) ? 'selected' : ''; ?>>
                    <?= $b['kode']; ?> - <?= $b['judul']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>NIM Mahasiswa:</label>
        <select name="nim" required>
            <?php while($m = mysqli_fetch_assoc($mahasiswa)) { ?>
                <option value="<?= $m['nim']; ?>" <?= ($m['nim'] == $peminjaman['nim']) ? 'selected' : ''; ?>>
                    <?= $m['nim']; ?> - <?= $m['nama']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam']; ?>" required><br><br>

        <label>Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
