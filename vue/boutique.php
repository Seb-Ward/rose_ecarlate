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
$page="boutique";

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
        <?php include_once "../vue/navigation.php";   ?>  

    </header>
    <main class="main"> 
        <div class="container">  
            <?php  
                require "../model/produit.php";
                foreach(getProduitPublish_boutique() as $produit){
                //Here I am calling my function "getProduit" je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
            ?>
            <div class="item">
                <a href="../vue/article.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank" >
                <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_nom()?> - <?=$produit->getProduit_description()?> - <?=$produit->getProduit_prix()?> €" width="400" height="400"> </a>
                <div class="item_two">
                <h2>"<?=$produit->getProduit_nom()?>"</h2>
                <br>
                <br> 
                <p><?=$produit->getProduit_description()?></p>
                <br>
                <br>
                <h2><?=$produit->getProduit_prix()?> €</h2>
                </div>  
                <!--Here I get my product specifics and my image from my data base through my function "getImage_id" and "getProduit", it's under the format of an object-->
                <?php }
        
                ?>
            </div>
        </div>
    </main>
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>