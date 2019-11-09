<?php
if ($_POST['submit'] != "OK" || !$_POST['newpw'])
{
	echo ERROR."\n";
	exit;
}
$modif = FALSE;
$h_pwd = hash('whirlpool', $_POST['newpw']);
$h_oldpwd = hash("whirlpool", $_POST['oldpw']);
$data = file_get_contents("../private/passwd");
$array = unserialize($data);
foreach ($array as $key => $value)
{
	if ($value['login'] === $_POST['login'] && $h_oldpwd === $value['passwd'])
	{
		$array[$key]['passwd'] = $h_pwd;
		$modif = TRUE;
	}
}
if ($modif == TRUE)
{
	$new_data = serialize($array);
	file_put_contents("../private/passwd", $new_data);
	echo OK."\n";
}
elseif ($modif == FALSE)
	echo ERROR."\n";
?>