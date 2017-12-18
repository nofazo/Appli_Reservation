<?php
$reservation = unserialize($_SESSION['reservation']);

$_SESSION['dataPass']="";

//enrejistrement des données conçernant tous les passagers dans une variable de session 'dataPass'
foreach ($reservation->GetArray() as $number => $pass) 
{

	$_SESSION['dataPass'] .= "</br></br>Passager ".($number+1).": </br>Nom: ".$pass->GetLastName()."</br>Prénom: ".$pass->GetFirstName()."</br>Age: ".$pass->GetAge() ;

}

include 'Validation.php';

?>