<html>
<head>
    <title>Input Data Buku</title> 
</head>
<body>
    <?php 
    include "tampil_data_buku.php"; 
    if (isset($data)) {
        $kode = $data['kd_buku'];
        $judul = $data['judul'];
        $pengarang = $data['pengarang'];
        $penerbit = $data['penerbit'];
        $tombol = "Update";
    } else {
        $kode = "";
        $judul = "";
        $pengarang = "";
        $penerbit = "";
        $tombol = "Simpan";
    }
    ?>
    <form name="form1" method="post" action="index.php?menu=simpan_buku">
        <h2>Input Data Buku</h2>
        <p>
            Kode Buku: <input type="text" name="kode_buku" value="<?php echo $kode; ?>">
            <input type="hidden" name="id_buku" value="<?php echo $kode; ?>">
        </p>
        <p>
            Judul Buku: <input type="text" name="judul_buku" value="<?php echo $judul; ?>">
        </p>
        <p>
            Pengarang: <input type="text" name="pengarang_buku" value="<?php echo $pengarang; ?>">
        </p>
        <p>
            Penerbit: <input type="text" name="penerbit_buku" value="<?php echo $penerbit; ?>">
        </p>
        <p>
            <input name="submit" type="submit" value="<?php echo $tombol; ?>">
            <input name="batal" type="reset" value="Batal">
        </p>
    </form>
</body>
</html>