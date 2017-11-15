<?php 
if(!isset($_SESSION))
{
	session_start();

	if (isset($_POST['bouton']))
	{	
		$_SESSION['place'] = $_POST['place'];
		$_SESSION['destination'] = $_POST['destination'];

		if (isset($_POST['assurance']))
			$_SESSION['assurance'] = "checked";
		else
			$_SESSION['assurance'] = "uncheked";   

		//$place = $_SESSION['place'] ;
		//$destination = $_SESSION['destination'];
		//$assurance = $_SESSION['assurance'];
		$place = $_SESSION['place'] ;
		$place += 1 ;

		while ( $place != 0) 
		{
			
		}


		header("Location: Passager.php");
	}



	if (isset($_POST['bouton2']))
	{
		$_SESSION['Nom'] = $_POST['Nom'];
		$_SESSION['Prénom'] = $_POST['Prénom'];
		$_SESSION['Age'] = $_POST['Age'];

		//$Nom = $_SESSION['Nom'];
		//$Prénom = $_SESSION['Prénom'];
		//$Age = $_SESSION['Age'];

		header("Location: Validation.php");

	}


}
?>