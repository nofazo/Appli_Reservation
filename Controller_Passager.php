<?php
include "Modele.php";

if (isset($_SESSION['reservation']))
    $reservation = unserialize($_SESSION['reservation']);

$Msg_Error="";

// création et enrejistrement des passagers dans l'object réservation
if (isset($_POST['button2']))
{
	$Msg_Error = "";
	$LastName="";
	$FirstName="";
	$Age ="";

	if ( $reservation->GetLengthPass() < $reservation->GetPlace())         
	{
		if (preg_match("#[A-Za-z]+#", $_POST['LastName']) && preg_match("#[A-Za-z]+#", $_POST['FirstName']))
		{
			
			$passager = new Passager ($_POST['LastName'], $_POST['FirstName'], $_POST['Age']); 

			$reservation->AddPass($passager);

			$_SESSION['reservation'] = serialize($reservation) ;
			

			if ( $reservation->GetLengthPass() < ($reservation->GetPlace()))
			{	
				$_SESSION['LengthPass']= $reservation->GetLengthPass() + 1;
				include 'Passager.php';
			}
	
			else
			{
				if ($reservation->Get18Years() == 0)	 
				{
					$Msg_Error = "Au moins un des passagers doit être âgé de minimum 18 ans.";
					include 'Passager.php';
				}

				else 
				{
					include 'Controller_Validation.php'; 
				}
			}	
		}

		else
		{
			$Msg_Error= "Nom et/ou prénom incorrecte(s), veuillez recommencer.";
			include 'Passager.php';
		}
	}


	// code exécuté pour le reste des passagers lors d'un retour en arrière
	else   
	{
		if ($_SESSION['LengthPass'] < $reservation->GetPlace() )  // lengthpass : variable créée pour se repérer lors des retour en arrière
		{	
			if (preg_match("#[A-Za-z]+#", $_POST['LastName']) && preg_match("#[A-Za-z]+#", $_POST['FirstName']))
			{
				$reservation->SetPass($_SESSION['LengthPass']-1, $_POST['LastName'], $_POST['FirstName'], $_POST['Age']);
				$_SESSION['reservation'] = serialize($reservation) ;
			
				$_SESSION['LengthPass'] ++;
				$pass = $reservation->GetArray()[$_SESSION['LengthPass']-1];
				$LastName = $pass->GetLastName();
				$FirstName = $pass->GetFirstName();
				$Age = $pass->GetAge();
				include 'Passager.php';
		    }

		    else
		    {
		    	$Msg_Error= "Nom et/ou prénom incorrecte(s), veuillez recommencer.";
				include 'Passager.php';
		    }		
		}

		// enrejistre la dernière modification 
		else
		{
			$reservation->SetPass($_SESSION['LengthPass']-1, $_POST['LastName'], $_POST['FirstName'], $_POST['Age']); 
			$_SESSION['reservation'] = serialize($reservation) ;
			include 'Controller_Validation.php'; 
		}
	}
}

// code exécuté pour le 1er passager lors d'un retour en arrière
if (isset($_POST['precedent']))   
{
	$_SESSION['LengthPass'] = 1;
	$_SESSION['reservation'] = serialize($reservation) ;

	$pass = $reservation->GetArray()[0];  // 1ere passager
	$LastName = $pass->GetLastName();
	$FirstName = $pass->GetFirstName();
	$Age = $pass->GetAge();

	include 'Passager.php';
}

?>