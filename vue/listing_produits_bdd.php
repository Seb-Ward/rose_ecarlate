<?php
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion.php");
die();//Avoid the robot to charge the page if it ain't necessary
}elseif($_SESSION['user']->getAdmin()!=1){//Here we will recup the field user to check if he is an admin
    header("Location: ../index.php");
    die();
}
$user=$_SESSION['user'];
$page="listing_produits_bdd";
$connected=true;

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
    <?php include_once "../vue/navigation.php";   ?>  

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
                    <th>Publier page d'accueil</th>
                    <th>Publier boutique</th>
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
            <td><?=$produit->getProduit_publish_accueil()?></td>
            <td><?=$produit->getProduit_publish_boutique()?></td>
            <td><button><a href="../vue/form_modification_produit.php?produit_id=<?=$produit->getProduit_id()?>">Modifier</a></button></td><!--Button to modifie the product. It will take the product_id and take me to form_modification_produit.php -->
            <td><button><a href="../controleur/suppression_produit.php?produit_id=<?=$produit->getProduit_id()?>">Suprimer</a></button></td><!--Button that will erase the product from the data base the listing and the shop with a process in suppression_produit.php -->
        </tr>
        

        <?php }
         
        ?>
       
        </tbody>
    </table>
   
    <button><a href="../vue/form_ajout_produit.php">Ajouter un nouveau produit</a></button>
    </div><!--Here I have the possibility to add a new product to the data base, the listing product and the shop. By pressing on that switch it will take me to form_ajout_produit.php-->
    <br>
    <a href="../controleur/deconnexion.php"><button>Se déconnecter</button></a>

    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>