<?php
session_start();
if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);

}
//if(isset){

//}
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
            <a href="../index.html"> Page d'acceuil</a></li>
            <a href="../controleur/deconnexion.php">Se déconnecter</a></li>    
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
