<!DOCTYPE html>
<html>
<head>
    <title>Program Pengurutan Data</title>
</head>
<body>
<?php
if (!isset($_POST['submit_jumlah']) && !isset($_POST['tampil'])) {
?>
    <form method="post">
        <label>Jumlah Data :</label>
        <input type="number" name="jumlah" required>
        <input type="submit" name="submit_jumlah" value="INPUT DATA">
    </form>

<?php
} elseif (isset($_POST['submit_jumlah'])) {
    $jumlah = $_POST['jumlah'];
?>
    <form method="post">
        <label>Inputkan Bilangan:</label><br><br>
        <?php
        for ($i = 1; $i <= $jumlah; $i++) {
            echo "Angka [$i] = <input type='number' name='angka[]' required><br>";
        }
        ?>
        <br>
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <input type="submit" name="tampil" value="tampil">
    </form>

<?php
} elseif (isset($_POST['tampil'])) {
    $data = $_POST['angka'];
    sort($data);
    $total = array_sum($data);
    $jumlah = count($data);
    $rata2 = $total / $jumlah;

    for ($i = 0; $i < $jumlah; $i++) {
        echo "Angka [" . ($i+1) . "] = " . $data[$i] . "<br>";
    }

    echo "Total = $total<br>";
    echo "Rata-Rata = $rata2";
}
?>

</body>
</html>