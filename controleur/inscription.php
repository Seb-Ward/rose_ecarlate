<?php

include ('../model/user.php');

if(isset($_POST)&&(!empty($_POST))) {
$nom= $_POST['nom'] ?? "";
$prenom= $_POST['prenom'] ?? "";
$email= $_POST['email'] ?? "";
$password= $_POST['password'] ?? "";
if(empty($email)){
    header("Location: ../vue/form_inscription_client.php");
         die();

    }
$hash=password_hash($password, PASSWORD_DEFAULT);
//var_dump($hash);
$create=insert_user($nom,$prenom,$email,$hash);

if($create==true){
header ("Location: ../vue/connexion_admin.php");
die();
}else{
    header("Location: ../vue/form_inscription_client.php");
    die();
}



}
header("Location: ../vue/form_inscription_client.php");
die();
