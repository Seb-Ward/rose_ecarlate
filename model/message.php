<?php
include_once ("../entity/Message.php");

function getMessage(){
    require_once ("../includes/connexion.php");
    return $dbh->query("SELECT * FROM `message`")->fetchAll(PDO::FETCH_CLASS,"Message");
}

function deleteMessage($id){
    require_once ("../includes/connexion.php");
    $sth = $dbh->prepare("DELETE FROM `message` WHERE message_id=?");//? execute va s'occuper de le changer
    $sth->execute(array($id));
}

function insertMessage($param_message){

    require_once ("../includes/connexion.php");
    $sql_message = 'INSERT INTO `message` (`message_nom_expediteur`,`message_genre_expediteur`,`message_email_expediteur`,`message_telephone_expediteur`,`message_text_expediteur`) 
    VALUES( :message_nom_expediteur, :message_genre_expediteur, :message_email_expediteur, :message_telephone_expediteur,:message_text_expediteur)';/*je rentre mes valeurs*/
    

    $sth = $dbh->prepare($sql_message);
    $rs = $sth->execute($param_message);
     // je vérifie si ma requete a fonctionné
        return $dbh->lastInsertId(); //récupère le dernier id que j'ai inséré dans ma bdd.

}