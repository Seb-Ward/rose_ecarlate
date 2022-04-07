<?php
require_once "../includes/connexion.php";
session_start();
if(!isset($_SESSION["user"])){//si le user session n'est pas existant
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin

$objet=new PDO('mysql:host=localhost;dbname=rose_ecarlate','root','');

$pdoStat = $objetPdo->prepare('UPDATE produit SET produit_nom=:produit_nom, produit_description=:produit_description, produit_prix=:produit_prix WHERE produit_id=:? LIMIT 1');
?>