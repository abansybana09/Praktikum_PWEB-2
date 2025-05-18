<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $database = "perpustkaan_fkom";

    $db = @mysqli_connect($dbHost, $dbUser, $dbPassword)
        or die("Koneksi gagal: " . @mysqli_connect_error());

    @mysqli_select_db($db, $database)
        or die("Database tidak ditemukan: " . $database);
?>
