<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Dinamis</title>
</head>
<body>
    <form method="post" action="">
        <label for="nilai">Masukkan Nilai Anda :</label>
        <input type="number" id="nilai" name="nilai" required>
        <button type="submit">Simpan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $NA = intval($_POST['nilai']);
        if ($NA < 0 || $NA > 100) {
            echo "Nilai tidak valid. Masukkan nilai antara 0-100.";
        } else {
            if ($NA >= 90) {
                $HM = 'A';
            } else if ($NA >= 70) {
                $HM = 'B';
            } else if ($NA >= 60) {
                $HM = 'C';
            } else if ($NA >= 50) {
                $HM = 'D';
            } else {
                $HM = 'E';
            }
            echo "Nilai Anda = $NA<br>Huruf Mutu = $HM";
        }
    }
    ?>
</body>
</html>