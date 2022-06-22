<?php
include_once "../entity/User.php";
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../vue/connexion.php");
die();//Avoid the robot to charge the page if it ain't necessary
}elseif($_SESSION['user']->getAdmin()!=1){//Here we will recup the field user to check if he is an admin
    header("Location: ../index.php");
    die();
}
$user=$_SESSION['user'];
$page="form_ajout_produit";
$connected=true;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajout produit bdd</title>
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
<a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>  
    </header>
    <main class="main"> 
    <form action="../controleur/ajout_produit_bdd.php" method="POST" enctype="multipart/form-data"><!--on top of ussing the $_POST method we also use enctype ="multipart" to insert a picture in a form--> 
    <fieldset>
        <legend>Ajouter un nouveau produit à la boutique</legend>
        <br>
        <br>
        <div><!--Here we insert a new product to the data base-->
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
        <div>
    <input type="checkbox" id="produit_publish_accueil" name="produit_publish_accueil" >
    </div>    
    <div>
    <input type="checkbox" id="produit_publish_boutique" name="produit_publish_boutique">
    </div>            
    <input type="submit" valeur= "enregistrer">
    </fieldset>
    </form>
    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>