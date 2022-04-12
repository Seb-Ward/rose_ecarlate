<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Messages envoyés via contact</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page retour messages contacts.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Confirmation de l'envoi d'un message</h1>
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
                            <a href="../vue/equipe.php"> L'équipe</a>
                        </li>
                        <li class="nav_item">
                        <a href="../index.php">Acceuil</a>
                        </li>
                        <li class="nav_item">
                        <a href="../vue/boutique.php">Boutique</a>
                        </li>
                        <li class="nav_item">
                            <a href="../vue/form_inscription_client.php">S'inscrire</a>
                        </li>
                        <li class="nav_item">
                            <a href="../vue/connexion_admin.php">Se connecter</a> 
                        </li>
                    </ul>   
        </nav>
    </header>
    <main class="main"> 
        <br>
    <p><strong>Votre message a bien été envoyé.</strong><br>
    <br><!--Here we have a nice message telling the user that his request has been sent out and that a reply will be sent to him shortly-->
    <em>L'équipe Rose écarlate vous contactera rapidement par mail.<br>
        En attendant n'hésiter pas à consulter nos autres produits dans la <a href="../vue/boutique.php">Boutique</a></em>
    </p>
    <br>
    <br>
    </main> 
    <footer class="footer">
        <p><em>Copyrights 2022</em></p>
    </footer>
</body>
</html>