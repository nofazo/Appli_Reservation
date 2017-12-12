<?php
include_once 'model/model.php';

if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['ID']) 
    $reservation = unserialize($_SESSION['ID']);

else
    //$reservation = new Reservation();
    echo "Pas d'objet reservation !";

?>