<?php
session_start();
if(isset($_SESSION['user'])){
//var_dump($_SESSION ['user']);

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Messages envoyés via contact</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page retour messages contacts.">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="title-big">Rose écarlate</h1>
        <h1>Confirmation de l'envoi d'un message</h1>
        <nav class="header_nav">
            <a href="../vue/equipe.php"> L'équipe</a></li>
            <a href="../index.php"> Page d'acceuil</a></li>
            <a href="../vue/boutique.php">La boutique</a></li>
            <a href="../vue/form_inscription_client.php">S'inscrire</a></li>
            <a href="../vue/connexion_admin.php">Se connecter</a></li>    
        </nav>
    </header>
    <main class="main"> 
        <br>
    <p><strong>Votre message a bien été envoyé.</strong><br>
    <br>
    <em>L'équipe Rose écarlate vous contactera rapidement par mail.<br>
        En attendant n'hésiter pas à consulter nos autres produits dans la <a href="../vue/boutique.php">Boutique</a></em>
    </p>
    <br>
    <br>
    </main> 
    <footer class="footer">
        <p><em>Copyrights 2022</em></p>
    </footer>
</body>
</html>