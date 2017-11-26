<?php

if (isset($_POST['button']))
{	
	$_SESSION['place'] = $_POST['place'];
	$_SESSION['destination'] = $_POST['destination'];

	if (isset($_POST['insurance']))
		$_SESSION['insurance'] = "checked";
	else
		$_SESSION['insurance'] = "uncheked";   


	$place = $_SESSION['place'] ;
	$place += 1 ;

	include 'Passager.php';
}

//Créer l'objet reservation avec les variables de session


?>