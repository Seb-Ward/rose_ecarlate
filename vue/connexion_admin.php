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
$page="connexion_admin";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="magasin de fleur page de connexion admin">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Se connecter</title>
</head>
<body>
<header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>(Admin) Connectez-vous</h1>
    <?php include_once "../vue/navigation.php";?>

    </header>
    <main class="main"> 
    <form action="../controleur/connexion.php" method= "post"><!--Here we use the $_POST method-->
    <fieldset>
        <legend>Se connecter</legend>
        <div><!--By this form for a user can logg in under costumer or admin--> 
            <label for="emailinput">e-mail</label>
            <input type="text" name="email" id="emailinput" placeholder="contact@demo.fr" required>
        </div>
        <div>
        <label for="password">Password (4 characters minimum):</label>
        <input type="password" id="password" name="password"
           minlength="4" required>
        </div>

        <input type="submit" value="Connexion">	
        </fieldset>
        </form>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>