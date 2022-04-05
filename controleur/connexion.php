<?php

if(isset($_POST['email'])&&(isset($_POST['password']) && !empty($_POST['email'])&&!empty($_POST['password']))){
$email=$_POST['email'];
$password=$_POST['password'];

include_once ("../model/user.php");
$user= getUser($email);
if($user==null){
    header("Location:../vue/connexion_admin.php");
    die();  
}
if(password_verify($password,$user['password_user'])){
    session_start();
   
    unset($user['password_user']);
    $_SESSION['user']=$user;
    header("Location: ../vue/dashboard.php");
    die();
}
    header("Location: ../vue/connexion_admin.php");
    die();

}else{
    header("Location: ../vue/connexion_admin.php");
    die();
}
