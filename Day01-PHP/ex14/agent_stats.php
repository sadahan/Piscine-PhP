#!/usr/bin/php
<?php
stream_set_blocking(STDIN, 0);
if ($argc != 2)
	exit;
$tab = [];

while (($csv_array = fgetcsv(STDIN, 1000, ";")))
{
	if (ctype_digit($csv_array[1]) && (strcmp($csv_array[2], "moulinette") !== 0))
	{
		$tab[] = $csv_array;
		$moyenne[] = (int)$csv_array[1];
	}
	elseif (ctype_digit($csv_array[1]) && (strcmp($csv_array[2], "moulinette") === 0))
	{
		$moul[] = $csv_array;
	}
}
if ($moyenne && (strcmp($argv[1], "moyenne") === 0))
{
	foreach ($moyenne as $key => $value)
		$tot += $value;
	$result = $tot / count($moyenne);
	echo "$result\n";
	exit;
}
if ($tab && (strcmp($argv[1], "moyenne_user") === 0))
{
	while ($tab)
	{
		$name = $tab[0][0];
		$i = 0;
		$notes = 0;
		foreach ($tab as $key => $val)
		{
			if ((strcmp($name, $val[0]) === 0))
			{
				$notes = $notes + (int)$val[1];
				$i++;
				unset($tab[$key]);
			}
		}
		$tab = array_values($tab);
		$moy[] = $name.":".((string)($notes / $i));
	}
	sort($moy);
	foreach ($moy as $key => $val)
		echo "$val\n";
}
if ($moul && (strcmp($argv[1], "ecart_moulinette") === 0))
{
	while ($tab && $moul)
	{
		$name = $tab[0][0];
		$i = 0;
		$j = 0;
		$notes = 0;
		$notes_moul = 0;
		foreach ($tab as $key => $val)
		{
			if ((strcmp($name, $val[0]) === 0))
			{
				$notes = $notes + (int)$val[1];
				$i++;
				unset($tab[$key]);
			}
		}
		$tab = array_values($tab);
		foreach ($moul as $key => $val)
		{
			if ((strcmp($name, $val[0]) === 0))
			{
				$notes_moul = $notes_moul + (int)$val[1];
				$j++;
				unset($moul[$key]);
			}
		}
		$moul = array_values($moul);
		$moy_moul[] = $name.":".((string)(($notes / $i) - ($notes_moul / $j)));
	}
	sort($moy_moul);
	foreach ($moy_moul as $key => $val)
		echo "$val\n";
}
?>