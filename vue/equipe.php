<?php
session_start();
if(isset($_SESSION['user'])){
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>L'équipe</title>
    <meta charset="UTF-8">
    <meta name="description" content="La rose ecarlate, magasin de fleurs, presentation de la boutique.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>Créateurs de la boutique</h1> 
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
                        <a href="../index.php">Acceuil</a>
                        </li>
                        <li class="nav_item">
                        <a href="../vue/boutique.php">Boutique</a>
                        </li>
                        <li class="nav_item">
                            <a href="../vue/contact.php">Nous contacter</a>
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
    <p>La boutique fut crée en 1998 par "Marie et Steve", tout deux passionnés de fleurs désirant véhiculer un message avec celles-ci.</p>
    <p><!--Quick presentation of the team-->
        <ul>
            <li><strong>Marie</strong><br>
                <img src="../assets/images/marie.jpg" alt="Photo de Marie" width="275" height="225">
            Marie a suivi une formation d'horticultrice, depuis son tout jeune âge Marie a toujours été passionée par les fleurs et par l'ambiance qu'elles peuvent avoir sur une pièce.
            (Si elle n'est pas au magasin vous la trouverez surement au blue lady)</li><br>
            <li><strong>Steve</strong><br>
                <img src="../assets/images/steve.jpg" alt="Photo de Steve" width="275" height="225">
            Steve a grandi dans les serres de roses. Sa maman les cultivait et il la suivait depuis sa tendre enfance. <br> 
            (Vous ne verrez pas son visage pour des raison de "Witness protection program" <em>FBI</em> ) </li>
        </ul>
    </p>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>  
</body>
</html>