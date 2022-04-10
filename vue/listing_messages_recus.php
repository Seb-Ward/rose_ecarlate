<?php
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin
}elseif($_SESSION['user']->getAdmin()!=1){//là on veut récupérer le champ admin pour voir si il est
    header("Location: ../index.php");
    die();
}
?><!DOCTYPE html>
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
            <td><?=$message->getMessage_genre_expediteur()==0?"Mme ":"Mr ".$message->getMessage_nom_expediteur()?></td>
            <td><?=$message->getMessage_email_expediteur()?></td>
            <td><?=$message->getMessage_telephone_expediteur()?></td>
            <td><?=$message->getMessage_text_expediteur()?></td>
            <td><button><a href="mailto:<?=$message->getMessage_email_expediteur()?>?subject=Contact Rose-écarlate&body=Bonjour <?=$message->getMessage_genre_expediteur()==0?"Mme ":"Mr ".$message->getMessage_nom_expediteur()?>">Répondre à l'expéditeur</a></button></td>
            <td><button><a href="../controleur/suppression_message.php?message_id=<?=$message->getMessage_id()?>">Suprimer</a></button></td>
        </tr>
        <?php }
        
        ?>
       
        </tbody>
    </table>
        </div>
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>
