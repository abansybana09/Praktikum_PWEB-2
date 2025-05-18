<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <?php include "aksi_buku.php"; ?>
    <form name="form1" method="post" action="">
        <h2>Data Buku</h2>
        <table width="50%" border="1">
            <tr bgcolor="00FF00" align="center">
                <td>Kode</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td colspan="2">Aksi</td>
            </tr>
            <?php
            include "tampil_data_buku.php";
            while ($data = mysqli_fetch_array($r)) {
                echo "<tr>
                <td>{$data['kd_buku']}</td>
                <td>{$data['judul']}</td>
                <td>{$data['pengarang']}</td>
                <td>{$data['penerbit']}</td>
                    <td><a href='index.php?menu=edit_buku&aksi=edit&id={$data['kd_buku']}'>EDIT</a></td>
                    <td><a href='index.php?menu=hapus_buku&aksi=delete&id={$data['kd_buku']}'>HAPUS</a></td>
                </tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>
