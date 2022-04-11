<?php
session_start();
if(isset($_SESSION['user'])){
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="magasin de fleur page de connexion admin">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Se connecter</title>
</head>
<body>
<header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>(Admin) Connectez-vous</h1>
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
    <form action="../controleur/connexion.php" method= "post"><!--Here we use the $_POST method-->
    <fieldset>
        <legend>Se connecter</legend>
        <div><!--By this form for a user can logg in under costumer or admin--> 
            <label for="emailinput">e-mail</label>
            <input type="text" name="email" id="emailinput" placeholder="contact@demo.fr" required>
        </div>
        <div>
        <label for="password">Password (4 characters minimum):</label>
        <input type="password" id="password" name="password"
           minlength="4" required>
        </div>

        <input type="submit" value="Connexion">	
        </fieldset>
        </form>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>