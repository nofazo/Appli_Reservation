<?php 

session_start();

//if (!isset($_SESSION['reservation']))    // à faire dans le controller
//{
//	$reserv = new Reservation();
//}
//else
//{
//	$reserv = unserialize($_SESSION['reservation']);
//}


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