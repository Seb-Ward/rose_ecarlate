<?php
require_once "../entity/User.php";
session_start();

if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    echo $user->getNom(); 
    $connected=true;
}else{
    $user=new User();
    $connected=false;
}
if(!isset($_GET['produit_id'])){
    header("Location: accueil.php");
    die();
}
$produit_id=intval($_GET['produit_id']);
if($produit_id==0){
    header("Location: accueil.php");
    die();
}
require_once "../model/produit.php";
$produit=getProduitById($produit_id);
$page="article";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=$produit->getProduit_nom()?></title>
    <meta charset="UTF-8">
    <meta name="description" content="la rose écarlate, <?=$produit->getProduit_nom()?>">   
    <link rel="stylesheet" href="../assets/css/style.css">  
</head>
<body>
    <header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <?php include_once "../vue/navigation.php";   ?>  
  
    </header>
    <main class="main">
    <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_description()?>" width="400" height="400">   
    <h3><?=$produit->getProduit_nom()?></h3>
   <u> <?=$produit->getProduit_description()?></u>
   
  <h4>Tarif:<?=$produit->getProduit_prix()?>€</h4>
  
  <button><a href="../vue/contact.php">Acheter</a></button>
  <br>
    </main>
  <footer class="footer">
    <p>Copyrights 2022</p>
</footer>
</body>
</html>