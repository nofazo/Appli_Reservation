<?php
include 'Modele.php';


if (isset($_SESSION['reservation']))    
{
	$reserv = unserialize($_SESSION['reservation']);
}


if (isset($_POST['button']))
{	
	$_SESSION['place'] = $_POST['place'];
	$_SESSION['destination'] = $_POST['destination'];

	if (isset($_POST['insurance']))
		$_SESSION['insurance'] = "TRUE";
	else
		$_SESSION['insurance'] = "FALSE";  


	$reservation = new Reservation($_SESSION['destination'], $_SESSION['place'], $_SESSION['insurance'], array()) ;  //les variables de session servent-elles réellement? si non : post suffit
	$_SESSION['reservation'] = serialize($reservation) ;



	include 'Passager.php';
}

//Créer l'objet reservation avec les variables de session


?>