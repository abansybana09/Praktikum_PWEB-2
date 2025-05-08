<!DOCTYPE html>
<html>
<head>
    <title>Koneksi Database</title>
</head>
<body>
    <h2>Uji Koneksi Database</h2>

    <?php
    // Konfigurasi database
    $host     = "localhost";
    $user     = "root";
    $password = "";
    $database = "db_praktikum";

    // Membuat koneksi
    $koneksi = new mysqli($host, $user, $password, $database);

    // Mengecek koneksi
    if ($koneksi->connect_error) {
        echo "<p style='color:red;'>Koneksi gagal: " . $koneksi->connect_error . "</p>";
    } else {
        echo "<p style='color:green;'>Koneksi ke database <strong>$database</strong> berhasil!</p>";
    }

    // Menutup koneksi (opsional di sini, tapi baik untuk kebiasaan)
    $koneksi->close();
    ?>
</body>
</html>
