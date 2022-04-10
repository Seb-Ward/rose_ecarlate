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
    <title>Ajout produit bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page contact.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Formulaire d'insertion d'un nouveau produit</h1>
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
    <form action="../controleur/ajout_produit_bdd.php" method="POST" enctype="multipart/form-data"><!--enctype utile pour pouvoir intégrer l'image dans le formulaire-->
    <fieldset>
        <legend>Ajouter un nouveau produit à la boutique</legend>
        <br>
        <br>
        <div>
            <label for="produit_nom">Nom du produit</label>
            <input type="produit_nom" name="produit_nom" id="produit_nom" required>
        </div>
        <div>
            <label for="produit_description"></label>
            <textarea name="produit_description" id="produit_description" cols="40" rows="20" 
            placeholder="description du produit"></textarea> Insertion image(s)<input type="file" name="image" id="image">
        </div>
        <div>
            <label for="produit_prix">Prix ttc</label>
            <input type="produit_prix" name="produit_prix" id="produit_prix" required>
           
        </div>
            <input type="submit" valeur= "enregistrer">
    </fieldset>
    </form>
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>