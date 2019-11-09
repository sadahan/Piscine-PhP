#!/usr/bin/php
<?php
if ($argc != 2)
{
	print("Incorrect Parameters\n");
	exit;
}
function is_op($string)
{
	if (trim($string) == '+' || trim($string) == '-' || trim($string) == '*' || trim($string) == '/' || trim($string) == '%')
		return true;
	return false;
}
$str = preg_replace('/\s+/', '', $argv[1]);
$tab = preg_split("<(\+|\-|\/|\*|\%)>", $str, 0, PREG_SPLIT_DELIM_CAPTURE);
if (!$tab || !$tab[2] || !ctype_digit($tab[0]) || !ctype_digit($tab[2]) || !is_op($tab[1]) || $tab[3])
{
	print("Syntax Error\n");
	exit;
}
if (trim($tab[1]) == '+')
	$result = $tab[0] + $tab[2];
if (trim($tab[1]) == '-')
	$result = $tab[0] - $tab[2];
if (trim($tab[1]) == '*')
	$result = $tab[0] * $tab[2];
if (trim($tab[1]) == '/')
	$result = $tab[0] / $tab[2];
if (trim($tab[1]) == '%')
	$result = $tab[0] % $tab[2];
print("$result\n");
?>