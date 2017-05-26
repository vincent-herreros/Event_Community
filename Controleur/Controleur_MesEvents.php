<?php
require('../Modele/Events.php');
    $idEvent=$_POST['idE'];
    setEventFini($idEvent);
    header("Location: ../mesevents.php");
?>