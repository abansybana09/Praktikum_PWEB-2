    <?php
    include 'classManusia.php';
    class Sopir extends Manusia {
        public function __construct($n) {
            parent::__construct($n);
        
        }
        public function kerja() {
            echo "Ngenggg...Ngengg..Ngengg..Duarrr<br>";
        }
    }
    ?>