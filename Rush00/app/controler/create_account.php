<?php
session_start();

require('../model/create_account_class.php');
$error = [];

if ($_POST['submit'] === "OK") {
    $error = Check_account_data($_POST);
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['input'] = $_POST;
        header('Location: ../../index.php?view=sign_up');
    } else {
        $_SESSION['success'] = '1';
        Add_new_user($_POST);
        header('Location: ../../index.php?view=sign_up');
    }
}
