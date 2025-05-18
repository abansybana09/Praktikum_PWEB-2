<?php
include "koneksi.php";
extract($_POST);
if ($submit == "Simpan") {
    $q = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$prodi', '$angkatan')";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    if ($r) {
        $msg = "Data Sudah ditambahkan";
    } else {
        $msg = "Data Tidak bisa dimasukkan";
    }
    echo $msg;
}
?>
