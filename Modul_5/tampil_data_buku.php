<?php

include "Koneksi.php"; 

extract($_GET);

if (isset($menu) && $menu == "edit_buku") {
    $q = "SELECT * FROM buku WHERE kd_buku='$id'";
    $r = mysqli_query($db, $q) or die(mysqli_error($db)); 
    $data = mysqli_fetch_array($r);
} elseif (isset($menu) && $menu == "tampil_buku") {
}

$q = "SELECT * FROM buku";
$r = mysqli_query($db, $q) or die(mysqli_error($db));
$jml = mysqli_num_rows($r);
?>