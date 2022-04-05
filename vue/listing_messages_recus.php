<?php
session_start();
var_dump($_SESSION);
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <title>Messages ruçus</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page contact.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Liste des messages reçus.</h1>
        <nav class="header_nav">
            <a href="../vue/equipe.php"> L'équipe</a></li>
            <a href="../index.html"> Page d'acceuil</a></li>
            <a href="../vue/boutique.php">La boutique</a></li>
            <a href="../vue/form_inscription_client.php">S'inscrire</a></li>
            <a href="../controleur/deconnexion.php">Se déconnecter</a></li>    
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
                </tr>
            </thead>
            <tbody>
            <?php  
            require_once "../includes/connexion.php";
        foreach($dbh->query("SELECT * 
        FROM `message`") as $message){
//je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <tr>
            <td><?=($message["message_genre_expediteur"]==0?"Mme ":"Mr ").$message["message_nom_expediteur"]?></td>
            <td><?=$message["message_email_expediteur"]?></td>
            <td><?=$message["message_telephone_expediteur"]?></td>
            <td><?=$message["message_text_expediteur"]?></td>
            <td><button><a href="mailto:<?=$message["message_email_expediteur"]?>?subject=Contact Rose-écarlate&body=Bonjour <?=($message["message_genre_expediteur"]==0?"Mme ":"Mr ").$message["message_nom_expediteur"]?>">Répondre à l'expéditeur</a></button></td>
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
