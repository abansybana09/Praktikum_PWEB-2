<?php
include "classTentara.php";
$badu = new Tentara("Badu", "Serda");
echo "Nama: " . $badu->tampilkanNama() . "<br>";
echo "Pangkat: " . $badu->tampilkanPangkat() . "<br>";
$badu->makan();
$badu->kerja();
?>