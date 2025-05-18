<html>
<head>
    <title>Input Data Mahasiswa</title> 
</head>
<body>
    <?php 
    include "tampil_data_mahasiswa.php"; 
    if (isset($data)) {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $prodi = $data['prodi'];
        $angkatan = $data['angkatan'];
        $tombol = "Update";
    } else {
        $nim = "";
        $nama = "";
        $prodi = "";
        $angkatan = "";
        $tombol = "Simpan";
    }
    ?>
    <form name="form1" method="post" action="index.php?menu=simpan_mahasiswa">
        <h2>Input Data Mahasiswa</h2>
        <p>
            NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
            <input type="hidden" name="id_mahasiswa" value="<?php echo $nim; ?>">
        </p>
        <p>
            Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        </p>
        <p>
            Program Studi: 
            <select name="prodi">
                <option value="TI" <?php if($prodi == 'TI') echo 'selected'; ?>>TI</option>
                <option value="SI" <?php if($prodi == 'SI') echo 'selected'; ?>>SI</option>
            </select>
        </p>
        <p>
            Angkatan: <input type="text" name="angkatan" value="<?php echo $angkatan; ?>">
        </p>
        <p>
            <input name="submit" type="submit" value="<?php echo $tombol; ?>">
            <input name="batal" type="reset" value="Batal">
        </p>
    </form>
</body>
</html>
