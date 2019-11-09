#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$filename = "/var/run/utmpx";
if (!file_exists($filename))
	exit;
if (!$file = fopen($filename, 'r'))
	exit;
if (!$contents = fread($file, 1256))
	exit;
while ($contents = fread($file, 628))
	$array[] = unpack("a256user/a4id/a32line/ipid/itype/itime", $contents);
foreach ($array as $data)
{	
	if ($data[type] === 7)
	{
		printf ("%-8s %s  ", trim($data[user]), trim($data[line]));
		$str = date('F d H:i ', $data[time]);
		$str2 = substr($str, 0, 3). substr($str, -10);
		echo $str2 . "\n";
	}
}
fclose($file);
?>