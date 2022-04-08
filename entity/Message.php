<?php
class Message{
    private $message_id;
    private $message_nom_expediteur;
    private $message_genre_expediteur;
    private $message_email_expediteur;
    private $message_telephone_expediteur;
    private $message_text_expediteur;

   
    public function getMessage_id(){
        return $this->message_id;
    }
    public function setMessage_id(int $message_id){
        $this->message_id= $message_id;
    }

    public function getMessage_nom_expediteur(){
        return $this->message_nom_expediteur;
    }
    public function setMessage_nom_expediteur(string $message_nom_expediteur){
        $this->message_nom_expediteur= $message_nom_expediteur;
    }
    public function getMessage_genre_expediteur(){
        return $this->message_genre_expediteur;
    }
    public function setMessage_genre_expediteur(string $message_genre_expediteur){
        $this->message_genre_expediteur= $message_genre_expediteur;
    }
    public function getMessage_email_expediteur(){
        return $this->message_email_expediteur;
    }
    public function setMessage_email_expediteur(string $message_email_expediteur){
        $this->message_email_expediteur= $message_email_expediteur;
    }
    public function getMessage_telephone_expediteur(){
        return $this->message_telephone_expediteur;
    }
    public function setMessage_telephone_expediteur(string $message_telephone_expediteur){
        $this->message_telephone_expediteur= $message_telephone_expediteur;
    }
    public function getMessage_text_expediteur(){
        return $this->message_text_expediteur;
    }
    public function setMessage_text_expediteur(string $message_text_expediteur){
        $this->message_text_expediteur= $message_text_expediteur;
    }
}


?>