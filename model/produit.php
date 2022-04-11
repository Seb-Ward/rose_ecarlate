<?php
include ("../entity/Produit.php");//On inclu entyity produit pour que nos requêtes puissent retourner un objet produit
function deleteProduit($id){//here I have my function delete from the data base: produit
    require ("../includes/connexion.php");
    $sth = $dbh->prepare("DELETE FROM produit WHERE produit_id=?");//? execute va s'occuper de le changer
    $sth->execute(array($id));
}

function getProduit(){//here I have my function select a produict from the data base: product
    require ("../includes/connexion.php");
   return $dbh->query("SELECT * FROM produit")->fetchAll(PDO::FETCH_CLASS,"Produit");
    
}

function getProduitById($id){//here I have my function select a produict from the data base: product
    
    require ("../includes/connexion.php");

$pdoStat = $dbh->prepare('SELECT * FROM produit WHERE produit_id=?');

$pdoStat->execute(array($id));

return $pdoStat->fetchObject("Produit");
}

function updateProduit($param_produit){
    require ("../includes/connexion.php");
    $pdoStat = $dbh->prepare('UPDATE produit SET produit_nom=:produit_nom, produit_description=:produit_description, produit_prix=:produit_prix WHERE produit_id=:produit_id LIMIT 1');
    $pdoStat->execute($param_produit);

}

function insertProduit($param_produit){
    require ("../includes/connexion.php");

    $sql_produit = 'INSERT INTO `produit` (`produit_nom`,`produit_description`,`produit_prix`,`image_id`) 
    VALUES(:produit_nom, :produit_description, :produit_prix, :image_id)';/*je rentre mes valeurs*/
   

    $sth = $dbh->prepare($sql_produit);
   return $sth->execute($param_produit);
}
?>