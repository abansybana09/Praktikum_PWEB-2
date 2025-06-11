<?php
include_once "classLukisan.php";

class Kubisme extends Lukisan {
    public $pelukis;

    public function __construct($judul, $pelukis) {
        parent::__construct($judul);
        $this->pelukis = $pelukis;
    }

    public function gaya() {
        echo $this->judul . " tersusun dari bentuk-bentuk geometris ala kubisme.<br>";
    }

    public function tampil() {
        echo "Judul: {$this->judul}<br>Pelukis: {$this->pelukis}<br>";
        $this->gaya();
    }
}
?>
