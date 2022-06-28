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
$page="equipe";

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>L'équipe</title>
        <meta charset="UTF-8">
        <meta name="description" content="La rose ecarlate, magasin de fleurs, presentation de la boutique.">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

    </head>
    <body>
        <div class="container">
            <header class="py-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between md-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="../vue/equipe.php"><img width="230" height="70" src="../assets/images/logo_fcomme_fleurs.jpg" alt=""></a>
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
                        <a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Logout</button></a>
  
            </header>
        <main>
            <div class="container py-4">
        
                <h5 class="card-tittle text-center text-secondary"> La boutique fut crée en aout 2010, un repère pour les antibois en quête de jolis bouquets et plantes.</h5>
    
                <!--Quick presentation of the team-->
                    <ul>
                        <li><strong>Fréderic</strong><br>
                            <img src="../assets/images/upload/frederic_ristorto.jpg" class="rounded mx-auto d-block"  alt="Photo de Fréderic" width="320" height="250">
                            Fréderic c'est le patron de F Comme Fleurs. <br> Après avoir travaillé avec les anciens propriétaires, c'est en lui qu'ils ont été inspiré pour reprendre la boutique. <br> "La compositions d'un bouquet c'est une question de feeling, les saisons, les températures c'est elles qui m'influencent dans mon choix de fleurs."  <br> C'est un passionné auquel vous vous adresseriez pour composer votre bouquet.</li><br>
                        <li><strong>Leatitia</strong><br>
                            <img src="../assets/images/upload/leatitia_f_comme_fleurs.jpg" class="rounded mx-auto d-block"  alt="" width="275" height="300">
                            Ce qui lui plait à Laëtitia c'est le pouvoir que les fleurs peuvent avoir sur les gens. <br> Lorsqu'elle commence à composer un bouquet dit-elle, elle ne sait jamais à quoi il va ressembler, elle l'agrémente, le faconne et à la fin il prend vie! Et provoque des coups de coeur chez nos des clients(e).
                        </li>
                    </ul>
        
            </div>
        </main>
    
                        <?php include_once"../vue/footer.php";?>
 
    </body>
</html>