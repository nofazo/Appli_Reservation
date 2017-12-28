<?php

include 'Modele/Modele.php';

if (isset($_SESSION))
	session_destroy();

//Connection to the database
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

$reponse = $bdd->query('SELECT * FROM reservation');

// To visit the admin page
if (empty($_POST))
{
	include 'View/Admin.php';
}

// If Admin wants to delete or edit a reservation
if (!empty($_POST))
{
	while ($donnees = $reponse->fetch())
	{
		if(isset($_POST['Edit'.$donnees['id']]))
		{
			session_start();
			
			$nameArray = explode(',', $donnees['Name']);
			$place = count($nameArray);
			$insurance = $donnees['Insurance'];
			$destination = $donnees['Destination'];

			$_SESSION['LengthPass'] = 1;
			$_SESSION['id'] = $donnees['id'];
			$_SESSION['Edit'] = "TRUE";

			include 'View/Reservation.php';
		}

		if(isset($_POST['Suppr'.$donnees['id']]))
		{
			$id = $donnees['id'];
            $sql = "DELETE FROM reservation WHERE id=$id";
            $bdd->exec($sql);
            include 'View/Admin.php';
		}
	}
}
?>