<?php
session_start();
if(!isset($_SESSION["user"])){//I check if the user already exist
header("Location: ../vue/connexion_admin.php");
die();//I avoid that the robots load the page unnecessarily
}
$image_id=intval($_POST['image_id']);//Security for the image_id like specialchars
    if(isset($_FILES['image'])&& $_FILES['image']['error']==0 && $image_id!=0){//I check that the image exist
        
        if($_FILES['image']['size']<=1000000)//I check the image isn't to heavy
        {
          $info_fichier=pathinfo($_FILES['image']['name']);//The Pathinfo allows us to gather the infos relating to the file.
          $extension_fichier=$info_fichier['extension'];//We are gonna gather the fillings that belongs to our file 
          $extension_autoriser=array("jpeg","jpg","png");//here I check that my array authorises these formats.
          if(in_array($extension_fichier, $extension_autoriser)==true){
              $nom_fichier= $_FILES['image']['tmp_name'];//I configure my variable $nom_fichier
              //I beggin my injection
              include_once ("../model/image.php");
              $param_image=array('image_nom' => $_FILES['image']['name']/*Array with double injection.*/,'image_taille' => $_FILES['image']['size'],'image_type' => $_FILES['image']['type'],'image_id'=>$image_id,/*We gather the image that we will translate into a string to inject it into the data base we use the function : file_get_content.*/'image_bin'=>file_get_contents($nom_fichier));
              updateImage($param_image);
               //I beggin my injection
                }
            }
        }

        include_once ("../model/produit.php");
        $produit_id=intval($_GET['produit_id']);
        if($produit_id!=0){
        $param_produit=array ('produit_id'=>$produit_id,'produit_nom'=>htmlspecialchars($_POST['produit_nom']),'produit_description'=>htmlspecialchars($_POST['produit_description']),'produit_prix'=>htmlspecialchars($_POST['produit_prix']));//Associative array with my key and my values
        updateProduit($param_produit);//Thanks to my function I update the product from my variable $param_produit
        }
header("Location: ../vue/listing_produits_bdd.php");
?>