<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_Event_Past.php');
}
else{
    header("Location: connexion.php");
}
?>