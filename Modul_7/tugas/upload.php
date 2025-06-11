<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f6f8;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    h2 {
        color: #2c3e50;
        border-bottom: 2px solid #3498db;
        padding-bottom: 5px;
    }

    strong {
        color: #34495e;
    }

    img {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 5px;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    a {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: #2980b9;
    }

    .error {
        background: #ffe6e6;
        padding: 15px;
        border-left: 5px solid #e74c3c;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .success {
        background: #e8f8f5;
        padding: 15px;
        border-left: 5px solid #2ecc71;
        border-radius: 4px;
        margin-bottom: 15px;
    }
</style>

<?php
$uploaddir = 'data/';

// Cek apakah file dikirim
if (!isset($_FILES['userfile']) || $_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
    echo "<strong>Error:</strong> ";
    if (!isset($_FILES['userfile'])) {
        echo "Tidak ada file yang dikirim.<br>";
    } else {
        switch ($_FILES['userfile']['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "Ukuran file terlalu besar.<br>";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "File hanya ter-upload sebagian.<br>";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Tidak ada file yang dipilih.<br>";
                break;
            default:
                echo "Terjadi kesalahan saat upload (Kode: " . $_FILES['userfile']['error'] . ").<br>";
        }
    }
    echo "<br><a href='javascript:history.back()'>← Kembali</a>";
    exit;
}

// Ambil informasi file
$fileName = $_FILES['userfile']['name'];
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

include "koneksi.php";

// Cek apakah file sudah ada di database
$query = "SELECT count(*) as jum FROM upload WHERE name = ?";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "s", $fileName);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

// Insert/update database
if ($data['jum'] > 0) {
    $query = "UPDATE upload SET size = ?, type = ? WHERE name = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "iss", $fileSize, $fileType, $fileName);
} else {
    $query = "INSERT INTO upload (name, size, type) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sis", $fileName, $fileSize, $fileType);
}
mysqli_stmt_execute($stmt);

// Simpan file ke folder
$uploadfile = $uploaddir . $fileName;

if (move_uploaded_file($tmpName, $uploadfile)) {
    echo "<h2>Upload Berhasil</h2>";
    echo "<img src='$uploadfile' alt='Preview Gambar' style='max-width:300px;'><br><br>";
    echo "<strong>Nama File:</strong> " . htmlspecialchars($fileName) . "<br>";
    echo "<strong>Ukuran:</strong> $fileSize bytes<br>";
    echo "<strong>Tipe:</strong> $fileType<br>";
    echo "<br><a href='list.php'>Kembali ke Daftar File</a>";
} else {
    echo "<strong>File gagal diupload.</strong>";
}
?>
