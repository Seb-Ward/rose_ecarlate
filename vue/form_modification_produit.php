<?php
require_once "../includes/connexion.php";
session_start();
if(!isset($_SESSION["user"])){//si le user session n'est pas existant
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin

$objet=new PDO('mysql:host=localhost;dbname=rose_ecarlate','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM produit WHERE produit_id=?');

$pdoStat->bindvalue(':',$_GET['produit_id'],PDO::PARAM_INT);

$executeIsok = $pdoStat->execute();

$produit = $pdoStat->fetch();
var_dump($produit);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>modification produit bdd</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleurs page de modification d'un produit.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Formulaire de modification d'un produit</h1>
        <nav class="header_nav">
            <a href="../vue/dashboard.php">Retourner à mon tableau de board</a>
            <a href="../controleur/deconnexion.php">Se déconnecter</a>   
        </nav>
    </header>
    <main class="main"> 
    <form action="../controleur/modification_produit_bdd.php" method="POST">
    <fieldset>
        <legend>Modification d'un produit dans la boutique</legend>
        <br>
        <br>
        <div>
            <label for="produit_nom">Nom du produit</label>
            <input type="produit_nom" name="produit_nom" id="produit_nom"  value="<?= $produit['produit_nom']; ?>"required>
        </div>
        <div>
            <label for="produit_description"></label>
            <textarea name="produit_description" id="produit_description" cols="40" rows="20" 
            placeholder="description du produit"value="<?= $produit['produit_description']; ?>"></textarea> Insertion image(s)<input type="file" name="image" id="image">
        </div>
        <div>
            <label for="produit_prix">Prix ttc</label>
            <input type="produit_prix" name="produit_prix" id="produit_prix"  value="<?= $produit['produit_prix']; ?>"required>
           
        </div>
            <input type="submit" valeur= "Enregistrer les modifications">
    </fieldset>
    </form>
    </main> 
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>
