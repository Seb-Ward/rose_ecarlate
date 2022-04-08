<?php
if (!isset($_POST["message_nom_expediteur"]) || empty($_POST["message_nom_expediteur"])  || !isset($_POST["message_telephone_expediteur"]) || empty($_POST["message_telephone_expediteur"]) || !isset($_POST["message_text_expediteur"]) || empty($_POST["message_text_expediteur"])) { 
    
        
             

                    header("Location:../vue/contact.php");
                    exit();
            
        
    
}

require_once("../includes/connexion.php");
try {/* je fais mon insertion dans la bdd dans la table message*/

    require_once ("../model/message.php");
    if(isset($_POST['message_genre_feminin_expediteur'])){
        $genre=0;
    }else{
        $genre=1;
    }
    $param_message = array('message_nom_expediteur' => $_POST['message_nom_expediteur'],'message_genre_expediteur' => $genre,'message_email_expediteur' => $_POST['message_email_expediteur'],'message_telephone_expediteur' => $_POST['message_telephone_expediteur'],'message_text_expediteur' => $_POST['message_text_expediteur']);

    insertMessage($param_message);
    
    
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
header("Location:../vue/retour_messages_contacts.php");
