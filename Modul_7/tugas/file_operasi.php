<?php
if (isset($_POST['filename']) && isset($_POST['konten'])) {
    $nama = basename($_POST['filename']);
    $konten = $_POST['konten'];
    $lokasi = "data/" . $nama . ".txt";

    if (!is_dir("data")) {
        mkdir("data");
    }

    $hasil = file_put_contents($lokasi, $konten);
    if ($hasil !== false) {
        echo "<p style='color:green;'>File <strong>$nama.txt</strong> berhasil dibuat!</p>";
    } else {
        echo "<p style='color:red;'>Gagal membuat file</p>";
    }
}
if (isset($_GET['lihat'])) {
    $nama = basename($_GET['lihat']);
    $path = "data/" . $nama . ".txt";

    if (file_exists($path)) {
        echo "<h3>Isi File: $nama.txt</h3><pre>";
        echo htmlspecialchars(file_get_contents($path));
        echo "</pre><hr>";
    } else {
        echo "<p style='color:red;'>File tidak ditemukan!</p><hr>";
    }
}
?>

<h2>Form Buat File TXT</h2>
<form action="" method="POST">
    Nama File (tanpa .txt): <input type="text" name="filename" required><br><br>
    Isi File:<br>
    <textarea name="konten" rows="6" cols="50" required></textarea><br><br>
    <input type="submit" value="Buat File">
</form>

<hr>

<h2>Daftar File</h2>
<?php
if (is_dir("data")) {
    $files = scandir("data");
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            $namafile = pathinfo($file, PATHINFO_FILENAME);
            echo "<p>
                <strong>$file</strong> 
                [ <a href='?lihat=$namafile'>Lihat</a> ] 
                [ <a href='data/$file' download>Download</a> ]
            </p>";
        }
    }
} else {
    echo "Belum ada file.";
}
?>
