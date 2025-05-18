<?php
include "Koneksi.php"; 

// Ambil semua kd_buku untuk dropdown
$query = "SELECT kd_buku FROM buku";
$result = mysqli_query($db, $query);
?>

<form method="post" action="">
    <label for="kd_buku">Pilih Kode Buku:</label>
    <select name="kd_buku" id="kd_buku">
        <option value="">-- Pilih Kode Buku --</option>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['kd_buku']}'";
            if (isset($_POST['kd_buku']) && $_POST['kd_buku'] == $row['kd_buku']) {
                echo " selected";
            }
            echo ">{$row['kd_buku']}</option>";
        }
        ?>
    </select>
    <input type="submit" value="Kirim">
</form>

<?php
// Menampilkan judul buku berdasarkan kd_buku yang dipilih
if (isset($_POST['kd_buku']) && $_POST['kd_buku'] != "") {
    $kd_buku = mysqli_real_escape_string($db, $_POST['kd_buku']);
    $query = "SELECT judul FROM buku WHERE kd_buku = '$kd_buku'";
    $result = mysqli_query($db, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Judul Buku:</strong> " . htmlspecialchars($row['judul']) . "</p>";
    } else {
        echo "<p>Kode buku tidak ditemukan.</p>";
    }
}
?>
