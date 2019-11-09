#!/usr/bin/php
<?php
if ($argc != 2)
	exit;
$str = trim(preg_replace('/ +/', ' ', $argv[1]));
echo "$str\n";
?>