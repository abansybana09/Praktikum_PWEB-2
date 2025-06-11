<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        form {
            background: #fff;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        p {
            max-width: 400px;
            margin: 10px auto;
            background: #e9ffe9;
            padding: 10px;
            border-radius: 4px;
            color: #333;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $nim = htmlspecialchars($_POST['nim'] ?? '');
    $kelas = htmlspecialchars($_POST['kelas'] ?? '');

    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = basename($_FILES['file_upload']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetFile)) {
            echo "<script>alert('File berhasil diupload!');</script>";
            echo "<p>Nama: $nama</p>";
            echo "<p>NIM: $nim</p>";
            echo "<p>Kelas: $kelas</p>";
        } else {
            echo "<script>alert('Gagal mengupload file.');</script>";
        }
    } else {
        echo "<script>alert('Tidak ada file yang diupload.');</script>";
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required><br>
    <label for="nim">NIM:</label>
    <input type="text" name="nim" id="nim" required><br>
    <label for="kelas">Kelas:</label>
    <input type="text" name="kelas" id="kelas" required><br>
    <label for="file_upload">Pilih file untuk diupload:</label>
    <input type="file" name="file_upload" id="file_upload" required>
    <button type="submit">Upload</button>
</form>
</body>
</html>