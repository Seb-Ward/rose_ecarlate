<?php
include ("../entity/Image.php");

function updateImage($param_image){//This is my function where I update my image in my data base
require ("../includes/connexion.php");
$sql_image='UPDATE `image` SET image_nom=:image_nom, image_taille=:image_taille, image_type=:image_type, image_bin=:image_bin WHERE image_id=:image_id LIMIT 1' ; 
$sth = $dbh->prepare($sql_image);
$rs = $sth->execute($param_image);
}

function insertImage($param_image){//This is my function where I insert my image in my data base
    require ("../includes/connexion.php");
    $sql_image='INSERT INTO `image`(`image_nom`,`image_taille`, `image_type`, `image_bin`)
    VALUES(:image_nom, :image_taille, :image_type, :image_bin)';
    
    $sth = $dbh->prepare($sql_image);
    $rs = $sth->execute($param_image);
   //I check that my request has gonne through
       return $dbh->lastInsertId(); //Here I will return my last id inserted

    
    }


function getImage($id){//This is my function where I select my image in my data base
    require ("../includes/connexion.php");
    $sth=$dbh->prepare("SELECT * FROM `image` WHERE image_id=? LIMIT 1");
    $sth->execute(array($id));
    return $sth->fetchObject("Image");
}

