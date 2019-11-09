<?php
session_start();

function Check_account_data($data)
{
    if (!array_key_exists('adresse', $data) || $data['adresse'] === ""){
        $error['adresse'] = "Vous devez entrer une adresse.";
    }
    if ($data['CGV'] != "OK") {
        $error['CGV'] = "Vous devez accepter les conditions générales de vente !";
    }
    if (!array_key_exists('mail', $data) || $data['mail'] === "" || !filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
        $error['mail'] = "Vous n'avez pas renseigné un email valide.";
    }
    if (!array_key_exists('name', $data) || $data['name'] === "") {
        $error['name'] = "Vous n'avez pas remplie votre nom.";
    }
    if (!array_key_exists('surname', $data) || $data['surname'] === "") {
        $error['name'] = "Vous n'avez pas remplie votre prenom.";
    }
    if (!array_key_exists('passwd', $data) || $data['passwd'] === "") {
        $error['passwd'] = "Vous n'avez pas remplie votre mot de passe.";
    }
    if (!array_key_exists('confirm_passwd', $data) || $data['confirm_passwd'] === "") {
        $error['confirm_passwd'] = "Vous n'avez pas confirmé votre mot de passe.";
    } else {
        if (strlen($data['passwd']) < 6) {
            $error['passwd_lenght'] = "Votre mot de passe doit contenir 6 caractères minimum.";
        } else if (preg_match('#^(?=.*[0-9])#', $data['passwd']) == 0) {
            $error['passwd_num'] = "Votre mot de passe doit contenir un chiffre minimum.";
        }
    }
    if ($data['passwd'] != $data['confirm_passwd']) {
        $error['passwd_diff'] = "Mot de passe erroné.";
    }
    if (Check_email_exist($data['mail'])) {
        $error['email_exist'] = "Cet email est déjà utilisé.";
    }
    if (check_name_exist($data['name'])) {
        $error['name_exist'] = "Ce nom est déjà utilisé !";
    }
    return ($error);
}

function check_name_exist($name)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT name FROM clients");
    $data = mysqli_fetch_assoc($request);
    foreach ($data as $tab) {
        if ($tab['name'] == $name)
            return true;
    }
    return false;
}

function Check_email_exist($__mail)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT mail FROM clients");
    $data = mysqli_fetch_assoc($request);
    foreach ($data as $tab) {
        foreach ($tab as $mail) {
            if ($__mail === $mail) {
                return (true);
            }
        }
    }
    return (false);
}

function Add_new_user($data)
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