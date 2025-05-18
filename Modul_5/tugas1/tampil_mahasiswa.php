<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <?php include "aksi_mahasiswa.php"; ?>
    <form name="form1" method="post" action="">
        <h2>Data Mahasiswa</h2>
        <table width="50%" border="1">
            <tr bgcolor="00FF00" align="center">
                <td>NIM</td>
                <td>Nama</td>
                <td>Prodi</td>
                <td>Angkatan</td>
                <td colspan="2">Aksi</td>
            </tr>
            <?php
            include "tampil_data_mahasiswa.php";
            while ($data = mysqli_fetch_array($r)) {
                echo "<tr>
                <td>{$data['nim']}</td>
                <td>{$data['nama']}</td>
                <td>{$data['prodi']}</td>
                <td>{$data['angkatan']}</td>
                    <td><a href='index.php?menu=edit_mahasiswa&aksi=edit&id={$data['nim']}'>EDIT</a></td>
                    <td><a href='index.php?menu=hapus_mahasiswa&aksi=delete&id={$data['nim']}'>HAPUS</a></td>
                </tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>