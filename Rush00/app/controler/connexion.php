<?php
session_start();
require ('../model/connexion_class.php');

if  ($_POST['connect'] === "OK")
{
    $error = Check_connexion_data($_POST);
    if ((Try_to_connect($_POST['mail'], $_POST['passwd']) == 0) && empty($error))
    {
        $error['wrong_id'] = "Votre adresse mail ou votre mot de passe est incorrecte.";
    }
    if (!empty($error))
    {
        $_SESSION['error'] = $error;
        $_SESSION['input'] = $_POST;
        header('Location: ../../index.php?view=sign_in');
    }
    else
    {
        $_SESSION['token_connect'] = Create_token_connect();
        Insert_token_connect($_POST, $_SESSION['token_connect']);
        $data = Get_client_id($_SESSION['token_connect']);
        $admin = Get_admin_access($_POST['mail']);
        $_SESSION['id'] = $data['id'];
        if ($admin['admin'] == 1)
        {
            $_SESSION['admin'] = 1;
            header("Location: ../../index.php?");
        }
        else
        {
            header("Location: ../../index.php?");
        }
    }
}