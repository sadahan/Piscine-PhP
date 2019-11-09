<?php
session_start();

function Check_connexion_data($data)
{
    if (!array_key_exists('mail', $data) || $data['mail'] === "" || !filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
        $error['mail'] = "Vous n'avez pas renseigné un email valide.";
    }
    if (!array_key_exists('passwd', $data) || $data['passwd'] === "") {
        $error['passwd'] = "Vous n'avez pas remplie votre mot de passe.";
    }
    return ($error);
}

function Try_to_connect($mail, $passwd)
{
    require('../../config/db.php');
    $passwd_hash = hash('whirlpool', $passwd);

    $request = mysqli_query($db, "SELECT * FROM clients WHERE mail = '$mail' AND passwd = '$passwd_hash'");
    if (mysqli_num_rows($request) == 1) {
        return (1);
    } else {
        return (0);
    }
}

function Create_token_connect()
{
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    return ($token);
}

function Insert_token_connect($data, $token)
{
    require('../../config/db.php');
    $mail = $data['mail'];
    mysqli_query($db, "UPDATE clients SET token_connect = '$token' WHERE mail = '$mail'");
}

function Check_mail_exist($mail)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT mail FROM users");
    $data = mysqli_fetch_assoc($request);
    foreach ($data as $tab) {
        foreach ($tab as $mail_db) {
            if ($mail === $mail_db) {
                return (true);
            }
        }
    }
    return (false);
}

function Get_clients_token($id)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT token_connect FROM clients WHERE id = '$id'");
    $data = mysqli_fetch_assoc($request);
    return ($data);
}

function Permission_connect()
{
    if ($_SESSION['token_connect'] && $_SESSION['id']) {
        $token = Get_client_token($_SESSION['id']);
        if ($token[0]['token_connect'] === $_SESSION['token_connect']) {
            return (1);
        } else
            return (0);
    }
}

function Get_client_id($token)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT id FROM clients WHERE token_connect = '$token'");
    $data = mysqli_fetch_assoc($request);
    return ($data);
}

function Get_admin_access($mail)
{
    require('../../config/db.php');
    $request = mysqli_query($db, "SELECT admin FROM clients WHERE mail = '$mail'");
    $data = mysqli_fetch_assoc($request);
    return ($data);
}