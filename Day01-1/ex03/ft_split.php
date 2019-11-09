#!/usr/bin/php
<?php
function ft_split($str)
{
	$str = trim($str, ' ');
	$tab = preg_split("/ +/", $str);
	sort($tab);
	return $tab;
}
?>