<?php

function deleteProduit($id){
    require_once ("../includes/connexion.php");
    $sth = $dbh->prepare("DELETE FROM produit WHERE produit_id=?");//? execute va s'occuper de le changer
    $sth->execute(array($id));
}

?>