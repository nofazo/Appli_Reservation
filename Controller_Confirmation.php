<?php
include 'Modele.php';
$reservation = unserialize($_SESSION['reservation']);

$dbname = 'fazo';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
   // $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $bdd->query("use $dbname");
    $bdd->query("CREATE TABLE IF NOT EXISTS reservation(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Destination TEXT(35) NOT NULL,
    Insurance TEXT NOT NULL,
    Total INT(20),
    Name TEXT(50),
    Age TEXT(50)
  )");

}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//$id = 1; attention pour le premier élément: peut être définir id à 1

$destination = $reservation->GetDestination();
$insurance = $reservation->GetInsurance() ; 
$total =   $reservation->GetTotalPrice();
$name = implode(',',  $reservation->GetArrayNames());
$age =implode(',', $reservation->GetArrayAges());


$sql='INSERT INTO reservation (Destination, Insurance, Total, Name, Age) VALUES (:destination, :insurance, :total, :name, :age)';
$stmt = $bdd->prepare($sql);

$stmt->bindParam(':destination', $destination);
$stmt->bindParam(':insurance', $insurance);
$stmt->bindParam(':total', $total);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':age' , $age);

$stmt->execute();


//$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
//$req->execute(array($_POST['pseudo'], $_POST['message']));

include 'Confirmation.php' ;
?>