<?php
include "Modele.php";

$reservation = unserialize($_SESSION['reservation']);

if (isset($_POST['button2']))
{
	$_SESSION['LastName'] = $_POST['LastName'];
	$_SESSION['FirstName'] = $_POST['FirstName'];
	$_SESSION['Age'] = $_POST['Age'];


	if ( $reservation->GetLengthPass() < ($reservation->GetPlace()-1))         //Comprendre pourquoi '-1'
	{
		$passager = new Passager ($_SESSION['LastName'], $_SESSION['FirstName'], $_SESSION['Age']); // a-t-on besoin de serializer passager?

		$reservation->AddPass($passager);  //ajout du passager ds le tableau

		$_SESSION['reservation'] = serialize($reservation) ;


		include 'Passager.php';
	}
	
	else
	{
		include 'Validation.php'; //Renvoie au controller_Validation qui va traiter les données comme il faut et renvoyer la page html adéquate
	}
	

}


//créer l'objet passager avec variables de session aussi   ok
//c'est ici qu'il faut faire la boucle passager ! soit include "Passager.php", soit "validation.php"
?>