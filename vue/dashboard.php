<?php

include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion.php");
die();//Avoid Robots to charge this page if it ain't necessary
}elseif($_SESSION['user']->getAdmin()!=1){//Here we want to recuperate the field is an admin
    header("Location: ../index.php");
    die();
}
$user=$_SESSION['user'];
$page="dashboard";
$connected=true;

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
        <?php include_once "../vue/navigation.php";   ?>  

    </header>
    <main class="main"> 
    <fieldset>
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
    </fieldset>
    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>
