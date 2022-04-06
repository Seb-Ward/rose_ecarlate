<?php
class Produit{
    private $produit_id;
    private $nom;
    private $description;
    private $image;
    private $prix;

    public function getProduit_id(){
        return $this->id;
    }
    public function setProduit_id(int $id){
        $this->id= $id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom(string $nom){
        $this->nom= $nom;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription(string $description){
        $this->description= $description;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage(string $image){
        $this->image= $image;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function setPrix(float $prix){
        $this->prix= $prix;
    }

}


?>