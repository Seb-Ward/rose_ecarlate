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
$page="accueil";
?>

<!DOCTYPE html>
<html lang="fr">
        <head>
            <title>Page d'accueil</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="La rose ecarlate est un magasin de ventes de fleurs en ligne.">
            <meta name="keywords" content="Ventes de fleurs">
            <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">
            <link rel="stylesheet" href="../assets/css/style.css"><!--Here I have my link to my css-->
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

<?php
                        if($connected==true){
                            if($user->getAdmin()==1){

                        
                    ?> 
                        <div class="dropdown col-md-3 text-end">
                        <a class='btn btn-primary dropdown-toggle' href="../vue/dashboard.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Tableau de board</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="../vue/dashboard.php">test</a></li>
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
        <main>
        <div class="container py-4"><!-- In my main I have articles from this weeks selection or our best sells, but this is not yet generated by PHP via my data base.-->
        <!--<div class="container">-->
            <div class="row row-cols-1 row-cols-md-3 mb-3 g-3 text-center">
        <?php  
            require_once "../model/produit.php";
        foreach(getProduitPublish_accueil() as $produit){
//Here I do a request to my data base without doing a prepare because it isn't gonna change it is solid.(She display all the questions given) 
        ?>    
            <div class="col ?>
            =$produit->getProduit_id()?>">
            <div class="card shadow-sm">
            <a href="article.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank">
                <img src="../controleur/export_image.php?image_id=<?=$produit->getImage_id()?>" alt="<?=$produit->getProduit_description()?>" width="100%" height="300">
                </a>
               <div class="card-body text-center">
               <a class="produit-name" href="article.php?produit_id=<?=$produit->getProduit_id()?>" target="_blank">
                <?=$produit->getProduit_nom()?></a>
                <p class="gy-2"><?=$produit->getProduit_prix()?>.00€</p>
                              
                </div>   
            </div>
            </div>
            
                <?php
        }?>
        </div>
        
        <!--</div>-->
        </div>
        </main>
        <?php include_once"../vue/footer.php";?>
    </body>
</html>