<?php
include ("../entity/Message.php");

function getMessage(){//here I have my function to get all the messages from the data base `message` using my object Message
    require ("../includes/connexion.php");
    return $dbh->query("SELECT * FROM `message`")->fetchAll(PDO::FETCH_CLASS,"Message");
}

function deleteMessage($id){//here I have my function to delete all the messages from the data base using my object Message
    require("../includes/connexion.php");
    $sth = $dbh->prepare("DELETE FROM `message` WHERE message_id=?");//? execute va s'occuper de le changer
    $sth->execute(array($id));
}

function insertMessage($param_message){//here I have my function to insert a new message in the data base: Message

    require ("../includes/connexion.php");
    $sql_message = 'INSERT INTO `message` (`message_nom_expediteur`,`message_genre_expediteur`,`message_email_expediteur`,`message_telephone_expediteur`,`message_text_expediteur`) /*Here I logg in my keys*/
    VALUES( :message_nom_expediteur, :message_genre_expediteur, :message_email_expediteur, :message_telephone_expediteur,:message_text_expediteur)';/*Here I logg in my values*/
    

    $sth = $dbh->prepare($sql_message);
    $rs = $sth->execute($param_message);
    //I check that my request has gonne through

        return $dbh->lastInsertId(); //Here I will return my last id inserted

}