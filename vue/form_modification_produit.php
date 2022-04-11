<?php
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion_admin.php");
die();//Her I avoid the robots to load my page unnecessarily
}elseif($_SESSION['user']->getAdmin()!=1){//Here we check to see if our user is an admin.
    header("Location: ../index.php");
    die();
}
if(!isset($_GET['produit_id'])){//If the product_id doesn't exist I relocate towards my listing
    header("Location: ../vue/listing_produits_bdd.php");//Method GET because we don't come from a form but from a button
    die();
}
require_once ("../model/produit.php");
$produit_id=intval($_GET['produit_id']);
    if($produit_id==0){
    header("Location: ../vue/listing_produits_bdd.php");//Method GET because we don't come from a form but from a button
    die();
}
$produit=getProduitById($produit_id);//Here I use my function getProduitById 
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>modification produit bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleurs page de modification d'un produit.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Formulaire de modification d'un produit</h1>
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
                        <a href="../vue/dashboard.php">Retourner à mon tableau de board</a>
                        </li>
                        <li class="nav_item">
                        <a href="../controleur/deconnexion.php">Se déconnecter</a>   
                        </li>
                    </ul>
        </nav>
    </header>
    <main class="main"> 
    <form action="../controleur/modification_produit_bdd.php" method="POST" enctype="multipart/form-data"><!--Here I use the $_POST method and the enctype="multipart/form-data"-->
    <fieldset>
        <legend>Modification d'un produit dans la boutique</legend>
        <br>
        <br>
        <input type="hidden" value="<?= $produit->getProduit_id(); ?>" name="produit_id"><!--extraction of the product_id using my function getProduit_id and I hidde it-->
        <input type="hidden" value="<?= $produit->getImage_id(); ?>" name="image_id"><!--extraction of the image_id using my function getImage_id and I hidde it-->

        <div>
            <label for="produit_nom">Nom du produit</label>
            <input type="produit_nom" name="produit_nom" id="produit_nom"  value="<?= $produit->getProduit_nom(); ?>"required><!--Here I extract the product_name,display it, ready for modification. I do it with my function getProduit_nom-->
        </div>
        <div>
            <label for="produit_description"></label>
            <textarea name="produit_description" id="produit_description" cols="40" rows="20" 
            placeholder="description du produit"><?= $produit->getProduit_description(); ?></textarea>
            <!--Here I extract the product_description, display it, ready for modification. I do it with my function getProduit_description-->
            <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_nom()?> - <?=$produit->getProduit_description()?> - <?=$produit->getProduit_prix()?> €" width="250" height="250"> 
            <br>   
            Insertion image(s)<input type="file" name="image" id="image">
        </div>
        <div>
            <label for="produit_prix">Prix ttc</label>
            <input type="produit_prix" name="produit_prix" id="produit_prix"  value="<?= $produit->getProduit_prix();?>"required><!--Here I extract the product_price,display it, ready for modification. I do it with my function getProduit_prix-->
           
        </div>
            <input type="submit" valeur= "Enregistrer les modifications">
    </fieldset>
    </form>
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>
