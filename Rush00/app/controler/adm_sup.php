<?php
require('../model/admin.php');

if (isset($_POST['nom']))
{
    sup_cat($_POST['nom']);
}

if (isset($_POST['ref']))
{
    sup_user($_POST['ref']);
}

if (isset($_POST['mail']))
{
    sup_user($_POST['mail']);
}