<?php
include 'Modele.php';
$reservation = unserialize($_SESSION['reservation']);


//Connection à la base de données
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
    Age INT(50)
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


//Dans le cas où l'utilisateur modifie une réservation à l'aide du bouton 'edit' se trouvant dans la page admin
if ($_SESSION['Edit'] === "TRUE")
{
	$id = $_SESSION['id'];
	$sql = "UPDATE reservation SET Destination='?', Insurance='?', Total='?', Name= '?', Age='?' WHERE id='?'";
	$req = $bdd->prepare($sql);
	$req->execute (array('id' => $id, 'Destination' => $destination, 'Insurance' => $insurance, 'Total' => $total, 'Name' => $name, 'Age' => $age ));
}

// Pour enrejistrer une réservation dans la base de données
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

include 'Confirmation.php' ;
?>