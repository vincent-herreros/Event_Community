<?php
require('../Modele/Events.php');
require ('../Modele/Users.php');
$idEvent=$_POST['idEvent'];
$nbpersonne=$_POST['nbpersonne'];
$user=selectCookieUser($_COOKIE['cookieUser']);
$user=$user['idUser'];
inscriptionEvent($user, $idEvent, $nbpersonne);
header("Location: ../mesevents.php");
?>