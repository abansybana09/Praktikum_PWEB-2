<!DOCTYPE html>
<html>
<body>
    <form name="form1" method="get" action="prak_6.php">
        <pre>
NIM = <input type="text" name="NIM" maxlength="11">
<input type="submit" name="tampil" value="TAMPILKAN">
        </pre>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['tampil'])) {
            $NIM = htmlspecialchars($_GET['NIM']);
            echo "NIM Anda = $NIM";
        }
    }
    ?>
</body>
</html>