<?php
session_start();

// Proteksi: redirect ke login jika belum login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Fkom Uniku</title>
</head>
<body>
    <h2>Perpustakaan Online</h2>
    
    <!-- Tampilkan nama user dan tombol logout -->
    <p style="text-align: right;">
        Selamat datang, <strong><?php echo $_SESSION['nama']; ?></strong> | 
        <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </p>

    <?php include "koneksi.php"; ?>
    <p><?php include "menu.php"; ?></p>

    <hr color="green" size="14px" />

    <?php
    extract($_GET);
    if (isset($menu)) {
        if ($menu == "input_buku") {
            include "input_buku.php";
        } elseif ($menu == "tampil_buku") {
            include "tampil_buku.php";
        } elseif ($menu == "simpan_buku") {
            include "simpan_buku.php";
        } elseif ($menu == "edit_buku") {
            include "input_buku.php";
        } elseif ($menu == "hapus_buku") {
            include "tampil_buku.php";
        }
    }
    ?>
</body>
</html>
