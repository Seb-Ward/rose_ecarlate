<?php
if(isset($_POST['email'])&&(isset($_POST['password']) && !empty($_POST['email'])&&!empty($_POST['password']))){//Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.
$email=htmlspecialchars($_POST['email']);//I configure my $email as $_post['email']
$password=htmlspecialchars($_POST['password']);//I configure my $password as $_post['password']

include_once ("../model/user.php");
$user= getUser($email);
if($user==null){//If the user email doesn't exist or is not reconized, redirection to connexion_admin.php
    header("Location:../vue/connexion.php");
    die();  
}
if(password_verify($password,$user->password_user)){//If the Password_user matches the password and the user via the function password_verify then he is ok and his session_starts
    session_start();
   
    unset($user->password_user);
    $_SESSION['user']=$user;
    header("Location: ../vue/dashboard.php");
    die();
}
    header("Location: ../vue/connexion.php");
    die();

}else{
    header("Location: ../vue/connexion.php");
    die();
}
