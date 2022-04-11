<?php
include_once ("../model/produit.php");
  
if(isset($_GET['produit_id'])){//I use the method $_GET check that my produit_id exist
    $produit_id=intval($_GET['produit_id']);
    var_dump($produit_id);
    if($produit_id!=0){
    deleteProduit($produit_id);//Then I use my function deleteProduit to delete the product and redirecte to the header
    }    
}  
    header("Location:../vue/listing_produits_bdd.php"); 
?>