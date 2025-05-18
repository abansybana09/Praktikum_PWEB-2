<?php
include "Koneksi.php";
extract($_POST);
if ($submit == "Simpan") {
    $q = "INSERT INTO buku VALUES ('$kode_buku', '$judul_buku', '$pengarang_buku', '$penerbit_buku')";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    if ($r) {
        $msg = "Data Sudah ditambahkan";
    } else {
        $msg = "Data Tidak bisa dimasukkan";
    }
    echo $msg;
}
?>
