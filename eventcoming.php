<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_Event_Coming.php');
}
else{
    header("Location: connexion.php");
}
?>