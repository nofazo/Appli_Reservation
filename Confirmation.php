<?php

include 'Modele.php';
$reservation = unserialize($_SESSION['reservation']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
	<h1>Confirmation des réservations</h1>
	<p>Votre demande a bien été enrejistrée. </br>
	   Merci de bien vouloir verser la somme de <?php echo ($reservation->GetTotalPrice()) ?> euros sur le compte 000-00000-00.
	</p>
</body>

	<input type="button"  value="Retour à la page d'accueil" onclick="location.href='Accueil.php'" > 
<form method="post" action="index.php?page=Admin">
	<input type="submit"  value="Admin"  > 
</form>
</html>