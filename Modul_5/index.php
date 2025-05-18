<html>
<head>
    <title>Perpustakaan Fkom Uniku</title> 
</head>
<body>
    <h2>Perpustakaan Online</h2>
    <?php include "Koneksi.php"; ?>
    <p>
        <?php include "menu.php"; ?>
    </p>
    <hr color="green" size="14px" />
    <?php
    extract($_GET);
    if (isset($menu)) {
       if ($menu == "input_buku") { include "input_buku.php"; }
       elseif ($menu == "tampil_buku") { include "tampil_buku.php"; }
       elseif ($menu == "simpan_buku") { include "simpan_buku.php"; }
       elseif ($menu == "edit_buku") { include "input_buku.php"; }
       elseif ($menu == "hapus_buku") { include "tampil_buku.php"; }
    }
    ?>
</body>
</html>