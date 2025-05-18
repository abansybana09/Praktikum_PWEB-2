<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <form name="form1" method="post" action="">
        <h2>Data Buku</h2>
        <table width="50%" border="1">
            <tr bgcolor="00FF00" align="center">
                <td>Kode</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
            </tr>
            <?php
            include "tampil_data_buku.php";
            while ($data = mysqli_fetch_array($r)) {
                echo "<tr>
                <td>{$data['kd_buku']}</td>
                <td>{$data['judul']}</td>
                <td>{$data['pengarang']}</td>
                <td>{$data['penerbit']}</td>
                </tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>
