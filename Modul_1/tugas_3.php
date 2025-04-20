<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Akhir</title>
</head>
<body>
    <form method="post" action="">
        <label for="uas">Nilai UAS:</label>
        <input type="text" id="uas" name="uas"><br><br>

        <label for="uts">Nilai UTS:</label>
        <input type="text" id="uts" name="uts"><br><br>

        <label for="quiz">Nilai QUIZ:</label>
        <input type="text" id="quiz" name="quiz"><br><br>

        <label for="tugas">Nilai TUGAS:</label>
        <input type="text" id="tugas" name="tugas"><br><br>

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $uas = isset($_POST['uas']) ? (float)$_POST['uas'] : 0;
        $uts = isset($_POST['uts']) ? (float)$_POST['uts'] : 0;
        $quiz = isset($_POST['quiz']) ? (float)$_POST['quiz'] : 0;
        $tugas = isset($_POST['tugas']) ? (float)$_POST['tugas'] : 0;

        $NA = (0.3 * $uas) + (0.3 * $uts) + (0.2 * $quiz) + (0.2 * $tugas);

        if ($NA < 0 || $NA > 100) {
            echo "Maaf Nilai Anda Harus > 0 dan < 100";
        } else {
            if ($NA >= 90) {
                $HM = 'A';
            } elseif ($NA >= 70) {
                $HM = 'B';
            } elseif ($NA >= 60) {
                $HM = 'C';
            } elseif ($NA >= 50) {
                $HM = 'D';
            } else {
                $HM = 'E';
            }

            echo "Nilai Akhir Anda = $NA<br>Huruf Mutu = $HM";
        }
    }
    ?>
</body>
</html>
