<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Laporan Data Buku</h2>
    <table width="90%" border ="1">
        <tr bgcolor="#00FF00" align="center" valign="middle">
            <th>No</th>
            <th>KODE</th>
            <th>JUDUL</th>
            <th>PENGARANG</th>
            <th>PENERBIT</th>
        </tr>
        <?php
        include "Koneksi.php";
        $q = "SELECT * FROM buku";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        $no = 1;
        while ($data = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td align='center'>$no</td>";
            echo "<td>$data[kd_buku]</td>";
            echo "<td>$data[judul]</td>";
            echo "<td>$data[pengarang]</td>";
            echo "<td>$data[penerbit]</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
    <br>
<form method="post" action="CetakLapBuku.php" target="_blank">
    <button type="submit">Cetak PDF</button>
</form>

</body>
</html>