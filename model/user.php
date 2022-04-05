<?php
include_once "../entity/User.php";
function insert_user($nom,$prenom,$email,$password){
require_once ("../includes/connexion.php");
//var_dump($dbh);
$sth = $dbh->prepare("INSERT INTO user (nom,prenom,email,password_user)
VALUES(:nom,:prenom,:email,:password_user)");
$param_user=array('nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'password_user'=>$password);

$rs = $sth->execute($param_user);
return $rs;

}
function getUser($email){
    require_once ("../includes/connexion.php");
    $sth = $dbh->prepare("SELECT * FROM user WHERE email=:email");
    $param_email=array('email'=>$email);

    $rs = $sth->execute($param_email);
    if($rs==true){
        
        return $sth->fetchObject("User");//ca va le mapper dans un objet (USER)

    }
    return null;

}

