<?php 

$dbname = 'fazo';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
   // $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $bdd->query("use $dbname");
    $bdd->query("CREATE TABLE IF NOT EXISTS Reservation(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Destination TEXT(35) NOT NULL,
    Assurance BOOLEAN NOT NULL,
    Total TEXT(50),
    Nom TEXT(50),
    Age TEXT(50)
  )");
}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


?>