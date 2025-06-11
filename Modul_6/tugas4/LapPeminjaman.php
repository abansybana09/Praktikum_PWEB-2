<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Peminjaman</title>
    <style>
        .cetak-container {
            width: 90%;
            margin-top: 20px;
            text-align: right;
        }
        .tmbl-cetak {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .tmbl-cetak:hover {
            background-color: #0056b3;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2 align="center">LAPORAN DATA PEMINJAMAN</h2>
    <table width="90%" border="1" align="center" cellspacing="0" cellpadding="5">
        <tr bgcolor="#00ff00" align="center" valign="middle">
            <th>KODE PINJAM</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>TANGGAL PINJAM</th>
            <th>TANGGAL KEMBALI</th>
        </tr>

        <?php
        include "Koneksi.php"; 

        $query = "
            SELECT 
                p.kode_pinjam, 
                p.nim, 
                m.nama AS nama_mahasiswa, 
                p.kode_buku, 
                b.judul AS judul_buku, 
                p.tanggal_pinjam, 
                p.tanggal_kembali
            FROM peminjaman p
            LEFT JOIN mahasiswa m ON p.nim = m.nim
            LEFT JOIN buku b ON p.kode_buku = b.kode
            ORDER BY p.tanggal_pinjam DESC
        ";

        $result = mysqli_query($db, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($db));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr align='center'>
                <td>{$row['kode_pinjam']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['nama_mahasiswa']}</td>
                <td>{$row['kode_buku']}</td>
                <td>{$row['judul_buku']}</td>
                <td>{$row['tanggal_pinjam']}</td>
                <td>{$row['tanggal_kembali']}</td>
            </tr>";
        }

        mysqli_close($db);
        ?>
    </table>

    <div class="cetak-container no-print">
        <a href="CetakLapPeminjaman.php" target="_blank" class="tmbl-cetak">Cetak PDF</a>
    </div>
</body>
</html>
