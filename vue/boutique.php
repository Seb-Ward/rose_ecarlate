<?php
require_once "../entity/User.php";
session_start();
if(isset($_SESSION['user'])){
   

    $user=$_SESSION['user'];
    $connected=true;
}else{
    $user=new User();
    $connected=false;

}
$page="boutique";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La boutique</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="vente de fleurs en ligne. Articles en boutique">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
   

</head>
<body>
<div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="230" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
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
<a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>
  

    </header>
    <main> 
    <div class="container py-4">  
    <h5 class="card-tittle text-center text-secondary">Les indémodables</h5>  
    <div class="row row-cols-1 row-cols-md-3 mb-3 g-3 text-center">    
    
        <?php  
                require "../model/produit.php";
                foreach(getProduitPublish_boutique() as $produit){
                //Here I am calling my function "getProduit" je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
                ?>
                <div class="col ?>
                =$produit->getProduit_id()?>">
             <div class="card shadow-sm">
            <a href="article.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank">
                <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" class="rounded mx-auto d-block" alt="<?=$produit->getProduit_description()?>" width="100%" height="300">
                </a>
               <div class="card-body text-center">
               <a class="produit-name" href="article.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank">
                <?=$produit->getProduit_nom()?></a>
                <p class="gy-2"><?=$produit->getProduit_prix()?>.00€</p>
                       
                <!--Here I get my product specifics and my image from my data base through my function "getImage_id" and "getProduit", it's under the format of an object-->
                </div>   
            </div>
            </div>
                <?php 
                
            }?>
            </div>
        </div>
    </main>
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>