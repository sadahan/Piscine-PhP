<?php
session_start();
if ($_GET["submit"])
{
	if ($_GET["submit"] == "OK")
	{
	 	$_SESSION['login'] = $_GET['login'];
	 	$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?>
<html><body>
<form action="./index.php" method="get">
	Identifiant: <input type="text" name="login" value="<?php if ($_SESSION["login"]){ echo $_SESSION["login"];} ?>"/>
	<br />
    Mot de passe: <input type="password" name="passwd" value="<?php if ($_SESSION["passwd"]){echo $_SESSION["passwd"];} ?>" />
	<br />
	<input type="submit" name="submit" value="OK" /><br />
</form>
</body></html>
