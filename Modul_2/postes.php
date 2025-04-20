<!DOCTYPE html>
<html>
<head>
    <title>Program Pengurutan Nama Sesuai Alfabet</title>
</head>
<body>
<?php
if (!isset($_POST['submit_jumlah']) && !isset($_POST['tampil'])) {
?>
    <form method="post">
        <h3>PosTes PWEB2 Modul 2</h3>
        <label>Masukkan Jumlah Nama :</label>
        <input type="number" name="jumlah" required>
        <input type="submit" name="submit_jumlah" value="INPUT DATA">
    </form>

<?php
} elseif (isset($_POST['submit_jumlah'])) {
    $jumlah = $_POST['jumlah'];
?>
    <form method="post">
        <label>Input Nama Yang Telah Dimasukkan:</label><br><br>
        <?php
        for ($i = 1; $i <= $jumlah; $i++) {
            echo "Nama [$i] = <input type='text' name='nama[]' required><br>";
        }
        ?>
        <br>
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <input type="submit" name="tampil" value="TAMPILKAN">
    </form>

<?php
} elseif (isset($_POST['tampil'])) {
    $data = $_POST['nama'];
    sort($data); // Mengurutkan nama secara alfabet

    $jumlah = count($data);

    echo "<h4>Nama yang telah diurutkan:</h4>";
    for ($i = 0; $i < $jumlah; $i++) {
        echo "Nama [" . ($i+1) . "] = " . $data[$i] . "<br>";
    }
}
?>

</body>
</html>
