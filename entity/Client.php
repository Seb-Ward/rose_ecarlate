<?php
class Client{
    private $id;
    private $user;
    private $panier;

    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id= $id;
    }
    public function getUser(){
        return $this->user;
    }
    public function setUser(User $user){
        $this->user= $user;
    }
    public function getPanier(){
        return $this->panier;
    }
    public function setPanier(string $panier){
        $this->panier= $panier;
    }
}


?>