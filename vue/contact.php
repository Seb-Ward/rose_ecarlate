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
$page="contact";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire de contact</title>
    <meta charset="UTF-8">
    <meta name="description" content="magasin de vente de fleur page contact.">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3/dist/css/bootstrap.css">

</head>
<body>
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
<a class="col-md-3 text-end" href="../vue/connexion.php"><button class='btn btn-outline-primary'>Login</button></a><a href="../vue/form_inscription_client.php"><button class='btn btn-primary'>Sign-up</button></a>
  
    </header>
    <main class="main"> 
        <form action="../controleur/ajout_message_bdd.php" method="POST"> <!--Here we use the $_POST method-->   
        <legend>Nous contacter</legend>
        <div><!--With this form a user can contact the admin for special request-->
            <label for="message_nom_expediteur">Nom*</label>
            <input type="text" name="message_nom_expediteur" id="message_nom_expediteur" required value="<?=$user->getNom() . " " . $user->getPrenom() ?>" >
            <input type="radio" name="message_genre_feminin_expediteur" id="message_genre_feminin_expediteur"><!-- <?php /*$user->getGenre()==0 ? "checked" : "" */?>-->
            <label for="message_genre_feminin_expediteur">Féminin* </label>
        
            <input type="radio" name="message_genre_masculin_expediteur" id="message_genre_masculin_expediteur"> <!-- <?php /*$user->getGenre()==1 ? "checked" : "" */?>-->
            <label for="message_genre_masculin_expediteur">Masculin* </label>
        </div>
        <br>
        <div>
            <label for="message_telephone_expediteur">Numéro de téléphone</label>
            <input type="text" name="message_telephone_expediteur" id="message_telephone_expediteur">
        </div>
        <br>
        <div>
            <label for="message_email_expediteur">e-mail*</label>
            <input type="text" name="message_email_expediteur" id="message_email_expediteur" placeholder="contact@demo.fr" required value="<?=$user->getEmail()?>">
        </div>
        <br>
        <div>
            <label for="message_text_expediteur">Votre message*</label>
            <textarea name="message_text_expediteur" id="message_text_expediteur" cols="40" rows="20" placeholder="Votre message"></textarea>
        </div>
        
            <input type="submit" valeur= "Envoyer mon message">
    </form>
    </fieldset>
    <br>
    <br>
    <h3 class="h3">Emplacement de la boutique</h3><!--Here we have a google map so that a costumer can physically locate the shop-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7603.233548009256!2d7.098956078256103!3d43.58335071128549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdd54f1e25a7f5%3A0xe9722c4805cfc145!2s9%20Parc%20des%20Oliviers%2C%2006600%20Antibes%2C%20France!5e0!3m2!1sfr!2suk!4v1641134106733!5m2!1sfr!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </main> 
    
    <?php include_once"../vue/footer.php";?>

</body>
</html>