<?php
class Admin{
    private $id;
    private $user;
    private $message_list;
   
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
    public function getMessage_list(){
        return $this->message_list;
    }
    public function setMessage_list(string $message_list){
        $this->message_list= $message_list;
    }
}

?>