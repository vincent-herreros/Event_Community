<?php
require('../Modele/Events.php');
require ('../Modele/Users.php');
$idEvent=$_POST['idE'];
$nbpersonne=$_POST['nbpersonne'];
$user=selectCookieUser($_COOKIE['cookieUser']);
$user=$user['idUser'];
inscriptionEvent($user, $idEvent, $nbpersonne);
header("Location: ../mesevents.php");
?>