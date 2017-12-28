<?php 
if (!isset($_SESSION))
	session_start();


if (!empty($_GET['page']) && is_file('Controler/Controler_'.$_GET['page'].'.php'))
{
	include 'Controler/Controler_'.$_GET['page'].'.php';
}

else
{
	include 'View/Accueil.php';
}

?>