<?php
include "classmanusia.php";
class Programmer extends Manusia {
    public function __construct($n){
        parent::__construct($n);
    }
    public function kerja() {
        echo "Semangatt ath euyyy..Semangattt Guyss..Semangattt Cuyyy..<br>";
    }
    public function bersantai(){
        echo ("Ngopiiii Cuyyyy Biar Nikmattt<br>");
    }
}
?>  