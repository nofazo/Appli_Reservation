<?php
include "Modele.php";
$reservation = unserialize($_SESSION['reservation']);

$Msg_Error="";

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

			$reservation->AddPass($passager);  //ajout du passager ds le tableau

			$_SESSION['reservation'] = serialize($reservation) ;
			

			if ( $reservation->GetLengthPass() < ($reservation->GetPlace()))  //màj liste (+1)
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

	else   // dans le cas du precedent 
	{
		//modifier les variables d'instances ensuite qd on a fait le tour de toute la liste: renvoyer vers Controller_Validation.php ne pas oublier regex
		if ($_SESSION['LengthPass'] < $reservation->GetPlace() )
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

		else
		{
			$reservation->SetPass($_SESSION['LengthPass']-1, $_POST['LastName'], $_POST['FirstName'], $_POST['Age']);  // enrejistrer la dernière modification
			$_SESSION['reservation'] = serialize($reservation) ;
			include 'Controller_Validation.php'; 
		}
	}
}

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