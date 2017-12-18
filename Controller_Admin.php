<?php

include 'Modele.php';

if (isset($_SESSION))
	session_destroy();

//Connection à la base de données
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

// si on veux consulter la page Admin
if (empty($_POST))
{
	include 'Admin.php';
}

// Si l'Admin souhaite soit supprimer soit éditer une réservation
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

			var_dump($_SESSION);


			include 'Reservation.php';
		}

		if(isset($_POST['Suppr'.$donnees['id']]))
		{
			$id = $donnees['id'];
            $sql = "DELETE FROM reservation WHERE id=$id";
            $bdd->exec($sql);
            include 'Admin.php';
		}
	}
}
?>