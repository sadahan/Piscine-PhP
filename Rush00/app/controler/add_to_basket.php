<?php
session_start();
$item = array();
$item['color'] = $_POST['color'];
$item['size'] = $_POST['size'];
$item['quantity'] = $_POST['quantity'];
$item['ref'] = $_GET['ref'];
$item['price'] = $data['price'];
if(!isset($_SESSION['basket']))
{ 
    $_SESSION['basket'] = array();
}
array_push($_SESSION['basket'], $item);
header('Location: ../../index.php?view=basket');
