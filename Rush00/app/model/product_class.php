<?php

function add_all_product() 
{
    require('config/db.php');
    $request = mysqli_query($db, 'SELECT * FROM products');
    return ($request);
}

function add_product_categorie($categorie) 
{
    require('config/db.php');
    $request = mysqli_query($db, "SELECT * FROM products WHERE categorie = '$categorie'");
    return ($request);
}

function add_product_info($ref)
{
    require('config/db.php');
    $request = mysqli_query($db, "SELECT * FROM products WHERE ref = '$ref'");
    return ($request);
}

function add_list_categorie()
{
    require('config/db.php');
    $request = mysqli_query($db, "SELECT nom FROM categories");
    return ($request);
}

function stock_less($ref, $less, $stock)
{
    require('config/db.php');
    $stock = $stock - $less;
    mysqli_query($db, "UPDATE products SET stock = '$stock' WHERE ref = '$ref'");
    return (0);
}

function get_stock_item($ref)
{
    require('config/db.php');
    $stock = mysqli_query($db, "SELECT stock FROM products WHERE ref = '$ref'");
    return ($stock);
}