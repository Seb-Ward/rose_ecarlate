<?php
include ("../entity/Image.php");

function updateImage($param_image){
require ("../includes/connexion.php");
$sql_image='UPDATE `image` SET image_nom=:image_nom, image_taille=:image_taille, image_type=:image_type, image_bin=:image_bin WHERE image_id=:image_id LIMIT 1' ; 
$sth = $dbh->prepare($sql_image);
$rs = $sth->execute($param_image);
}

function insertImage($param_image){
    require ("../includes/connexion.php");
    $sql_image='INSERT INTO `image`(`image_nom`,`image_taille`, `image_type`, `image_bin`)
    VALUES(:image_nom, :image_taille, :image_type, :image_bin)';
    
    $sth = $dbh->prepare($sql_image);
    $rs = $sth->execute($param_image);
   // je vérifie si ma requete a fonctionné
       return $dbh->lastInsertId(); //récupère le dernier id que j'ai inséré dans ma bdd.

    
    }


function getImage($id){
    require ("../includes/connexion.php");
    $sth=$dbh->prepare("SELECT * FROM `image` WHERE image_id=? LIMIT 1");
    $sth->execute(array($id));
    return $sth->fetchObject("Image");
}

