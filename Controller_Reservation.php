<?php
include 'Modele.php';


if (isset($_POST['button']))
{	
	$price = 0;

	if (isset($_POST['insurance']))
		$_POST['insurance'] = "TRUE";
	else
		$_POST['insurance'] = "FALSE";  

	switch ($_POST['destination']) 
	{
		case 'Marrakech':
			$price = 320;
			break;
		case 'Tanger':
			$price = 270;
			break;
		case 'Londres':
			$price = 100;
			break;
		case 'Malaisie':
			$price = 450;
			break;
		case 'Chine':
			$price = 500;
			break;
		case 'Canada':
			$price = 600;
			break;
		case 'Hawaï':
			$price = 700;
			break;
	}


	$reservation = new Reservation($_POST['destination'], $_POST['place'], $_POST['insurance'], array(), $price) ;  // pas besoin de controller les entrées je le fais dans le html
	$_SESSION['reservation'] = serialize($reservation) ;

	$Msg_Error = ""; // pas d'erreur si tout va bien dans 'passager.php'
	include 'Passager.php';
	

}



?>