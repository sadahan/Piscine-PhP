<?php
require('../model/admin.php');

if (isset($_POST))
{
    echo "OK";
    $dossier = '../../public/img/';
    $fichier = basename($_FILES['img_upload']['name']);
    $taille_maxi = 2000000;
    $taille = filesize($_FILES['img_upload']['tmp_name']);
    $extensions = array('.png', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['img_upload']['name'], '.');
    // //Début des vérifications de sécurité...
    // if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    // {
    //     $error['extension'] = 'Vous devez uploader un fichier de type png, jpg, jpeg.';
    // }
    // if ($taille > $taille_maxi) {
    //     $error['size'] = 'Le fichier est trop gros...';
    // }
    // if (!isset($error)) //S'il n'y a pas d'erreur, on upload
    // {
    //     //  On formate le nom du fichier ici...
    //     $fichier = strtr(
    //         $fichier,
    //         'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    //         'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
    //     );
    //     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    //     if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    //     {
    //         $_POST['src_img'] = "public/img/" . $fichier;
    //         add_item($_POST);
    //     }
    // }
}

