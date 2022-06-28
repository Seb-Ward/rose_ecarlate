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
        <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

    </head>
    <body>
        <div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <?php include_once "../vue/navigation.php";   ?>
                            <li>
                                <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="accueil.php">Accueil</a>
                            </li>
                            <li>
                                <a class='nav-link px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="boutique.php">Boutique</a>
                            </li>
                            <li>
                                <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="equipe.php"> L'équipe</a>
                            </li>
                            <li>
                                <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="contact.php">Nous contacter</a>
                            </li>
                    </ul>
                        <div class="col-md-3 text-end"><button class='btn btn-outline-primary me-2'>Login</button><button class='btn btn-primary'>Sign-up</button></div>
  
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
