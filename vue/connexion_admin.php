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
    <title>Se connecter</title>
</head>
<body>
<header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>(Admin) Connectez-vous</h1>
    <nav class="header_nav">
        <a href="../index.php"> Acceuil</a>
        <a href="../vue/boutique.php">Boutique</a>
        <a href="../vue/equipe.php"> L'équipe</a>
        <a href="../vue/contact.php">Nous contacter</a>
        <a href="../vue/form_inscription_client.php">S'inscrire</a>    
    </nav>
    </header>
    <main class="main"> 
    <form action="../controleur/connexion.php" method= "post">
    <fieldset>
        <legend>Se connecter</legend>
        <div>
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