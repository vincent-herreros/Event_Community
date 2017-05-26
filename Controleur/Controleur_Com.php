<?php
require ('../Modele/Users.php');
require ('../Modele/Com.php');
$idEvent=$_POST['idE'];
$com=$_POST['com'];
$note=$_POST['note'];
$user=selectCookieUser($_COOKIE['cookieUser']);
insertionCom($idEvent,$user['idUser'], $note, $com);
header("Location: ../description.php?idEvent=".$idEvent);
?>


