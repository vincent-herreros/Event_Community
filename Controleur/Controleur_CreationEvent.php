<?php
    require('../Modele/Events.php');
    require('../Modele/Users.php');
    $titre=$_POST['titre'];
    $type=$_POST['type'];
    $motCles=$_POST['tags'];
    $lieu=$_POST['lieu'];
    $nbParticipant=$_POST['participant'];
    $date=$_POST['date'];
    $heure=$_POST['heure'];
    $description=$_POST['description'];
    $user=selectCookieUser($_COOKIE['cookieUser']);
    $motCles = explode(" ", $motCles);
    if(empty($titre) || empty($type) || empty($motCles) || empty($lieu) || empty($nbParticipant) || empty($date) || empty($description) || empty($heure)){
    echo "vous n'avez pas rempli tous les champs";
    }
    else{
        creationEvent($titre, $type, $lieu, $nbParticipant, $date, $heure, $description, $user["idUser"], $motCles);
        header("Location: ../index.php");
    }
?>