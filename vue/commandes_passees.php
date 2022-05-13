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
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Listes des commandes passées</h1>
        <?php include_once "../vue/navigation.php";   ?>  

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
