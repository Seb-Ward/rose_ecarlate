<?php
include_once ("../entity/Commande.php");

function transform_to_object($commande){
  $commandeobject= new Commande($commande['commande_ref, user, montant_total, date_commande, date_envoi, option_livraison']); 
  $commandeobject->setCommande_ref();
}