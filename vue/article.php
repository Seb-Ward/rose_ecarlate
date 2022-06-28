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
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center    justify-content-md-between md-4 border-bottom">
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
                        <div class="col-md-3 text-end"><button class='btn btn-outline-primary me-2'>Login</button><button class='btn btn-primary'>Sign-up</button>
                        </div>
  
                    </header>
                        <main class="main">
                            <div class="row">
                                <div class="col-lg-6 col-xl-7 pt-4 order-2 order-lg-1">
                                    <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" class="rounded mx-auto d-block" alt="<?=$produit->getProduit_description()?>" width="400" height="400">  
                                </div>
                                <div class="col-lg-6 col-xl-5 pt-4 order-1 order-lg-2 ps-lg-5"> 
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
            </main>
    
            <?php include_once"../vue/footer.php";?>

    </body>
</html>