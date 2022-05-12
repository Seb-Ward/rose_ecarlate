<?php
session_start();

if(!isset($_SESSION["user"])){//I check if the user session doesn't allready exist
header("Location: ../vue/connexion.php");
die();//Avoid the robot to load the page unnecessarely
}

session_destroy();//I stop the session
header("Location: ../index.php");
?>