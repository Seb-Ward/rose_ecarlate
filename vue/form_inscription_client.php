<?php
require_once "../entity/User.php";
session_start();
if(isset($_SESSION['user'])){
   

    $user=$_SESSION['user'];
    $connected=true;
}else{
    $user=new User();
    $connected=false;

}
$page="form_incription_client";

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="magasin de fleur page de connexion admin">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

        <title>Inscription</title>
    </head>
    <body>
        <div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                    
                        <a class="col-md-8 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>
  
            </header>
                <main class="main"> 
                    <div class="container py-4">
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
                    </div>  
                </main>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li>
                            <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="../vue/accueil.php">Accueil</a>
                        </li>
                        <li>
                            <a class='nav-link px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="../vue/boutique.php">Boutique</a>
                        </li>
                        <li>
                            <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="../vue/equipe.php"> L'équipe</a>
                        </li>
                        <li>
                            <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="../vue/contact.php">Nous contacter</a>
                        </li>
                    </ul>
    
                                <?php include_once"../vue/footer.php";?>

    </body>
</html>