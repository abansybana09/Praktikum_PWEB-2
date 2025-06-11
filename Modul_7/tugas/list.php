<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 40px;
        }
        .file-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-left: 5px solid #3498db;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .file-card a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        .file-card a:hover {
            text-decoration: underline;
        }
        .meta {
            font-size: 0.9em;
            color: #666;
        }
        .delete-link {
            color: #e74c3c;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<h2>📂 Daftar File yang Telah Diupload</h2>
<?php
include 'koneksi.php';
$query = "SELECT * FROM upload";
$hasil = mysqli_query($db, $query);
while ($data = mysqli_fetch_array($hasil)) {
    echo "<div class='file-card'>
        <a href='download_preview.php?id=" . $data['id'] . "'>" . htmlspecialchars($data['name']) . "</a><br>
        <span class='meta'>{$data['size']} bytes | {$data['type']}</span>
        <br>
        <a href='delete.php?id=" . $data['id'] . "' class='delete-link'>🗑 Hapus</a>
    </div>";
}
?>
</body>
</html>
