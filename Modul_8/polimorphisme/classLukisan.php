<?php
class Lukisan {
    protected $judul;

    public function __construct($judul) {
        $this->judul = $judul;
    }

    public function deskripsi() {
        echo $this->judul . " adalah lukisan indah penuh makna.<br>";
    }
}
?>
