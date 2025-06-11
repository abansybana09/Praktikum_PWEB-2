<?php

class Manusia {
    public $nama;
    function __construct($nm) {
        $this->nama = $nm;
    }  
    function tampilkanNama() {
        return $this->nama;
    }  
    function makan() {
        echo "nyam..nyam..nyam..<br>";
    }
    function kerja() {
        echo "Ayoo..Kerja..Ayo...Kerja..<br>";
    }
}
?>