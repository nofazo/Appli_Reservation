<?php
include "Modele/Modele.php";

if (isset($_SESSION['reservation']))
    $reservation = unserialize($_SESSION['reservation']);

$Msg_Error="";

// creation and registration of passengers in the reservation object
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
				include 'View/Passager.php';
			}
			
			else
			{
				if ($reservation->Get18Years() == 0)	 
				{
					$Msg_Error = "Au moins un des passagers doit être âgé de minimum 18 ans.";
					include 'View/Passager.php';
				}

				else 
				{
					include 'Controler/Controler_Validation.php'; 
				}
			}	
		}

		else
		{
			$Msg_Error= "Nom et/ou prénom incorrecte(s), veuillez recommencer.";
			include 'View/Passager.php';
		}
	}


	//code executed for the rest of the passengers when we go back
	else   
	{
		if ($_SESSION['LengthPass'] < $reservation->GetPlace() )  // lengthpass : variable created in this case to spot ourself when we go back 
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
				include 'View/Passager.php';
		    }

		    else
		    {
		    	$Msg_Error= "Nom et/ou prénom incorrecte(s), veuillez recommencer.";
				include 'View/Passager.php';
		    }		
		}

		// save the last change
		else
		{
			$reservation->SetPass($_SESSION['LengthPass']-1, $_POST['LastName'], $_POST['FirstName'], $_POST['Age']); 
			$_SESSION['reservation'] = serialize($reservation) ;
			include 'Controler/Controler_Validation.php'; 
		}
	}
}

// code executed for the 1st passenger when going back
if (isset($_POST['precedent']))   
{
	$_SESSION['LengthPass'] = 1;
	$_SESSION['reservation'] = serialize($reservation) ;

	$pass = $reservation->GetArray()[0]; 
	$LastName = $pass->GetLastName();
	$FirstName = $pass->GetFirstName();
	$Age = $pass->GetAge();

	include 'View/Passager.php';
}

?>