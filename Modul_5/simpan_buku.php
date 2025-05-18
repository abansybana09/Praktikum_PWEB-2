<?php
extract($_POST);
include "Koneksi.php";

if ($submit == "Simpan") {
    $q = "INSERT INTO mahasiswa (nim, nama, prodi, angkatan) 
          VALUES ('$nim', '$nama', '$prodi', '$angkatan')";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    
    if ($r) {
        echo "Data mahasiswa sudah ditambahkan.";
    } else {
        echo "Gagal menambahkan data mahasiswa.";
    }
}
else if ($submit == "Update") {
    $q = "UPDATE mahasiswa 
          SET nim='$nim', nama='$nama', prodi='$prodi', angkatan='$angkatan' 
          WHERE nim='$id_mahasiswa'";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    
    if ($r) {
        echo "Data mahasiswa sudah diedit.";
    } else {
        echo "Gagal mengedit data mahasiswa.";
    }
}
?>
