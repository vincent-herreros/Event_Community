<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_Resultat.php');
}
else{
    header("Location: connexion.php");
}
?>