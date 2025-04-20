<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Dinamis</title>
</head>
<body>
    <h1>Input Biodata Saya</h1>
    <form method="post">
        <label>Nama: <input type="text" name="biodata[Nama]"></label><br><br>
        <label>Umur: <input type="number" name="biodata[Umur]"></label><br><br>
        <label>Alamat: <input type="text" name="biodata[Alamat]"></label><br><br>
        <label>Kegiatan: <input type="text" name="biodata[Kegiatan]"></label><br><br>
        <label>Kata-Kata: <input type="text" name="biodata[Kata-Kata]"></label><br><br>
        <label>Hobi: <input type="text" name="biodata[Hobi]"></label><br><br>
        <button type="submit">Tampilkan Biodata</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['biodata'])) {
        $biodata = $_POST['biodata'];

        echo "<h2>Biodata Saya</h2>";
        echo "<ol>";
        foreach ($biodata as $key => $value) {
            $value = htmlspecialchars($value); // untuk keamanan
            echo "<li><strong>$key:</strong> $value</li>";
        }
        echo "</ol>";
    }
    ?>
</body>
</html>
