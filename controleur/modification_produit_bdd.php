<?php
require_once "../includes/connexion.php";
session_start();
if(!isset($_SESSION["user"])){//si le user session n'est pas existant
header("Location: ../vue/connexion_admin.php");
die();//eviter que les robots chargent la page si on en a pas besoin
}
require_once "../includes/connexion.php";

    if(isset($_FILES['image'])&& $_FILES['image']['error']==0){//insertion de l'image
        if($_FILES['image']['size']<=1000000)//on vérifie la taille de notre image pour éviter que notre fichier soit trop gros
        {
          $info_fichier=pathinfo($_FILES['image']['name']);//le pathinfo permet de récupérer les infos relativent au fichier
          $extension_fichier=$info_fichier['extension'];//on veut récupérer le champ correcpondant à l'extension de notre fichier
          $extension_autoriser=array("jpeg","jpg","png");
          if(in_array($extension_fichier, $extension_autoriser)==true){
              $nom_fichier= $_FILES['image']['tmp_name'];//Je configure ma variable $nom_fichier
              
              include_once ("../model/image.php");
              $param_image=array('image_nom' => $_FILES['image']['name']/*tableau à 2 dimensions*/,'image_taille' => $_FILES['image']['size'],'image_type' => $_FILES['image']['type'],'image_id'=>$_POST['image_id'],/*on récupère l'image elle_même qu'on va convertir en chaine de caractère afin de l'incorporer dans la bdd, on fait appel à la fonction file_get_content*/'image_bin'=>file_get_contents($nom_fichier));
              updateImage($param_image);
              //Je débute mon insertion
              
        
                }
            }
        }
        include_once ("../model/produit.php");
        $param_produit=array ('produit_id'=>$_POST['produit_id'],'produit_nom'=>$_POST['produit_nom'],'produit_description'=>$_POST['produit_description'],'produit_prix'=>$_POST['produit_prix']);
        updateProduit($param_produit);

header("Location: ../vue/listing_produits_bdd.php");
?>