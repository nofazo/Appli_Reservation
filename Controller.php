<?php 
if(!isset($_SESSION))
{
	session_start();

	if (isset($_POST['button']))
	{	
		$_SESSION['place'] = $_POST['place'];
		$_SESSION['destination'] = $_POST['destination'];

		if (isset($_POST['insurance']))
			$_SESSION['insurance'] = "checked";
		else
			$_SESSION['insurance'] = "uncheked";   

		//$place = $_SESSION['place'] ;
		//$destination = $_SESSION['destination'];
		//$assurance = $_SESSION['assurance'];
		$place = $_SESSION['place'] ;
		$place += 1 ;



		header("Location: Passager.php");
	}



	if (isset($_POST['button2']))
	{
		$_SESSION['LastName'] = $_POST['LastName'];
		$_SESSION['FirstName'] = $_POST['FirstName'];
		$_SESSION['Age'] = $_POST['Age'];

		//$Nom = $_SESSION['Nom'];
		//$Prénom = $_SESSION['Prénom'];
		//$Age = $_SESSION['Age'];

		header("Location: Validation.php");

	}


}
?>