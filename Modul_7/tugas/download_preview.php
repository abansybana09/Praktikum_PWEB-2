<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$query = "SELECT * FROM upload WHERE id = $id";
$hasil = mysqli_query($db, $query);

if (mysqli_num_rows($hasil) == 0) {
    die("Data tidak ditemukan.");
}

$data = mysqli_fetch_array($hasil);
$filePath = "data/" . $data['name'];

if (!file_exists($filePath)) {
    die("File tidak ditemukan di server.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pratinjau File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
        }
        .preview-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        img {
            max-width: 100%;
            max-height: 300px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
        .info {
            margin-top: 10px;
            color: #555;
        }
        a.download-link {
            display: inline-block;
            margin-top: 15px;
            background: #2ecc71;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a.download-link:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
<div class="preview-box">
    <h2>🖼 Pratinjau File</h2>
    <?php if (strpos($data['type'], 'image/') === 0): ?>
        <img src="<?= $filePath ?>" alt="Preview Gambar">
    <?php else: ?>
        <p><em>File ini bukan gambar, jadi tidak bisa ditampilkan.</em></p>
    <?php endif; ?>
    <div class="info">
        <p><strong>Nama File:</strong> <?= htmlspecialchars($data['name']) ?></p>
        <p><strong>Ukuran:</strong> <?= $data['size'] ?> bytes</p>
        <p><strong>Tipe:</strong> <?= $data['type'] ?></p>
    </div>
    <a href="download.php?id=<?= $data['id'] ?>" class="download-link">⬇️ Unduh File</a>
</div>
</body>
</html>
