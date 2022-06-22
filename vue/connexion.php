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
$page="connexion_admin";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="magasin de fleur page de connexion admin">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">
    <title>Se connecter</title>
</head>
<div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/"><img width="" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

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
    <body class="text center">
    <main class="form-signin w-50 m-auto">
    <form action="../controleur/connexion.php" method= "post"><!--Here we use the $_POST method-->

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"required>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="4" required>
      <label for="password">Password (4 characters minimum):</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    </main>
    <fieldset>

        <input type="submit" value="Connexion">	
        </fieldset>
        </form>
    <?php include_once"../vue/footer.php";?>

</body>
</html>