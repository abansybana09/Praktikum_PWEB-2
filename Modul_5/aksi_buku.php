<?php
extract($_GET);
if (isset ($aksi)) {
    if ($aksi == "edit") {
        include "input_buku.php";
        return;
    } 
    else if ($aksi == "delete") {
       $q = "DELETE FROM buku WHERE kd_buku='$id'";
       $r = mysqli_query($db, $q) or die(mysqli_error($db));
       if ($r) {
           echo  "Data Berhasil dihapus";
       } 
    }
}
?>