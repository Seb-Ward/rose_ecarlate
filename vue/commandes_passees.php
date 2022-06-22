<?php
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion.php");
die();//avoid the robots charging the page unnecessarily
}elseif($_SESSION['user']->getAdmin()!=1){//Here we make sure we give acces to the admin only
    header("Location: ../index.php");
    die();
}
$user=$_SESSION['user'];
$page="commandes_passees";
$connected=true;

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Commandes passées</title>
    <meta charset="UTF-8">
    <meta name="description" content="description des commandes passées">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

</head>
<body>
<div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php include_once "../vue/navigation.php";   ?>
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
<div class="col-md-3 text-end"><button class='btn btn-outline-primary me-2'>Login</button><button class='btn btn-primary'>Sign-up</button></div>
  
    </header>
    <main class="main"> 
    <div id="listing">
       <h3>Listing</h3>
        <table>
            <thead>
                <tr>
                    <th>ref commande</th>
                    <th>Client</th>
                    <th>Montant total</th>
                    <th>Date commande</th>
                    <th>Date envoi</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
            <?php  
            require_once "../model/commande.php";
        foreach(getCommande()as $commande){
//je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <tr>
            <td><?=$commande->getCommande_ref()?></td>
            <td><?=($commande->getUser()->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$commande->getUser()->getMessage_nom_expediteur()?></td>
            <td><?=$commande->getMontant_total()?></td>
            <td><?=$commande->getCommande_date()?></td>
            <td><?=$commande->getDate_envoi()?></td>
            <td><button><a href="../vue/modification_commande.php?message_id=<?=$commande->getCommande_ref()?>">Modifier</a></button></td>
        </tr>
        <?php }
        
        ?>
       
        </tbody>
    </table>
        </div>
        <br>        
        <a href="../controleur/deconnexion.php"><button>Se déconnecter</button></a>

    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>
