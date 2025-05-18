<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustkaan_fkom");

// Ambil data berdasarkan kode_pinjam
$kode_pinjam = $_GET['kode_pinjam'];
$query = "SELECT * FROM peminjaman WHERE kode_pinjam = '$kode_pinjam'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Ambil data buku dan mahasiswa untuk dropdown
$buku = mysqli_query($koneksi, "SELECT kode, judul FROM buku");
$mahasiswa = mysqli_query($koneksi, "SELECT nim, nama FROM mahasiswa");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_buku = $_POST['kode_buku'];
    $nim = $_POST['nim'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    
    $update = "UPDATE peminjaman SET 
               kode_buku = '$kode_buku',
               nim = '$nim',
               tanggal_pinjam = '$tanggal_pinjam',
               tanggal_kembali = '$tanggal_kembali'
               WHERE kode_pinjam = '$kode_pinjam'";
    
    if (mysqli_query($koneksi, $update)) {
        header("Location: tampil_peminjaman.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
</head>
<body>
    <h2>Edit Data Peminjaman</h2>
    <form method="post">
        <label>Kode Buku:</label>
        <select name="kode_buku" required>
            <?php 
            mysqli_data_seek($buku, 0);
            while($b = mysqli_fetch_assoc($buku)) { 
                $selected = ($b['kode'] == $data['kode_buku']) ? 'selected' : '';
                echo "<option value='{$b['kode']}' $selected>{$b['kode']} - {$b['judul']}</option>";
            } 
            ?>
        </select><br><br>

        <label>NIM Mahasiswa:</label>
        <select name="nim" required>
            <?php 
            mysqli_data_seek($mahasiswa, 0);
            while($m = mysqli_fetch_assoc($mahasiswa)) { 
                $selected = ($m['nim'] == $data['nim']) ? 'selected' : '';
                echo "<option value='{$m['nim']}' $selected>{$m['nim']} - {$m['nama']}</option>";
            } 
            ?>
        </select><br><br>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" value="<?= $data['tanggal_pinjam']; ?>" required><br><br>

        <label>Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" value="<?= $data['tanggal_kembali']; ?>"><br><br>

        <input type="submit" value="Update">
        <a href="tampil_peminjaman.php">Batal</a>
    </form>
</body>
</html>