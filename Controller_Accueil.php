<?php
session_cache_limiter('private_no_expire, must-revalidate');

$Msg_Error = "";
$place = "";
$destination="";
$insurance = "NON";
include 'Reservation.php';     // à supprimer si cette page ne sert à rien dans le futur
?>