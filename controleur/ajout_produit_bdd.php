<?php
if (!isset($_POST["produit_nom"]) || empty($_POST["produit_nom"])) { //Je vérifie que produit_nom exite ou s'il n'est pas vide.
    if (!isset($_POST["produit_description"]) || empty($_POST["produit_description"])) { //Je vérifie que produit_description exite ou s'il n'est pas vide.
        if (!isset($_POST["produit_prix"]) || empty($_POST["produit_prix"])) { //Je vérifie que produit_prix exite ou s'il n'est pas vide.
            
                    header("location:../vue/form_ajout_produit.php");
                    exit;   
        }
    }
}

require_once("../includes/connexion.php");
try {/* je fais mon insertion dans la bdd dans la table produit */
    $image_id=null;
    if(isset($_FILES['image'])&& $_FILES['image']['error']==0){//insertion de l'image
      if($_FILES['image']['size']<=1000000)//on vérifie la taille de notre image pour éviter que notre fichier soit trop gros
      {
        $info_fichier=pathinfo($_FILES['image']['name']);//le pathinfo permet de récupérer les infos relativent au fichier
        $extension_fichier=$info_fichier['extension'];//on veut récupérer le champ correcpondant à l'extension de notre fichier
        $extension_autoriser=array("jpeg","jpg","png");
        if(in_array($extension_fichier, $extension_autoriser)==true){
            $nom_fichier= $_FILES['image']['tmp_name'];//Je configure ma variable $nom_fichier
            //Je débute mon insertion
            include_once ("../model/image.php");
            $param_image=array('image_nom' => $_FILES['image']['name']/*tableau à 2 dimensions*/,'image_taille' => $_FILES['image']['size'],'image_type' => $_FILES['image']['type'],/*on récupère l'image elle_même qu'on va convertir en chaine de caractère afin de l'incorporer dans la bdd, on fait appel à la fonction file_get_content*/'image_bin'=>file_get_contents($nom_fichier));

            $image_id= insertImage($param_image);
            
              //Je débute mon insertion
            
        }
      }
    }
    
    $param_produit = array('produit_nom' => $_POST['produit_nom'],'produit_description' => $_POST['produit_description'],'produit_prix' => $_POST['produit_prix'],'image_id'=>$image_id);
    include_once ("../model/produit.php");
    insertProduit($param_produit);
    
    
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;

}
header("Location:../vue/listing_produits_bdd.php");

