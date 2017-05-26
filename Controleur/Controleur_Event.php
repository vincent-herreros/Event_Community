<?php
require('../Modele/Events.php');
$idEvent=$_POST['idE'];
header("Location: ../description.php?idEvent=".$idEvent);
?>