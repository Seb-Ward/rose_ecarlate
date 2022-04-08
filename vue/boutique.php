<?php
include_once("../entity/Produit.php");
session_start();
if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La boutique</title>
    <meta charset="UTF-8">
    <meta name="description" content="vente de fleurs en ligne. Articles en boutique">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Produits en boutique</h1>
            <nav class="header_nav">
            <a href="../vue/equipe.php">L'équipe</a>
            <a href="../index.php">Acceuil</a>
            <a href="../vue/contact.php">Nous contacter</a>
            <a href="../vue/form_inscription_client.php">S'inscrire</a>
            <a href="../vue/connexion_admin.php">Se connecter</a>   
            </nav>
    </header>
    <main class="main"> 
        <div id="conteneur">   
            
        <?php  
            require_once "../includes/connexion.php";
        foreach($dbh->query("SELECT * 
        FROM `produit`")->fetchAll(PDO::FETCH_CLASS,"Produit") as $produit){
//je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <div class="element">
            <a href="../vue/listing_produits_bdd.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank" >
            <h3><?=$produit->getProduit_nom()?></h3> 
            
            <h4><?=$produit->getProduit_prix()?> €</h4>  
        <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_nom()?> - <?=$produit->getProduit_description()?> - <?=$produit->getProduit_prix()?> €" width="250" height="250">
        </a>
        <p><?=$produit->getProduit_description()?></p>
        </div> 
        <?php }
        
        ?>
        </div>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>