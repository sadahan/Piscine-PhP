#!/usr/bin/php
<?php
if ($argc != 2 || !file_exists($argv[1]))
	exit;
if (($file = file_get_contents($argv[1])) === FALSE)
	exit;
$pattern = '/(<a)(.*?)(>)(.*)(<\/a>)/si';
function replace_pattern($m)
{
	return ($m[1].strtoupper($m[2]).$m[3]);
}
function replace_regex($m)
{
	$m[0] = preg_replace_callback('/( title=")(.*?)(")/mi', replace_pattern, $m[0]);
	$m[0] = preg_replace_callback('/(>)(.*?)(<)/si', replace_pattern, $m[0]);
	return ($m[0]);
}
$file = preg_replace_callback($pattern, replace_regex, $file);
print("$file\n");
?>