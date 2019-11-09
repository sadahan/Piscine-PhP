#!/usr/bin/php
<?php
if ($argc < 3)
	exit;
$key = $argv[1];
$i = 2;
while ($i < $argc)
{
	if ($i == 2)
		$str = $argv[2];
	elseif ($i < $argc)
		$str = $str.':'.$argv[$i];
	$i++;
}
trim($str);
$tab = explode(':', $str);
$check = 0;
foreach ($tab as $index => $value)
{
	if ($value === $key)
	{
		$check++;
		$result = $tab[$index + 1];
	}
}
if (!$check)
	exit;
print("$result\n");
?>