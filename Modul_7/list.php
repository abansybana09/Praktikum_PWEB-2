<?php

include 'koneksi.php';
$query = "SELECT * FROM upload";
$hasil = mysqli_query($db, $query);
while ($data = mysqli_fetch_array($hasil)) {
    echo "<p>
    <a href='download.php?id=" . $data['id'] . "'>download " . $data['name'] . "</a>
    ({$data['size']} bytes)
    [ <a href='delete.php?id=" . $data['id'] . "'>Hapus</a> ]
    </p>";
}
