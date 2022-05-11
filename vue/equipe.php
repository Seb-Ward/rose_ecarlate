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
$page="equipe";

?>
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>L'équipe</title>
    <meta charset="UTF-8">
    <meta name="description" content="La rose ecarlate, magasin de fleurs, presentation de la boutique.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
    <h1 class="title-big">Rose écarlate</h1>
    <h1>Présentation de l'équipe de fleuristes</h1> 
    <?php include_once "../vue/navigation.php";   ?>  

    </header>
    <main class="main">
    <p>La boutique fut crée en aout 2010, un repère pour les antibois conquits par les fleurs et les plantes.</p>
    <p><!--Quick presentation of the team-->
        <ul>
            <li><strong>Fréderic</strong><br>
                <img src="../assets/images/upload/frederic_ristorto.jpg" alt="Photo de Fréderic" width="320" height="250">
            Fréderic c'est le patron de F Comme Fleurs. <br> Après avoir travaillé avec les anciens propriétaires, c'est en lui qu'ils ont été inspiré pour reprendre la boutique. <br> "La compositions d'un bouquet c'est une question de feeling, les saisons, les températures c'est elles qui m'influencent dans mon choix de fleurs."  <br> C'est un passionné auquel vous vous adresseriez pour composer votre bouquet.</li><br>
            <li><strong>Leatitia</strong><br>
                <img src="../assets/images/upload/leatitia_f_comme_fleurs.jpg" alt="" width="275" height="300">
            Ce qui lui plait à Laëtitia c'est le pouvoir que les fleurs peuvent avoir sur les gens. <br> Lorsqu'elle commence à composer un bouquet dit-elle, elle ne sait jamais à quoi il va ressembler, elle l'agrémente, le faconne et à la fin il prend vie! Et provoque des coups de coeur chez nos des clients(e).
              </li>
        </ul>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>  
</body>
</html>