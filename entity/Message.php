<?php
class Message{
    private $id;
    private $nom;
    private $email;
    private $message_contenu;
   
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
    public function getEmail(){
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email= $email;
    }

    public function getMessage_contenu(){
        return $this->message_contenu;
    }
    public function setMessage_contenu(string $message_contenu){
        $this->message_contenu= $message_contenu;
    }
}


?>