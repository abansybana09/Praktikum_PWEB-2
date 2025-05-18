<?php
include "koneksi.php";

extract($_GET);

if (isset($menu) && $menu == "edit_mahasiswa") {
    $q = "SELECT * FROM mahasiswa WHERE nim='$id'";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    $data = mysqli_fetch_array($r);
} elseif (isset($menu) && $menu == "tampil_mahasiswa") {
    // Anda bisa menambahkan fungsionalitas untuk "tampil_mahasiswa" di sini jika diperlukan
}

$q = "SELECT * FROM mahasiswa";
$r = mysqli_query($db, $q) or die(mysqli_error($db));
$jml = mysqli_num_rows($r);
?>