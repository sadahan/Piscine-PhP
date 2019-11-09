#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$input = fgets(STDIN);
	if (!$input)
		break;
	$input = trim($input);
	$num_l = strlen((string)$input);
	if (!is_numeric($input))
		echo "'$input' n'est pas un chiffre\n";
	else
	{
		$num = (string)$input[$num_l - 1];
		$number = (int)$num;
		if ($number % 2 == 0)
			echo "Le chiffre $input est Pair\n";
		else
			echo "Le chiffre $input est Impair\n";
	}
}
echo "\n";
?>