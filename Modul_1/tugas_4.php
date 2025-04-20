<!DOCTYPE html>
<html>
<head>
    <title>Penghitungan Gaji</title>
</head>
<body>
    <h2>PENGHITUNGAN GAJI KARYAWAN</h2>
    <form method="post">
        Golongan :
        <select name="golongan">
            <option value="">--Pilih Golongan--</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
        </select>
        <br><br>
        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $gol = $_POST['golongan'];

        $gajiPokok = 0;
        $tunjangan = 0;
        $potongan = 0;

        if ($gol == "I") {
            $gajiPokok = 500000;
            $tunjangan = 175000;
            $potongan = 0.10 * $gajiPokok;
        } elseif ($gol == "II") {
            $gajiPokok = 750000;
            $tunjangan = 155000;
            $potongan = 0.075 * $gajiPokok;
        } elseif ($gol == "III") {
            $gajiPokok = 1000000;
            $tunjangan = 146000;
            $potongan = 0.05 * $gajiPokok;
        }

        $totalGaji = $gajiPokok + $tunjangan - $potongan;
        echo "<br><br>";
        echo "Gaji Pokok : " . number_format($gajiPokok, 0, ",", ".") . "<br>";
        echo "Tunjangan : " . number_format($tunjangan, 0, ",", ".") . "<br>";
        echo "Potongan : " . number_format($potongan, 0, ",", ".") . "<br>";
        echo "========================<br>";
        echo "Total Gaji : " . number_format($totalGaji, 0, ",", ".") . "</strong>";
    }
    ?>
</body>
</html>