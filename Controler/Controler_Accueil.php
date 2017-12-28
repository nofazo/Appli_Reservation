<?php
if(isset($_POST['Reserver']))
{
	$_SESSION['Edit'] = "FALSE";
	$Msg_Error = "";
	$place = "";
	$destination="";
	$insurance = "NON";
	include 'View/Reservation.php';
}

if (isset($_POST['Nouvelle_Reservation']))
{
	session_destroy();
	include 'View/Accueil.php';
}
?>