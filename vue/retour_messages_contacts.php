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
$page="retour_messages_contacts";

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
<?php include_once "../vue/navigation.php";?>
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