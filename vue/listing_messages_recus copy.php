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
$page="listing_message_recus";
$connected=true;

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Messages reçus</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page contact.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Liste des messages reçus.</h1>
        <?php include_once "../vue/navigation.php";   ?>  

    </header>
    <main class="main"> 
    <div id="listing">
       <h3>Listing</h3>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Message</th>
                    <th>Réponse</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php  
            require_once "../model/message.php";
        foreach(getMessage()as $message){
//je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <tr>
            <td><?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?></td>
            <td><?=$message->getMessage_email_expediteur()?></td>
            <td><?=$message->getMessage_telephone_expediteur()?></td>
            <td><?=$message->getMessage_text_expediteur()?></td>
            <td><button><a href="mailto:<?=$message->getMessage_email_expediteur()?>?subject=Contact Rose-écarlate&body=Bonjour <?=($message->getMessage_genre_expediteur()==0?"Mme ":"Mr ").$message->getMessage_nom_expediteur()?>">Répondre à l'expéditeur</a></button></td>
            <td><button><a href="../controleur/suppression_message.php?message_id=<?=$message->getMessage_id()?>">Suprimer</a></button></td>
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
