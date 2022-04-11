<?php
session_start();
if(!isset($_SESSION["user"])){//Here we check if the user session is not already existing
header("Location: ../vue/connexion_admin.php");
die();//Avoid the robots to load the page unnecessarily
}
?>
<!DOCTYPE html> 
<html lang="fr">
<head>
    <title>Produits en bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page liste des produits en bdd.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <br>
    <h1>Liste des produits dans la base de données</h1>
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
    <div id="listing">
       <h3>Listing</h3>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom du produit</th>
                    <th>description</th>
                    <th>prix</th>
                    <th>photos</th>
                    <th>modifier</th>
                    <th>Suprimer</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php  
            require_once "../model/produit.php";
        foreach(getProduit() as $produit){
//Here I do a request to my data base without doing a prepare because it isn't gonna change it is solid.(She display all the questions given)
        ?>
        <tr>
            <td><?=$produit->getProduit_id()?></td><!--extraction of my product_id using my function-->
            <td><?=$produit->getProduit_nom()?></td><!--extraction of my product_name using my function-->
            <td><?=$produit->getProduit_description()?></td><!--extraction of my product_description using my function-->
            <td><?=$produit->getProduit_prix()?></td><!--extraction of my product_price using my function-->
            <td><img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="" width="100" height="100"></td><!--extraction of my image & image_id using my function-->
            <td><button><a href="../vue/form_modification_produit.php?produit_id=<?=$produit->getProduit_id()?>">Modifier</a></button></td><!--Button to modifie the product. It will take the product_id and take me to form_modification_produit.php -->
            <td><button><a href="../controleur/suppression_produit.php?produit_id=<?=$produit->getProduit_id()?>">Suprimer</a></button></td><!--Button that will erase the product from the data base the listing and the shop with a process in suppression_produit.php -->
        </tr>
        

        <?php }
         
        ?>
       
        </tbody>
    </table>
   
    <button><a href="../vue/form_ajout_produit.php">Ajouter un nouveau produit</a></button>
    </div><!--Here I have the possibility to add a new product to the data base, the listing product and the shop. By pressing on that switch it will take me to form_ajout_produit.php-->
    
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>