<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");
$buku = mysqli_query($koneksi, "SELECT kode, judul FROM buku");
$mahasiswa = mysqli_query($koneksi, "SELECT nim, nama FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
</head>
<body>
    <h2>Form Peminjaman Buku</h2>
    <form action="simpan_peminjaman.php" method="post">
        <label for="kode_buku">Kode Buku:</label>
        <select name="kode_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php while($b = mysqli_fetch_assoc($buku)) { ?>
                <option value="<?= $b['kode'] ?>"><?= $b['kode'] ?> - <?= $b['judul'] ?></option>
            <?php } ?>
        </select><br><br>

        <label for="nim">NIM Mahasiswa:</label>
        <select name="nim" required>
            <option value="">-- Pilih Mahasiswa --</option>
            <?php while($m = mysqli_fetch_assoc($mahasiswa)) { ?>
                <option value="<?= $m['nim'] ?>"><?= $m['nim'] ?> - <?= $m['nama'] ?></option>
            <?php } ?>
        </select><br><br>

        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required><br><br>

        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali"><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
