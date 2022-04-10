<?php
session_start();
if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="magasin de fleur page de connexion admin">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Inscription</title>
</head>
<body>
<header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>Créez-vous un compte pour passer commande et profiter de promotions.</h1>
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
                        <a href="../vue/equipe.php">L'équipe</a>
                        </li>
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
                            <a href="../vue/connexion_admin.php">Se connecter</a> 
                        </li>
                    </ul>     
    </nav>
    </header>
    <main class="main"> 
    <form action="../controleur/inscription.php" method= "post">
    <fieldset>
        <legend>S'inscrire</legend>
        <div>
            <label for="nom">Entrez votre nom</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for=prenom>Entrez votre prénom</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div>
            <label for="email">Entrez votre e-mail</label>
            <input type="text" name="email" id="email" placeholder="contact@demo.fr" required>
        </div>
        <div>
        <label for="password">Entrez un mot de passe de 4 characters min:</label>
        <input type="password" id="password" name="password"
           minlength="4" required>
        </div>
        <input type="submit" value="Créez moi un compte">
        </fieldset>
        </form>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>