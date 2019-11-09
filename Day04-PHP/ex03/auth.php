<?php

function auth($login, $passwd)
{
	if (!$login || !$passwd)
	return false;
	$h_pwd = hash('whirlpool', $passwd);
	$data = file_get_contents("../private/passwd");
	if (!$data)
		return FALSE;
	$array = unserialize($data);
	foreach ($array as $value)
	{
		if ($value['login'] == $login && $value['passwd'] == $h_pwd)
			return TRUE;
	}
	return FALSE;
}

?>