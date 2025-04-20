<HTML>
<BODY>
<FORM NAME="FORM1" METHOD="GET" action="Prak_2.php">
<?php
for($i=0; $i<=2; $i++){
	echo "<input type='text' name='buah_buahan[$i]'><br>";
}
echo "<br> <input type='submit' name='tampil' value='TAMPIL'>";
if(isset($_GET['tampil']))
{
	echo "<br> ================
	<br> Data Buah-Buahan : <br>
	====================== <br>";
	if(isset($_GET['buah_buahan'])) {
		$buah_buahan = $_GET['buah_buahan'];
		for($i=0; $i<=2; $i++) {
			echo htmlspecialchars($buah_buahan[$i]) . "<br>";
		}
	}
}
?>
</FORM>
</BODY>
</HTML>