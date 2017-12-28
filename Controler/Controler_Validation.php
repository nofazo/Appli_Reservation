<?php
$reservation = unserialize($_SESSION['reservation']);

$_SESSION['dataPass']="";

// save data about all passengers in a session variable 'dataPass' (in string)
foreach ($reservation->GetArray() as $number => $pass) 
{

	$_SESSION['dataPass'] .= "</br></br>Passager ".($number+1).": </br>Nom: ".$pass->GetLastName()."</br>Prénom: ".$pass->GetFirstName()."</br>Age: ".$pass->GetAge() ;

}

include 'View/Validation.php';

?>