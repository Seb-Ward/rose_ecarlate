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
    <title>Produits en bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page liste des produits en bdd.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <br>
    <h1>Liste des produits dans la base de données</h1>
        <nav class="header_nav">
            <a href="../index.html"> Page d'acceuil</a>
            <a href="../vue/boutique.php">La boutique</a>
            <a href="../vue/dashboard.php">Mon tableau de board</a>
            <a href="../controleur/deconnexion.php">Se déconnecter</a> 
        </nav>
    </header>
    <main class="main"> 
    <div id="listing">
       <h3>Listing</h3>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom du produit</th>
                    <th>description</th>
                    <th>prix</th>
                    <th>photos</th>
                    <th>modifier</th>
                    <th>Suprimer</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php  
            require_once "../includes/connexion.php";
        foreach($dbh->query("SELECT * 
        FROM produit") as $produit){
//je fais directement la requête sql sans faire le prepare parcequ'elle va pas changer elle est fixe (elle affiche l'ensemble des question créer)
        ?>
        <tr>
            <td><?=$produit["produit_id"]?></td>
            <td><?=$produit["produit_nom"]?></td>
            <td><?=$produit["produit_description"]?></td>
            <td><?=$produit["produit_prix"]?></td>
            <td><?=$produit["image_id"]?></td>
            <td><button><a href="../controleur/ajout_produit_bdd.php?produit_id=<?=$produit["produit_id"]?>">Modifier</a></button></td>
            <td><button><a href="../controleur/suppression_produit.php?produit_id=<?=$produit["produit_id"]?>">Suprimer</a></button></td>
        </tr>
        

        <?php }
         
        ?>
       
        </tbody>
    </table>
   
    <button><a href="../vue/form_ajout_produit.php">Ajouter un nouveau produit</a></button>
    </div>
    
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>