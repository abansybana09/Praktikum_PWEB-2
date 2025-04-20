<?php

function getFruitDetails($nama, $warna, $rasa, $musim) {
    return "Buah: $nama<br>Warna: $warna<br>Rasa: $rasa<br>Musim: $musim<br>";
}

$buahBuahan = [
    ['nama' => 'Apel', 'warna' => 'Merah', 'rasa' => 'Manis', 'musim' => 'Musim Gugur'],
    ['nama' => 'Mangga', 'warna' => 'Kuning', 'rasa' => 'Manis', 'musim' => 'Musim Panas'],
    ['nama' => 'Jeruk', 'warna' => 'Oranye', 'rasa' => 'Asam', 'musim' => 'Musim Dingin'],
    ['nama' => 'Pisang', 'warna' => 'Kuning', 'rasa' => 'Manis', 'musim' => 'Sepanjang Tahun']
];

foreach ($buahBuahan as $buah) {
    echo getFruitDetails($buah['nama'], $buah['warna'], $buah['rasa'], $buah['musim']);
    echo "<br>";
}

?>
