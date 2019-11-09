<?php
$db = mysqli_connect("localhost","root","root","shoosing") or die("Error " . mysqli_error($db));

if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}