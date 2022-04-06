<?php
class User{
    private $user_id;
    private $nom;
    private $prenom;
    private $email;
    private $admin;

    public function getId(){
        return $this->user_id;
    }
    public function setId(int $user_id){
        $this->user_id= $user_id;
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
    public function getAdmin(){
        return $this->admin;
    }
    public function setAdmin(string $admin){
        $this->admin= $admin;
    }

}

?>