  <?php
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Formulaire</title>
    <meta charset="UTF-8"> 
    <style>
    html, body{
        width: 100%;
        height: 100%;
    }
    th{
        text-align: left;
    }
    table{
        width:100%;
    }
    body{
        display: flex;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    #listing{
        width: 65%;
        height: 100%;
        border:solid 1px gray;
        border-radius: 20px;
        margin: 0.5%;
        padding: 10px;
    }
    </style>
<div id="listing">
       <h3>Listing</h3>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Genre</th>
                    <th>Nationalité</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
        </table>
?>