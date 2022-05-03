<?php
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
    <nav class="header_nav">
    <label for="btn" class="icon">
      <svg viewbox="0 0 100 80" width="40" height="40">
          <rect width="100" height="15"></rect>
          <rect y="35" width="100" height="15"></rect>
          <rect y="70" width="100" height="15"></rect>
      </svg>
  </label>
  <input type="checkbox" id="btn">
  <ul class="nav_menu">
      <li class="nav_item">
      <a href="../index.php">Acceuil</a>
      </li>
      <li class="nav_item">
      <a href="../vue/boutique.php">Boutique</a>
      </li>
      <li class="nav_item">
          <a href="../vue/equipe.php"> L'équipe</a>
      </li>
      <li class="nav_item">
          <a href="../vue/form_inscription_client.php">S'inscrire</a>
      </li>
      <li class="nav_item">
          <a href="../vue/connexion_admin.php">Se connecter</a> 
      </li>
  </ul> 
</nav>   
    </header>
    <main class="main">
    <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_description()?>" width="400" height="400">   
    <h3><?=$produit->getProduit_nom()?></h3>
   <u> <?=$produit->getProduit_description()?></u>
   
  <h4>Tarif:<?=$produit->getProduit_prix()?>€</h4>
  
  <button><a href="../vue/contact.php">Acheter</a></button>
    </main>
  <footer class="footer">
    <p>Copyrights 2022</p>
</footer>
</body>
</html>