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
            $sql_image='INSERT INTO `image`(`image_nom`,`image_taille`, `image_type`, `image_bin`)
            VALUES(:image_nom, :image_taille, :image_type, :image_bin)';
            $param_image=array('image_nom' => $_FILES['image']['name']/*tableau à 2 dimensions*/,'image_taille' => $_FILES['image']['size'],'image_type' => $_FILES['image']['type'],/*on récupère l'image elle_même qu'on va convertir en chaine de caractère afin de l'incorporer dans la bdd, on fait appel à la fonction file_get_content*/'image_bin'=>file_get_contents($nom_fichier));

            $sth = $dbh->prepare($sql_image);
            $rs = $sth->execute($param_image);
            if ($rs === true) { // je vérifie si ma requete a fonctionné
                $image_id = $dbh->lastInsertId(); //récupère le dernier id que j'ai inséré dans ma bdd.
        
            
            }
        }
      }
    }
    
    
    $sql_produit = 'INSERT INTO `produit` (`produit_nom`,`produit_description`,`produit_prix`,`image_id`) 
    VALUES(:produit_nom, :produit_description, :produit_prix, :image_id)';/*je rentre mes valeurs*/
    $param_produit = array('produit_nom' => $_POST['produit_nom'],'produit_description' => $_POST['produit_description'],'produit_prix' => $_POST['produit_prix'],'image_id'=>$image_id);


    $sth = $dbh->prepare($sql_produit);
    $rs = $sth->execute($param_produit);
    if ($rs === true) { // je vérifie si ma requete a fonctionné
        $produit_id = $dbh->lastInsertId(); //récupère le dernier id que j'ai inséré dans ma bdd.

    
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;

}
header("Location:../vue/listing_produits_bdd.php");

