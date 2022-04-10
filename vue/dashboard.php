<?php
//session_start();
//if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);
//}
//if(!isset($_SESSION["user"])){//si le user session n'est pas existant
//header("Location: ../vue/connexion_admin.php");
//die();//eviter que les robots chargent la page si on en a pas besoin
//}
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin
}elseif($_SESSION['user']->getAdmin()!=1){//là on veut récupérer le champ admin pour voir si il est
    header("Location: ../index.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire de contact</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page contact.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Tableau de board administrateur</h1>
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
                        <a href="../controleur/deconnexion.php">Se déconnecter</a>  
                        </li>
                    </ul>   
                
        </nav>
    </header>
    <main class="main"> 
    <fieldset>
        <form>
        <legend>Tableau de board de mes possibilitées.</legend>
        <br>
        <button><a href="../vue/listing_messages_recus.php">Consulter les messages reçus.</a></button>
        <br>
        <br>
        <button><a href="../vue/listing_produits_bdd.php">Consulter la liste des produits en bdd (Modifier/Supprimer)</a></button>
        <br>
        <br>
        <button><a href="../vue/form_ajout_produit.php">Ajouter un produit dans le bdd.</a></button>
        <br>
        <br>
        <button><a href="../vue/boutique.php">Consulter les produits en boutique</a></button>
        <br>
    </form>
    </fieldset>
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>
