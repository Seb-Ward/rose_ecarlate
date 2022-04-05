<?php
session_start();
if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La boutique</title>
    <meta charset="UTF-8">
    <meta name="description" content="vente de fleurs en ligne. Articles en boutique">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Produits en boutiques</h1>
            <nav class="header_nav">
            <a href="../vue/equipe.php"> L'équipe</a></li>
            <a href="../index.html"> Acceuil</a></li>
            <a href="../vue/contact.php">Nous contacter</a></li>
            <a href="../vue/form_inscription_client.php">S'inscrire</a></li>
            <a href="../vue/connexion_admin.php">Se connecter</a></li>    
            </nav>
    </header>
    <main class="main"> 
        <div id="conteneur">   
            <div class="element 4"><a href="../produits/aricle1.html" target="_blank" >   
        <img src="../assets/images/upload/image_article1.jpg" alt="Roses du cap d'antibes" width="250" height="250">
         Roses du cap d'antibes
        </a></div> 

        <div class="element 5"><a href="../produits/article2.html" target="_blank">
        <img src="../assets/images/upload/image_article2.jpg" alt="Bouquet florale composé par Marie" width="250" height="250">
        Bouquet de la Marie
        </a></div>
        
        <div class="element 6"><a href="../produits/article3.html" target="_blank">
        <img src="../assets/images/upload/image_article3.jpg" alt="Feuilles de bananes de la Martinique" width="250" height="250">
        Bananier d'interieur
        </a></div>
        
        <div class="element 7"><a href="../produits/article4.html" target="_blank">
        <img src="../assets/images/upload/image_article4.jpg" alt="Palmier d'interieur" width="250" height="250">
        Palmier d'interieur
        </a></div>
        
        <div class="element 8"><a href="../produits/article6.html" target="_blank">
        <img src="../assets/images/upload/image_article6.jpg" alt="Arbre de noel fait par Jenny" width="250" height="250">
        Sapin de Laponie
        </a></div>
    </main>
    <footer class="footer">
        <p>Copyrights 2022</p>
    </footer>
</body>
</html>