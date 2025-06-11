<?php
$filename = "aban.txt";

$file = fopen($filename, "w");

if ($file) {
    fwrite($file, "Halo, Saya Aban.\n");
    fwrite($file, "Saya Kuliah di UNIKU.\n");
    fclose($file);
    echo "Penulisan ke file berhasil dilakukan.<br>";
} else {
    echo "Gagal membuka file untuk ditulis.<br>";
}

$file = fopen($filename, "r");

if ($file) {
    echo "<strong>Isi file:</strong><br>";
    while (($line = fgets($file)) !== false) {
        echo nl2br($line);
    }
    fclose($file);
} else {
    echo "Gagal membuka file untuk dibaca.<br>";
}
?>
