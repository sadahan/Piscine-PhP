#!/usr/bin/php
<?php
if ($argc == 1)
	exit;
$str = trim(preg_replace('/[\t| ]+/', ' ', $argv[1]));
print("$str\n");
?>