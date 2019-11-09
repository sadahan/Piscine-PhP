#!/usr/bin/php
<?php
if ($argc != 3 || !file_exists($argv[1]) || !($fd = fopen($argv[1], "r")))
	exit;
$csv_mimetypes = array('text/csv', 'text/plain', 'application/csv', 'text/comma-separated-values', 'application/excel', 'application/vnd.ms-excel', 'application/vnd.msexcel', 'text/anytext',	'application/octet-stream',	'application/txt');
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$type = finfo_file($finfo, $argv[1]);
finfo_close($finfo);
if (in_array($type, $csv_mimetypes) === FALSE)
	exit ;
function check_valid_file($fd)
{
	$s1 = 0;
	$s2 = 0;
	$line1 = fgets($fd);
	$s1 = mb_substr_count($line1, ";");
	$s2 = mb_substr_count($line1, ",");
	if ($s1 === 0 && $s2 === 0)
		return FALSE;
	$line2 = fgets($fd);
	$s1bis = mb_substr_count($line2, ";");
	$s2bis = mb_substr_count($line2, ",");
	if ($s1 !== $s1bis && $s2 !== $s2bis)
		return FALSE;
	else
		return (($s1 === $s1bis) ? ";" : ",");
}
$sep = check_valid_file($fd);
if ($sep == FALSE)
	exit;
rewind($fd);
$tab = [];
while (($csv_array = fgetcsv($fd, 1000, $sep)))
	$tab[] = $csv_array;
fclose($fd);
foreach ($tab[0] as $value)
	$header_key[] = $value;
if (in_array($argv[2], $header_key) === FALSE)
	exit ;
function num_key($array, $str)
{
	foreach ($array as $key => $value)
		if (strcmp($value, $str) === 0)
			return ($key);
	return FALSE;
}
while (1)
{
	echo "Entrez votre commande: ";
	$input = fgets(STDIN);
	if (!$input)
		break;
	preg_match_all("/[$](.*?)\['(.*?)\']/", $input, $array);
	if (!$array)
		break;
	else
	{
		foreach ($array[1] as $key => $value)
		{
			$k = num_key($header_key, $value);
			if ($k !== FALSE)
			{
				foreach ($tab as $k1 => $val1)
					if (in_array($array[2][$key], $val1) === TRUE)
					{	
						$rep = $tab[$k1][$k];
						$input = preg_replace("/[$](.*?)\['(.*?)\']/", "\"".$rep."\"", $input, 1);
						break;
					}
			}
		}
	}
	eval($input);
}
echo "\n";
?>