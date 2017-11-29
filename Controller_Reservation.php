<?php
include 'Modele.php';


if (isset($_POST['button']))
{	

	if (isset($_POST['insurance']))
		$_POST['insurance'] = "TRUE";
	else
		$_POST['insurance'] = "FALSE";  


	$reservation = new Reservation($_POST['destination'], $_POST['place'], $_POST['insurance'], array()) ;  //les variables de session servent-elles réellement? si non : post suffit
	$_SESSION['reservation'] = serialize($reservation) ;



	include 'Passager.php';
}



?>