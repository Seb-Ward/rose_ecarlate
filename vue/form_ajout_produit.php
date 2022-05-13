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
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Formulaire d'insertion d'un nouveau produit</h1>
        <?php include_once "../vue/navigation.php";   ?>  

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