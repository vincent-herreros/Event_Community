<?php
require('../Modele/Events.php');
    $idEvent=$_POST['idEvent'];
    echo "hey";
    echo $idEvent;

    setEventFini($idEvent);
    //header("Location: ../mesevents.php");
?>