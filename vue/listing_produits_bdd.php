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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="magasin de vente de fleur page liste des produits en bdd.">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

</head>
<body>
<div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="accueil.php"><img width="230" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

<li>
    <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="../vue/accueil.php">Accueil</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="../vue/boutique.php">Boutique</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="../vue/equipe.php"> L'équipe</a>
</li>
<li>
    <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="../vue/contact.php">Nous contacter</a>
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

        <main>
        <h3>Listing</h3>
        <div class="table-responsive">
            <table class="table table-striped">
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
            <td><?=substr($produit->getProduit_description(),0,200)?></td><!--extraction of my product_description using my function-->
            <td><?=$produit->getProduit_prix()?></td><!--extraction of my product_price using my function-->
            <td><img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" class="rounded mx-auto d-block"  alt="" width="100" height="100"></td><!--extraction of my image & image_id using my function-->
            <td><?=$produit->getProduit_publish_accueil()?></td>
            <td><?=$produit->getProduit_publish_boutique()?></td>
            <td><a class="btn btn-primary" href="../vue/form_modification_produit.php?produit_id=<?=$produit->getProduit_id()?>">Modifier</a></button></td><!--Button to modifie the product. It will take the product_id and take me to form_modification_produit.php -->
            <td><a class="btn btn-danger"  href="../controleur/suppression_produit.php?produit_id=<?=$produit->getProduit_id()?>">Suprimer</a></td><!--Button that will erase the product from the data base the listing and the shop with a process in suppression_produit.php -->
        </tr>
        <?php }
         
        ?>
       
        </tbody>
        </table>
        <a class='btn btn-warning'href="../vue/form_ajout_produit.php">Ajouter un nouveau produit</a>

        </div>

        </main>
</div>
<?php include_once"../vue/footer.php";?>
</body>
</html>