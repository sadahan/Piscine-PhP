<?php
require('../model/admin.php');

if (isset($_POST['ref']))
{
	mod_item($_POST);
}