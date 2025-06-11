<?php
session_start();
unset($_SESSION['nama_user']);
session_destroy();
echo "<h2>Anda sudah keluar dari session</h2>";
?>