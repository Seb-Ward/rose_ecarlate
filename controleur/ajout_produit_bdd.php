<?php
if (!isset($_POST["produit_nom"]) || empty($_POST["produit_nom"])) { 
    if (!isset($_POST["produit_description"]) || empty($_POST["produit_description"])) { 
        if (!isset($_POST["produit_prix"]) || empty($_POST["produit_prix"])) { //Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.
            
                    header("location:../vue/form_ajout_produit.php");
                    exit;   
        }
    }
}

require_once("../includes/connexion.php");// Here is my connexion to my data base
try {//Here i do my insert in my data base produit
    $image_id=null;
    if(isset($_FILES['image'])&& $_FILES['image']['error']==0){//I check that the image exist
      if($_FILES['image']['size']<=1000000000)//We check that our Image size isn't to big
      {
        $info_fichier=pathinfo($_FILES['image']['name']);//The Pathinfo allows us to gather the infos relating to the file.
        $extension_fichier=$info_fichier['extension'];//We are gonna gather the fillings that belongs to our file 
        $extension_autoriser=array("jpeg","jpg","png");//here I check that my array authorises these formats.
        if(in_array($extension_fichier, $extension_autoriser)==true){
            $nom_fichier= $_FILES['image']['tmp_name'];//I configure my variable $nom_fichier
            //I beggin my injection
            include_once ("../model/image.php");
            $param_image=array('image_nom' => $_FILES['image']['name']/*Array with double injection.*/,'image_taille' => $_FILES['image']['size'],'image_type' => $_FILES['image']['type'],/*We gather the image that we will translate into a string to inject it into the data base we use the function : file_get_content.*/'image_bin'=>file_get_contents($nom_fichier));
            $image_id= insertImage($param_image);
              //I beggin my injection   
        }
      }
    }
    $param_produit = array('produit_nom' => htmlspecialchars( $_POST['produit_nom']),'produit_description' => htmlspecialchars($_POST['produit_description']),'produit_prix' => htmlspecialchars($_POST['produit_prix']),'image_id'=>$image_id);
    //Associative array with my key and my values
    include_once ("../model/produit.php");
    insertProduit($param_produit);//Thanks to my function I insert the product from my variable $param_produit
    
    
} catch (PDOException $e) {
    echo $e->getMessage();//Here is the process to display of an error message if necessary
    exit;

}
header("Location:../vue/listing_produits_bdd.php");

