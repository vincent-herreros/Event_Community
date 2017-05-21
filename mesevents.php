<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_MesEvents.php');
}
else{
    header("Location: connexion.php");
}
?>