<?php
require("Controleur/controle.php");
if(connect()){
    require('Vue/Vue_Index.php');
}
else{
    header("Location: connexion.php");
}
?>