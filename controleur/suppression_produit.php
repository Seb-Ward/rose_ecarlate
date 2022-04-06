<?php
include_once ("../model/produit.php");
  
if(isset($_GET['produit_id'])){
    deleteProduit($_GET['produit_id']);
    
    }  
    header("Location:../vue/listing_produits_bdd.php"); 
?>