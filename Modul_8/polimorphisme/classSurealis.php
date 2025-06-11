<?php
include_once "classLukisan.php";

class Surealis extends Lukisan {
    public $pelukis;

    public function __construct($judul, $pelukis) {
        parent::__construct($judul);
        $this->pelukis = $pelukis;
    }

    public function gaya() {
        echo $this->judul . " menunjukkan dunia mimpi dan ilusi khas surealisme.<br>";
    }

    public function tampil() {
        echo "Judul: {$this->judul}<br>Pelukis: {$this->pelukis}<br>";
        $this->gaya();
    }
}
?>
