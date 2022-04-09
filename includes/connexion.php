<?php
require("../includes/config.php");
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try{
    $dbh = new PDO($dsn, $username, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
    exit;
}
