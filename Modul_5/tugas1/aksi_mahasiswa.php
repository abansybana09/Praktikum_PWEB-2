<?php
include "koneksi.php";
extract($_GET);

if (isset($aksi)) {
    if ($aksi == "edit") {
        include "input_mahasiswa.php";
        return;
    } 
    else if ($aksi == "delete") {
       $q = "DELETE FROM mahasiswa WHERE nim='$id'";
       $r = mysqli_query($db, $q) or die(mysqli_error($db));
       if ($r) {
           echo "Data Mahasiswa Berhasil Dihapus";
       } 
    }
}
?>