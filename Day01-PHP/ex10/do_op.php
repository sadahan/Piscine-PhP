#!/usr/bin/php
<?php
if ($argc != 4)
{
	print("Incorrect Parameters\n");
	exit;
}
if (trim($argv[2]) == '+')
	$result = trim($argv[1]) + trim($argv[3]);
if (trim($argv[2]) == '-')
	$result = trim($argv[1]) - trim($argv[3]);
if (trim($argv[2]) == '*')
	$result = trim($argv[1]) * trim($argv[3]);
if (trim($argv[2]) == '/')
	$result = trim($argv[1]) / trim($argv[3]);
if (trim($argv[2]) == '%')
	$result = trim($argv[1]) % trim($argv[3]);
print("$result\n");
?>