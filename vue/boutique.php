<?php
session_start();//Here my session starts
if(isset($_SESSION['user'])){


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
                            <a href="../vue/equipe.php"> L'équipe</a>
                        </li>
                        <li class="nav_item">
                        <a href="../index.php">Acceuil</a>
                        </li>
                        <li class="nav_item">
                            <a href="../vue/contact.php">Nous contacter</a>
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
        <div class="conteneur">   
        <?php  
            require "../model/produit.php";
        foreach(getProduitPublish_boutique() as $produit){
//Here I am calling my function "getProduit" je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <div class="item_one">
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