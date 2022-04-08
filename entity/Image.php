<?php
class Image{
    private $image_id;
    private $image_nom;
    private $image_taille;
    private $image_type;
    private $image_bin;


    public function getImage_id(){
        return $this->image_id;
    }
    public function setImage_id(int $image_id){
        $this->image_id= $image_id;
    }
    public function getImage_nom(){
        return $this->image_nom;
    }
    public function setImage_nom(string $image_nom){
        $this->image_nom= $image_nom;
    } 
    public function getImage_taille(){
        return $this->image_taille;
    }
    public function setImage_taille(string $image_taille){
        $this->image_taille= $image_taille;
    } 
    public function getImage_type(){
        return $this->image_type;
    }
    public function setImage_type(string $image_type){
        $this->image_type= $image_type;
    } 
    public function getImage_bin(){
        return $this->image_bin;
    }
    public function setImage_bin(string $image_bin){
        $this->image_bin= $image_bin;
    } 
  
    
 
}


?>