<?php

extract($_POST); 
$uploaddir = 'data/';
$fileName = $_FILES['userfile']['name'];
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

include "koneksi.php"; 

$query = "SELECT count(*) as jum FROM upload WHERE name = '$fileName'";
$hasil = mysqli_query($db, $query); 
$data = mysqli_fetch_array($hasil);

if ($data['jum'] > 0) {
    $query = "UPDATE upload SET size = '$fileSize'
              WHERE name = '$fileName'";
} else {
    $query = "INSERT INTO upload (name, size, type)
              VALUES
              ('$fileName',
              '$fileSize',
              '$fileType')";
}

mysqli_query($db, $query); 

$uploadfile = $uploaddir . $fileName;

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
} else {
    echo "File gagal diupload";
}
