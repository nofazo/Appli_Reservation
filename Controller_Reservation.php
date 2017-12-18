<?php
include 'Modele.php';

if (isset($_SESSION['reservation']))
    $reservation = unserialize($_SESSION['reservation']);

// Création de l'objet réservation
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
	include 'Passager.php';	
}

//si l'utilisateur clique sur le bouton 'précédent'
if (isset($_POST['precedent'])) 
{
	$reservation = unserialize($_SESSION['reservation']);
	$place = $reservation->GetPlace();
	$insurance = $reservation->GetInsurance();
	$destination = $reservation->GetDestination();
	include 'Reservation.php';
}


// si l'admin veut editer une réservation à partir de la base de données
if(isset($_SESSION['id'])) 
{
	if (isset($_POST['insurance']))
		$_POST['insurance'] = "TRUE";
	else
		$_POST['insurance'] = "FALSE";  

	var_dump($_SESSION);

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

	$reponse = $bdd->query('SELECT * FROM reservation WHERE id = $id');
	while ($donnees = $reponse->fetch()) 
	{
		if ($donnees['id'] = $id)
		{
			$nameArray = explode(',', $donnees['Name']);
			$ageArray = explode(',', $donnees['Age']);
			$FirstName = ' ';
		}
		
	}

	for ($i=0; $i < count($nameArray) ; $i++) 
	{ 
		$LastName = $nameArray[$i];
		$FirstName = ' ';
		$Age = $ageArray[$i];

		$passager = new Passager ($LastName, $FirstName, $Age); 
		$reservation->AddPass($passager);
	}

	$_SESSION['reservation'] = serialize($reservation) ;

	$_SESSION['LengthPass'] = 1;

	$pass = $reservation->GetArray()[0];  // 1ere passager
	$LastName = $pass->GetLastName();
	$FirstName = $pass->GetFirstName();
	$Age = $pass->GetAge();

	$Msg_Error ="";
	include 'Passager.php';


	

	//$sql = "UPDATE reservation SET nom='?', pseudo='?', sexe='?' WHERE id='?'";
	//	$req = $bdd->prepare($sql);
	//	$req->execute (array('id' => $id, 'nom' => $nom, 'pseudo' => $pseudo, 'sexe' => $sexe));
}


?>