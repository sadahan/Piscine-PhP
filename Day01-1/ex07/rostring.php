#!/usr/bin/php
<?php
if ($argc == 1)
	exit;
$str = trim(preg_replace('/ +/', ' ', $argv[1]));
$i = 0;
while ($str[$i] && $str[$i] != ' ')
	$i++;
if ($i < strlen($str))
{
	print(substr($str, $i + 1));
	echo " ";
}
print(substr($str, 0, $i));
echo "\n";
?>