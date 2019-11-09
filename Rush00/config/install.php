<?php
require('db.php');
$sql = file_get_contents("struct.sql");
$request = explode(";", $sql);
foreach($request as $val)
{
    mysqli_query($db, $val);
}