<?php
include "Modele.php";
$reservation = unserialize($_SESSION['reservation']);

if (isset($_POST['button2']))
{
	if ( $reservation->GetLengthPass() < $reservation->GetPlace())         
	{
		$passager = new Passager ($_POST['LastName'], $_POST['FirstName'], $_POST['Age']); 

		$reservation->AddPass($passager);  //ajout du passager ds le tableau

		$_SESSION['reservation'] = serialize($reservation) ;
	}


	if ( $reservation->GetLengthPass() < ($reservation->GetPlace()))  //màj liste (+1)
	{
		include 'Passager.php';
	}
	
	else
	{
		include 'Controller_Validation.php'; 
	}	
}

if (isset($_POST['precedent']))   
{
	$reservation->Reset_Pass();
	$_SESSION['reservation'] = serialize($reservation) ;

	include 'Passager.php';
}

?>