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
$page="article";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=$produit->getProduit_nom()?></title>
    <meta charset="UTF-8">
    <meta name="description" content="la rose écarlate, <?=$produit->getProduit_nom()?>">  
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">  
</head>
    <body>
        <div class="container">
        <header class="py-4 d-flex flex-wrap align-items-center justify-content-center  justify-content-md-between md-4 border-bottom">
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

                    <?php
                        if($connected==true){
                            if($user->getAdmin()==1){

                        
                    ?> 
                        <div class="dropdown col-md-3 text-end">
                            <a class='btn btn-primary dropdown-toggle' href="../vue/dashboard.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Tableau de board</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="../vue/dashboard.php">dashboard</a></li>
                                <li><a class="dropdown-item" href="../vue/listing_messages_recus.php">Consulter les messages</a></li>
                                <li><a class="dropdown-item" href="../vue/listing_produits_bdd.php">Consulter les produits</a></li>
                            </ul>
                            </div>
                        <?php }
                        ?>
                                <a href="../controleur/deconnexion.php"><button class='btn btn-warning'>Logout</button></a>
                        <?php
                        }else{

                        ?>
                                <a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>

                        <?php
                        }
                        ?>
                    


            </header>
                        <main class="main">
                            <div class="row">
                            <div class="col-lg-7 pt-4 order-2 order-lg-1">
                            <div class="row">
                                <div class="d-none d-md-block col-md-2 pe-0">
                                    <div class="owl-thumbs"data-slider-id="1">
                                    <img class="img-fluid rounded mx-auto d-block mb-2" src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>"alt="<?=$produit->getProduit_description()?>">
                                            <img class="img-fluid rounded mx-auto d-block mb-2" src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>"alt="<?=$produit->getProduit_description()?>">
                                    </div>
                                </div> 
                                <div class="col-12 col-md-10 detail-carousel">
                                <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" class="rounded mx-auto d-block" alt="<?=$produit->getProduit_description()?>" width="400" height="400">   
                                </div>
                                
                                
                                                            </div>
                    </div> 
                    <div class="col-lg-5 col-xl-4 pt-4 order-1 order-lg-2 ps-lg-4"> 
                                    <div class="sticky-top" style="top:100px"> 
                                        <h1 class="h2 mb-4"><?=$produit->getProduit_nom()?></h1>
                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-4 ">
                                                <form>
                                                    <div class="form-group row mb-4">  
                                                        <label class="col-sm-2 col-form-label " for="quantity">Quantité:

                                                        </label>
                                                            <div class="col-sm-3">
                                                                <input type="number" class="form-control" name="quantity" id="quantity">
                                                            </div>  
                                                                <small id="emailHelp" class="form-text text-muted">Frais de livraison   fixes : 9,95 €

                                                                </small>
                                                        </div>
               

                                                            <a href="../vue/contact.php"><button class="btn btn-primary me-5">Commander</button></a><span class="h4 mt-2"><?=$produit->getProduit_prix()?>€</span></form> 
                                                        </div>
                                                            <p class="mb-4 text-muted"><?=$produit->getProduit_description()?></p>

                                                            </div>
                                                            </div>
                </div>
            </main>
    
            <?php include_once"../vue/footer.php";?>

    </body>
</html>