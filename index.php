<?php 
session_start(); 

if(isset($_SESSION['object']))
{
	$reservation = unserialize($_SESSION['object']);  // on supprime l'objet s'il existe (provenant d'une session précédente)
}



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



if (!empty($_GET['page']) && is_file('Controller_'.$_GET['page'].'.php'))
{
	include 'Controller_'.$_GET['page'].'.php';
}
else
{
	include 'Accueil.php';
}

//$_SESSION['object'] = serialize($reservation); // on enrejistre l'objet

?>