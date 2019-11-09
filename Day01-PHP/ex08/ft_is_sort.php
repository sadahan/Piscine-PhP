#!/usr/bin/php
<?php
function ft_is_sort($table)
{
	$sorted = array_values($table);
	(sort($sorted));
	if ($sorted === $table)
		return true;
	else
		return false;
}
?>