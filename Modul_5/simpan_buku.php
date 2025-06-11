<?php
extract($_POST);
include "Koneksi.php";

if ($submit == "Simpan") {
    $q = "INSERT INTO buku VALUES ('$kode_buku', '$judul_buku', '$pengarang_buku', '$penerbit_buku')"; 
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    
    if ($r) {
        echo "Data buku sudah ditambahkan.";
    } else {
        echo "Gagal menambahkan data buku.";
    }
}
else if ($submit == "Update") {
    $q = "UPDATE buku 
          SET kd_buku='$kode_buku', judul='$judul_buku', pengarang='$pengarang_buku', penerbit='$penerbit_buku' 
          WHERE kd_buku='$id_buku'";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    
    if ($r) {
        echo "Data buku sudah diedit.";
    } else {
        echo "Gagal mengedit data buku.";
    }
}
?>
