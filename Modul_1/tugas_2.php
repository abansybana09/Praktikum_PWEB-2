<?php
    $angka = 1;
    do {
        if ($angka % 2 == 0) {
            echo "Angka ke-$angka adalah Genap <br>";
        } else {
            echo "Angka ke-$angka adalah Ganjil <br>";
        }
        $angka++;
    } while ($angka <= 10);
?>
