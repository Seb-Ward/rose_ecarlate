<?php
class Produit{
    private $produit_id;
    private $produit_nom;
    private $produit_description;
    private $produit_prix;
    private $image_id;
   

    public function getProduit_id(){
        return $this->produit_id;
    }
    public function setProduit_id(int $produit_id){
        $this->produit_id= $produit_id;
    }
    public function getProduit_nom(){
        return $this->produit_nom;
    }
    public function setProduit_nom(string $produit_nom){
        $this->produit_nom= $produit_nom;
    }
    public function getProduit_description(){
        return $this->produit_description;
    }
    public function setProduit_description(string $produit_description){
        $this->Produit_description= $produit_description;
    }
    public function getProduit_prix(){
        return $this->produit_prix;
    }
    public function setProduit_prix(float $produit_prix){
        $this->prix= $produit_prix;
    }
    public function getImage_id(){
        return $this->image_id;
    }
    public function setImage_id(string $image_id){
        $this->image_id= $image_id;
    }
    

}


?>