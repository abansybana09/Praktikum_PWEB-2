<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    function tampilAlert($pesan) {
        echo "<script>
            alert('Pesan: $pesan');
            window.history.go(-1);
        </script>";
    }

    function kuadrat($bilangan) {
        $kuadrat = pow($bilangan, 2);
        echo "<script>
            alert('Hasil $bilangan kuadrat = $kuadrat');
            window.history.go(-1);
        </script>";
        return 1;
    }

    function cekGanjilGenap($bilangan) {
        if ($bilangan % 2 == 0) {
            $hasil = "Genap";
        } else {
            $hasil = "Ganjil";
        }
        echo "<script>
            alert('Bilangan $bilangan adalah $hasil');
            window.history.go(-1);
        </script>";
    }

    switch ($submit) {
        case "Tampilkan":
            tampilAlert($pesan);
            break;
        case "Kuadrat":
            print(kuadrat($bilangan));
            break;
        case "Cek Ganjil/Genap":
            cekGanjilGenap($bilangan);
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan Fungsi</title>
</head>
<body>
    <form method="POST" action="Prak_6.php">
        <label>Tuliskan Pesan Anda</label>
        <input type="text" name="pesan">
        <input type="submit" name="submit" value="Tampilkan">
        <br><hr>
        <label>Tuliskan Bilangan</label>
        <input type="text" name="bilangan" size="3">
        <input type="submit" name="submit" value="Kuadrat">
        <input type="submit" name="submit" value="Cek Ganjil/Genap">
    </form>
</body>
</html>