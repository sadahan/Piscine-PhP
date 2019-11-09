#!/usr/bin/php
<?php
$i = 1;
if ($argc == 1)
	exit;
function ft_split($string)
{
	$string = trim($string, ' ');
	$tab = preg_split("/ +/", $string);
	sort($tab, SORT_STRING);
	return $tab;
}
while ($i < $argc)
{
	if ($i == 1)
		$str = $argv[1];
	elseif ($i < $argc)
		$str = $str.' '.$argv[$i];
	$i++;
}
$table = ft_split($str);
foreach($table as $value)
{
	echo "$value\n";
}
?>