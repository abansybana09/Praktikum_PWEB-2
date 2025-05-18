<html>
<head>
    <title>Mahasiswa Fkom Uniku</title> 
</head>
<body>
    <h2>Mahasiswsa</h2>
    <?php include "koneksi.php"; ?>
    <p>
        <?php include "menu.php"; ?>
    </p>
    <hr color="green" size="14px" />
    <?php
    extract($_GET);
    if (isset($menu)) {
       if ($menu == "input_mahasiswa") { include "input_mahasiswa.php"; }
       elseif ($menu == "tampil_mahasiswa") { include "tampil_mahasiswa.php"; }
       elseif ($menu == "simpan_mahasiswa") { include "simpan_mahasiswa.php"; }
       elseif ($menu == "edit_mahasiswa") { include "input_mahasiswa.php"; }
       elseif ($menu == "hapus_mahasiswa") { include "tampil_mahasiswa.php"; }
    }
    ?>
</body>
</html>