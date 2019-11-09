#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
if ($argc != 2)
	exit;
function check_valid($string, $array)
{
	foreach ($array as $key => $value)
	{
		if (strcmp(ucfirst($string), $value) == 0)
			return ($key + 1);
		if (!$array)
			return false;
	}
}
function check_hour($string)
{
	$hour = explode(':', $string);
	if (count($hour, 0) == 3 && strlen($hour[0]) == 2 && strlen($hour[1]) == 2 && strlen($hour[2]) == 2)
		return ($hour);
	return false;
}
$jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
$mois2 = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
$date = explode(' ', $argv[1]);
if (count($date, 0) != 5 || !check_valid($date[0], $jour) || (!check_valid($date[2], $mois) && !check_valid($date[2], $mois2)) || !($date[1] >= 1 && $date[1] <= 31)
|| !ctype_digit($date[3]) || strlen($date[1]) != 2 || strlen($date[3]) != 4 || !check_hour($date[4]))
	exit("Wrong Format\n");
$hour = check_hour($date[4]);
if (check_valid($date[2], $mois))
	$seconds = mktime($hour[0], $hour[1], $hour[2], check_valid($date[2], $mois), $date[1], $date[3]);
else
	$seconds = mktime($hour[0], $hour[1], $hour[2], check_valid($date[2], $mois2), $date[1], $date[3]);
echo "$seconds\n";
?>