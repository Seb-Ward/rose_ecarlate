<?php
class User{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $admin;

    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
        $this->id= $id;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom(string $nom){
        $this->nom= $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom(string $prenom){
        $this->prenom= $prenom;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email= $email;
    }


}

?>