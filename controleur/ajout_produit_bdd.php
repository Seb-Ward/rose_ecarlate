<?php
if (!isset($_POST["produit_nom"]) || empty($_POST["produit_nom"])) { //Je vérifie que produit_nom exite ou s'il n'est pas vide.
    if (!isset($_POST["produit_description"]) || empty($_POST["produit_description"])) { //Je vérifie que produit_description exite ou s'il n'est pas vide.
        if (!isset($_POST["produit_prix"]) || empty($_POST["produit_prix"])) { //Je vérifie que produit_prix exite ou s'il n'est pas vide.
            
                    header("location:../vue/form_ajout_produit.php");
                    exit;   
        }
    }
}

require_once("../includes/connexion.php");
try {/* je fais mon insertion dans la bdd dans la table produit */
    $sql_produit = 'INSERT INTO `produit` (`produit_nom`,`produit_description`,`produit_prix`) 
    VALUES(:produit_nom, :produit_description, :produit_prix)';/*je rentre mes valeurs*/
    $param_produit = array('produit_nom' => $_POST['produit_nom'],'produit_description' => $_POST['produit_description'],'produit_prix' => $_POST['produit_prix']);


    $sth = $dbh->prepare($sql_produit);
    $rs = $sth->execute($param_produit);
    if ($rs === true) { // je vérifie si ma requete a fonctionné
        $produit_id = $dbh->lastInsertId(); //récupère le dernier id que j'ai inséré dans ma bdd.

    
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;

}
header("Location:../vue/listing_produits_bdd.php");

