<?php
include ('../model/user.php');

if(isset($_POST)&&(!empty($_POST))) {//If $_POST exist and is empty
$nom= htmlspecialchars ($_POST['nom']) ?? "";//fill in the firstname
$prenom= htmlspecialchars($_POST['prenom']) ?? "";//fill in the lastname
$email= htmlspecialchars($_POST['email']) ?? "";//fill in the email
$password= htmlspecialchars($_POST['password']) ?? "";//fill in the password
if(empty($email)){//If the email is empty then redirect back to form_inscription_client.php
    header("Location: ../vue/form_inscription_client.php");
         die();
    }
$hash=password_hash($password, PASSWORD_DEFAULT);//I establish that the variable hash will use a function password_hash for the password and that by default

$create=insert_user($nom,$prenom,$email,$hash);//I establish that my variable $create wil use the function insert_user

if($create==true){//If the $create has been filled in correctly with the lastname,firstname,email and password hash then we redirect this user to the idmin logg in page to confirm who he is
header ("Location: ../vue/connexion.php");
die();
}else{//Otherwise I send his back to the inscription form
    header("Location: ../vue/form_inscription_client.php");
    die();
}
}
header("Location: ../vue/form_inscription_client.php");//If he end up in none of the above case scénario I redirect him to the incription form.
die();
