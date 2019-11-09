#!/usr/bin/php
<?php
if ($argc == 1)
	exit;

function ft_split($string)
{
	$string = trim($string, ' ');
	$tab = preg_split("/ +/", $string);
	sort($tab);
	return $tab;
}

$table = ft_split($argv[1]);
$i = 2;
while ($i < $argc)
{
	$table = array_merge ($table, ft_split($argv[$i]));
	$i++;
}

$alpha = array();
$num = array();

foreach ($table as $key => $value)
{
	if (ctype_alpha($value))
	{
		$alpha[] = $value;
		unset($table[$key]);
	}
	elseif(ctype_digit($value))
	{
		$num[] = $value;
		unset($table[$key]);
	}
}
natcasesort($alpha);
foreach($alpha as $value)
{
	echo "$value\n";
}
sort($num, SORT_STRING);
foreach($num as $value)
{
	echo "$value\n";
}
sort($table);
foreach($table as $value)
{
	echo "$value\n";
}
?>