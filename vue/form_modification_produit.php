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
$user=$_SESSION['user'];
$page="form_modification_produit";
$connected=true;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>modification produit bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleurs page de modification d'un produit.">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

</head>
<body>
<div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<li>
    <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="accueil.php">Accueil</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="boutique.php">Boutique</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="equipe.php"> L'équipe</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="contact.php">Nous contacter</a>
</li>
</ul>
<div class="dropdown col-md-3 text-end">
                        <a class='btn btn-primary dropdown-toggle' href="../vue/dashboard.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Tableau de board</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="../vue/dashboard.php">test</a></li>
                    </ul>
                    </div>
                        <a href="../controleur/deconnexion.php"><button class='btn btn-warning'>Logout</button></a>
  
    </header>
    <main class="main"> 
    <form action="../controleur/modification_produit_bdd.php" method="POST" enctype="multipart/form-data"><!--Here I use the $_POST method and the enctype="multipart/form-data"-->
    <fieldset>
        <legend>Modification d'un produit dans la boutique</legend>
        <br>
        <br>
        <input type="hidden" value="<?= $produit->getProduit_id(); ?>" name="produit_id" id="produit_id"><!--extraction of the product_id using my function getProduit_id and I hidde it-->
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
        <br>
        <div>
    <input type="checkbox" id="produit_publish_accueil" name="produit_publish_accueil"<?=($produit->getProduit_publish_accueil()==1?"checked":"")?> >
    <label for="affichage accueil">Affichager dans la page d'accueil</label>
    </div>    
    <div>
    <input type="checkbox" id="produit_publish_boutique" name="produit_publish_boutique"<?=($produit->getProduit_publish_boutique()==1?"checked":"")?>>
    <label for="affichage boutique">Affichager dans la page boutique</label>
    </div>  
    <br>          
            <input type="submit" valeur= "Enregistrer les modifications">

    </fieldset>
    </form>
    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>
