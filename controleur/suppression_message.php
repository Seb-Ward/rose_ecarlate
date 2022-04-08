<?php
  include_once ("../model/message.php");

if(isset($_GET['message_id'])){
    deleteMessage($_GET['message_id']);
    
    }  
    header("Location:../vue/listing_messages_recus.php"); 
?>