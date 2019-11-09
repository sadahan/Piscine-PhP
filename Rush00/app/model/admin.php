<?php
function add_all_orders() 
{
    require('config/db.php');
    $request = mysqli_query($db, 'SELECT * FROM orders');
    return ($request);
}

function insert_new_item($data) 
{
    require('config/db.php');
    $request = mysqli_query($db, 'SELECT * FROM orders');
    return ($request);
}


function sup_user($mail) 
{
    require('config/db.php');
    mysqli_query($db, "DELETE FROM clients WHERE mail = '$mail'");
    return(0);
}

function sup_cat($nom) 
{
    require('config/db.php');
    mysqli_query($db, "DELETE FROM categories WHERE nom = '$nom'");
    return(0);
}

function sup_item($ref) 
{
    require('config/db.php');
    mysqli_query($db, "DELETE FROM products WHERE ref = '$ref'");
    return(0);
}

function add_user($data)
{
    require('../../config/db.php');
    $mail = $data['mail'];
    $nom = $data['name'];
    $prenom = $data['surname'];
    $adresse = $data['adresse'];
    $passwd = hash('whirlpool', $data['passwd']);
    $date = date("Y-m-d H:i:s");
    mysqli_query($db, "INSERT INTO clients(mail, nom, prenom, adresse, passwd, date_created) VALUES('$mail', '$nom', '$prenom', '$adresse', '$passwd', '$date')");
}

function add_item($data)
{
	require('../../config/db.php');
	$name = $data['name'];
    $ref = $data['ref'];
    $taille = $data['taille'];
    $couleur = $data['couleur'];
    $price = $data['price'];
	$descript = $data['descript'];
	$src_img = $data['src_img'];
	$categorie = $data['categorie'];
    $stock = $data['stock'];
    
    mysqli_query($db, "INSERT INTO products(name, ref, taille, couleur, price, descript, src_img, categorie, stock) VALUES('$name', '$ref', '$taille', '$couleur', '$price', '$descript', '$src_img', '$categorie', '$stock')");

}

function add_cat($nom)
{
	require('../../config/db.php');
	mysqli_query($db, "INSERT INTO categories(nom) VALUES('$nom')");
}

function mod_item($data)
{
	require('../../config/db.php');
	$ref = $data['référence'];
	if (isset($data['nom']))
	{
		$name = $data['name'];
		mysqli_query($db, "UPDATE products SET name = '$name' WHERE ref = '$ref'");

	}
	if (isset($data['taille']))
	{
		$taille = $data['taille'];
		mysqli_query($db, "UPDATE products SET taille = '$taille' WHERE ref = '$ref'");

	}
	if (isset($data['couleur']))
	{
		$couleur = $data['couleur'];
		mysqli_query($db, "UPDATE products SET couleur = '$couleur' WHERE ref = '$ref'");
	}
	if (isset($data['price']))
	{
		$price = $data['price'];
		mysqli_query($db, "UPDATE products SET price = '$price' WHERE ref = '$ref'");
	}
	if (isset($data['descript']))
	{
		$descript = $data['descript'];
		mysqli_query($db, "UPDATE products SET descript = '$descript' WHERE ref = '$ref'");
	}
	if (isset($data['src_img']))
	{
		$src_img = $data['src_img'];
		mysqli_query($db, "UPDATE products SET src_img = '$src_img' WHERE ref = '$ref'");
	}
	if (isset($data['categorie']))
	{
		$categorie = $data['categorie'];
		mysqli_query($db, "UPDATE products SET categorie = '$categorie' WHERE ref = '$ref'");
	}
	if (isset($data['stock']))
	{
		$stock = $data['stock'];
		mysqli_query($db, "UPDATE products SET stock = '$stock' WHERE ref = '$ref'");
	}
}