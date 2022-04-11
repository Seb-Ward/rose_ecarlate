<?php
include_once ("../model/produit.php");
  
if(isset($_GET['produit_id'])){//I use the method $_GET check that my produit_id exist
    deleteProduit($_GET['produit_id']);//Then I use my function deleteProduit to delete the product and redirecte to the header
    }  
    header("Location:../vue/listing_produits_bdd.php"); 
?>