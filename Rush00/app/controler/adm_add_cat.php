<?php
require('../model/admin.php');

if (isset($_POST['nom']))
{
    add_cat($_POST['nom']);
}