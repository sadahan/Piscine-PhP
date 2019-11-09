<?php
function check_if_exists($array)
{
	foreach ($array as $value)
		if ($value['login'] == $_POST['login'])
			return TRUE;
	return FALSE;
}

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
{
	$h_pwd = hash("whirlpool", $_POST['passwd']);
	if (!file_exists("../private"))
		mkdir("../private", 0777);
	if (!file_exists("../private/passwd"))
	{
		$account[] = ['login'=>$_POST['login'], 'passwd'=>$h_pwd];
		$data = serialize($account);
		file_put_contents("../private/passwd", $data);
		echo OK."\n";
	}
	else
	{
		$data = file_get_contents("../private/passwd");
		$array = unserialize($data);
		if (check_if_exists($array) == FALSE)
		{
			$array[] = ['login'=>$_POST['login'], 'passwd'=>$h_pwd];
			$data = serialize($array);
			file_put_contents("../private/passwd", $data);
			echo OK."\n";
		}
		else
			echo ERROR."\n";
	}
}
else
	echo ERROR."\n";
?>