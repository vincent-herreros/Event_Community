<?php
require('../Modele/Events.php');
    $idEvent=$_POST['idEvent'];
    setEventFini($idEvent);
    header("Location: ../mesevents.php");
?>