<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($user)) {
    die("Anda belum register atau mendaftar.");
} else {
    echo "<p>
    <a href='keluar_session.php'>LOGOUT</a>";
    echo "<h2>WELCOME TO My Website, $user</h2></p>";
}
?>
</body>
</html>
