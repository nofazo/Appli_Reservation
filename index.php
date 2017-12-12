<?php 

session_start();

if (!empty($_GET['page']) && is_file('Controller_'.$_GET['page'].'.php'))
{
	include 'Controller_'.$_GET['page'].'.php';
}

else
{
	include 'Accueil.php';
}

?>