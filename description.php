<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_Description.php');
}
else{
    header("Location: connexion.php");
}
?>