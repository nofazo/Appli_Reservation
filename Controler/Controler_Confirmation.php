<?php
include 'Modele/Modele.php';
$reservation = unserialize($_SESSION['reservation']);


//Connection to the database
$dbname = 'fazo';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
    $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
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

$destination = $reservation->GetDestination();
$insurance = $reservation->GetInsurance() ; 
$total =   $reservation->GetTotalPrice();
$name = implode(',',  $reservation->GetArrayNames());
$age =implode(',', $reservation->GetArrayAges());


//In case where the user modifies a reservation using the 'edit' button found in the admin page
if ($_SESSION['Edit'] === "TRUE")
{
	$id = $_SESSION['id'];
	$sql = "UPDATE reservation SET Destination='$destination', Insurance='$insurance', Total='$total', Name= '$name', Age='$age' WHERE id='$id'";
	$req = $bdd->prepare($sql);
	$req->execute ();
}

// Save a reservation in the database
else
{
	$sql='INSERT INTO reservation (Destination, Insurance, Total, Name, Age) VALUES (:destination, :insurance, :total, :name, :age)';
	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':destination', $destination);
	$stmt->bindParam(':insurance', $insurance);
	$stmt->bindParam(':total', $total);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':age' , $age);

	$stmt->execute();
}

include 'View/Confirmation.php' ;
?>

