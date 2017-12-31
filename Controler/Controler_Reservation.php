<?php
include 'Modele/Modele.php';

if (isset($_SESSION['reservation']))
    $reservation = unserialize($_SESSION['reservation']);

// creation of the reservation object
if (isset($_POST['button']) && (!isset($_SESSION['id'])))
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


	$reservation = new Reservation($_POST['destination'], $_POST['place'], $_POST['insurance'], array(), $price) ; 
	$_SESSION['reservation'] = serialize($reservation) ;

	$_SESSION['LengthPass']= $reservation->GetLengthPass()+1;
	$LastName="";
	$FirstName="";
	$Age ="";
	$Msg_Error = ""; 
	include 'View/Passager.php';	
}

//if the user clicks on the 'previous' button
if (isset($_POST['precedent'])) 
{
	$reservation = unserialize($_SESSION['reservation']);
	$place = $reservation->GetPlace();
	$insurance = $reservation->GetInsurance();
	$destination = $reservation->GetDestination();
	include 'View/Reservation.php';
}


// if the admin wants to edit a reservation from the database
if(isset($_SESSION['id'])) 
{
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

	$reservation = new Reservation($_POST['destination'], $_POST['place'], $_POST['insurance'], array(), $price) ;


	$dbname='fazo';
	try
	{
	    $bdd = new PDO('mysql:host=localhost','root','');
	    $bdd->query("use $dbname");
	}

	catch(Exception $e)
	{
	  die('Erreur : '.$e->getMessage());
	}

	$id = $_SESSION['id'];

	$reponse = $bdd->query('SELECT * FROM reservation ');
	while ($donnees = $reponse->fetch()) 
	{
		if ($donnees['id'] = $id)
		{
			$nameArray = explode(',', $donnees['Name']);
			$ageArray = explode(',', $donnees['Age']);
			$LastNameArray = explode(',', $donnees['LastName']);
		}
		
	}

	//reconstruction of passenger objects
	for ($i=0; $i < count($nameArray) ; $i++) 
	{ 
		$LastName = $LastNameArray[$i];
		$FirstName = $nameArray[$i];
		$Age = $ageArray[$i];

		$passager = new Passager ($LastName, $FirstName, $Age); 
		$reservation->AddPass($passager);
	}

	$_SESSION['reservation'] = serialize($reservation) ;

	$_SESSION['LengthPass'] = 1;

	$pass = $reservation->GetArray()[0];  // first passenger
	$LastName = $pass->GetLastName();
	$FirstName = $pass->GetFirstName();
	$Age = $pass->GetAge();

	$Msg_Error ="";
	include 'View/Passager.php';
}
?>