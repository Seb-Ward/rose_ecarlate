<?php
  include_once ("../model/message.php");

if(isset($_GET['message_id'])){//I use the method $_GET check that my message_id exist
    deleteMessage($_GET['message_id']);//Then I use my function deleteMessage to delete the massage and redirecte to the header
    
    }  
    header("Location:../vue/listing_messages_recus.php"); 
?>