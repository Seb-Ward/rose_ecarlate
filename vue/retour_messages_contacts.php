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
$page="retour_messages_contacts";

?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Messages envoyés via contact</title>
        <meta charset="UTF-8">
        <meta name="description" content="magasin de vente de fleur page retour messages contacts.">
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
                        <a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>
  
            </header>
            <main class="main"> 
                <br>
                    <p><strong>Votre message a bien été envoyé.</strong><br>
                        <br><!--Here we have a nice message telling the user that his request has been sent out and that a reply will be sent to him shortly-->
                            <em>L'équipe Rose écarlate vous contactera rapidement par mail.<br>
                                En attendant n'hésiter pas à consulter nos autres produits dans la <a href="../vue/boutique.php">Boutique</a></em>
                    </p>
                        <br>
                        <br>
            </main> 
                <?php include_once"../vue/footer.php";?>
    </body>
</html>