<?php
class Panier{//Name of my class
    private $id;//Propreties who will define my objet
    private $produit_list;//Propreties who will define my objet


    public function getId(){//Function
        return $this->id;
    }
    public function setId(int $id){//Function + Type
        $this->id= $id;
    }

    public function getProduit_list(){//Function
        return $this->produit_list;
    }
    public function setProduit_list(string $produit_list){//Function + Type
        $this->produit_list= $produit_list;
    } 
    public function ajouter_produit(){

    }
    public function modifier_produit(){
    }
    
    public function supprimer_produit(){

    }
}


?>