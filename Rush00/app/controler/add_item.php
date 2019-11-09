<?php
session_start();
require('../model/product_class.php');

if (!isset($_POST['categorie']))
{
    $item = add_all_product();
    return ($item);
}
// else
// {
    
// }