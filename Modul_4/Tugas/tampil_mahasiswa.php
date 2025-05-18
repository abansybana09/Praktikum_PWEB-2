<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <form name="form1" method="post" action="">
        <h2>Data Mahasoswa</h2>
        <table width="50%" border="1">
            <tr bgcolor="00FF00" align="center">
                <td>Nim</td>
                <td>Nama</td>
                <td>Prodi</td>
                <td>Angakatan</td>
            </tr>
            <?php
            include "tampil_data_mahasiswa.php";
            while ($data = mysqli_fetch_array($r)) {
                echo "<tr>
                <td>{$data['nim']}</td>
                <td>{$data['nama']}</td>
                <td>{$data['prodi']}</td>
                <td>{$data['angkatan']}</td>
                </tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>
