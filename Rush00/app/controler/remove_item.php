<?php 
session_start();
$ref = $_GET['ref'];
foreach ($_SESSION['basket'] as $key => $VALUE)
{
    if ($VALUE['ref'] == $ref)
    {
        unset($_SESSION['basket'][$key]);
        break;
    }
}
$_SESSION['basket'] = array_values($_SESSION['basket']);
header('Location: ../../index.php?view=basket');