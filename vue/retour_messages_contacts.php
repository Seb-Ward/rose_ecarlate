<?php
session_start();
//if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);
//}
if(!isset($_SESSION["user"])){//si le user session n'est pas existant
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin
}

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
                        <a href="../vue/dashboard.php">Retourner à mon tableau de board</a>
                        </li>
                        <li class="nav_item">
                        <a href="../controleur/deconnexion.php">Se déconnecter</a>   
                        </li>
                    </ul>   
        </nav>
    </header>
    <main class="main"> 
        <br>
    <p><strong>Votre message a bien été envoyé.</strong><br>
    <br>
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