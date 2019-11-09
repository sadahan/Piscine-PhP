<?php
session_start();
require('../../config/db.php');

if ($_POST['submit'] == "OK")
{
    if (!isset($_SESSION['basket']))
    {
        $error['no_item'] = "Votre panier est vide !";
        $_SESSION['error'] = $error;
        header('Location: ../../index.php?view=basket');
    }
    else if(!isset($_SESSION['token_connect']))
    {
        $error['no_connect'] = "Veuillez vous connecter a votre compte client avec de confirmer votre commande !";
        $_SESSION['error'] = $error;
        header('Location: ../../index.php?view=basket');
    }
    else
    {
        $id_client = $_SESSION['id'];
        $items = json_encode($_SESSION['basket']);
        $date = date("Y-m-d H:i:s");
        $order_num = openssl_random_pseudo_bytes(6);
        $order_num = bin2hex($order_num);
        $request = mysqli_query($db, "INSERT INTO orders(ref_order, id_client, items, date_created) VALUE('$order_num', '$id_client', '$items', '$date')");
        foreach($_SESSION['basket'] as $ref)
        {
            $stock = get_stock_item($ref['ref']);
            $stock = $stock[0][0];
            stock_less($ref['ref'], $ref['quantity'], $stock);
        }
        unset($_SESSION['basket']);
        header("Location: ../../index.php?view=order&order='$order_num'");
    }
}
else
{
    header('Location: ../../index.php');
}

function get_stock_item($ref)
{
    require('../../config/db.php');
    $stock = mysqli_query($db, "SELECT stock FROM products WHERE ref = '$ref'");
    $stock = mysqli_fetch_all($stock);
    return ($stock);
}

function stock_less($ref, $less, $stock)
{
    require('../../config/db.php');
    $stock = $stock - $less;
    mysqli_query($db, "UPDATE products SET stock = '$stock' WHERE ref = '$ref'");
    return (0);
}