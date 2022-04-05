<?php
class Panier{
    private $id;
    private $produit_list;


    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id= $id;
    }

    public function getProduit_list(){
        return $this->produit_list;
    }
    public function setProduit_list(string $produit_list){
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