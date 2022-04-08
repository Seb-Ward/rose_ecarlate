<?php

if(isset($_GET['image_id'])){
    require_once "../includes/connexion.php";
    $sth=$dbh->prepare("SELECT * FROM `image` WHERE image_id=? LIMIT 1");
    $sth->execute(array($_GET['image_id']));
    $image=$sth->fetch();
    if($image!=null){
        echo $image['image_bin'];
    }
}