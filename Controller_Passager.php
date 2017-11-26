<?php

if (isset($_POST['button2']))
{
	$_SESSION['LastName'] = $_POST['LastName'];
	$_SESSION['FirstName'] = $_POST['FirstName'];
	$_SESSION['Age'] = $_POST['Age'];



	include 'Validation.php';

}


//créer l'objet passager avec variables de session aussi
//c'est ici qu'il faut faire la boucle passager ! soit include "Passager.php", soit "validation.php"
?>