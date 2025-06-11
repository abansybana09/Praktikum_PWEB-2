<?php
include "classSopir.php";
$aban = new Sopir("Aban");
echo ("Nama: " . $aban->tampilkanNama() . "<br>");
$aban->makan();
$aban->kerja();
?>