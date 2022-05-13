<?php
require_once "../entity/User.php";
session_start();
if(isset($_SESSION['user'])){
   

    $user=$_SESSION['user'];
    echo $user->getNom(); 
    $connected=true;
}else{
    $user=new User();
    $connected=false;

}
$page="form_incription_client";

?>
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="magasin de fleur page de connexion admin">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Inscription</title>
</head>
<body>
<header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>Créez-vous un compte pour passer commande et profiter de promotions.</h1>
    <?php include_once "../vue/navigation.php";   ?>  

    </header>
    <main class="main"> 
    <form action="../controleur/inscription.php" method= "post"><!--We are using the $_POST method-->
    <fieldset>
        <legend>S'inscrire</legend>
        <div><!--Here we have a form for inscription-->
            <label for="nom">Entrez votre nom</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for=prenom>Entrez votre prénom</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div>
            <label for="email">Entrez votre e-mail</label>
            <input type="text" name="email" id="email" placeholder="contact@demo.fr" required>
        </div>
        <div>
        <label for="password">Entrez un mot de passe de 4 characters min:</label>
        <input type="password" id="password" name="password"
           minlength="4" required>
        </div>
        <input type="submit" value="Créez moi un compte">
        </fieldset>
        </form>
    </main>
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>