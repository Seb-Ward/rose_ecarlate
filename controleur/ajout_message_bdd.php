<?php
if (!isset($_POST["message_nom_expediteur"]) || empty($_POST["message_nom_expediteur"])  || !isset($_POST["message_telephone_expediteur"]) || empty($_POST["message_telephone_expediteur"]) || !isset($_POST["message_text_expediteur"]) || empty($_POST["message_text_expediteur"])) { //Here I check that my fillings are existing and are not empty otherwise I redirect towards my header.

                    header("Location:../vue/contact.php");
                    exit();  
}


try {//Here i do my insert in my data base message

    require_once ("../model/message.php");// For the controleur communicates with the modele
    if(isset($_POST['message_genre_feminin_expediteur'])){
        $genre=0;//Here I manage my "genre if it's a female its=0
    }else{
        $genre=1;//Here I manage my "genre if it's a male its=1
    }
    $param_message = array('message_nom_expediteur' => htmlspecialchars ($_POST['message_nom_expediteur']),'message_genre_expediteur' => $genre,'message_email_expediteur' => htmlspecialchars($_POST['message_email_expediteur']),'message_telephone_expediteur' => htmlspecialchars($_POST['message_telephone_expediteur']),'message_text_expediteur' =>htmlspecialchars ($_POST['message_text_expediteur']));//Associative array with my key and my values

    insertMessage($param_message);//function
    
    
} catch (PDOException $e) {
    echo $e->getMessage();//Here is the process to display of an error message if necessary
    exit;
}
header("Location:../vue/retour_messages_contacts.php");
