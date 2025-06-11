<?php
include "classProgrammer.php";
$aban = new Programmer('Aban');
echo ("Nama: ".$aban->tampilkanNama()."<br>");
$aban->makan();
$aban->kerja();
$aban->bersantai();
?>