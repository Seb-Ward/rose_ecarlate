<?php
include ("../entity/Commande.php");

function getCommande(){
    require ("../includes/connexion.php");
   return $dbh->query("SELECT * FROM commande
                        INNER JOIN produit ON commande.produit_id=produit.produit_id
                        INNER JOIN option_livraison ON option_livraison_id=option_livraison.id
                        INNER JOIN taxe ON produit.taxe_id=taxe.id")->fetchAll();
}
