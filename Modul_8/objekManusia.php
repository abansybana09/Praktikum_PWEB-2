<?php
include "classManusia.php";
$aban = new Manusia("Aban");
echo "Nama: " . $aban->tampilkanNama() . "<br>";
$aban->makan();
?>