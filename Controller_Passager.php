<?php
include "Modele.php";
$reservation = unserialize($_SESSION['reservation']);

if (isset($_POST['button2']))
{
	$Msg_Error = "";
	if ( $reservation->GetLengthPass() < $reservation->GetPlace())         
	{
		if (preg_match("#[A-Za-z]+#", $_POST['LastName']) && preg_match("#[A-Za-z]+#", $_POST['FirstName']))
		{
			
			$passager = new Passager ($_POST['LastName'], $_POST['FirstName'], $_POST['Age']); 

			$reservation->AddPass($passager);  //ajout du passager ds le tableau

			$_SESSION['reservation'] = serialize($reservation) ;
			

			if ( $reservation->GetLengthPass() < ($reservation->GetPlace()))  //màj liste (+1)
			{	
				include 'Passager.php';
			}
	
			else
			{	
				include 'Controller_Validation.php'; 
			}	
		}

		else
		{
			$Msg_Error= "Nom et/ou prénom incorrecte(s), veuillez recommencer.";
			include 'Passager.php';
		}
	}
}

if (isset($_POST['precedent']))   
{
	$reservation->Reset_Pass();
	$_SESSION['reservation'] = serialize($reservation) ;

	include 'Passager.php';
}

?>