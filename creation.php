<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_CreationEvent.php');
}
else{
    header("Location: connexion.php");
}
?>