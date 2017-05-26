<?php
require('../Modele/Users.php');
require ('../Modele/Photos.php');
if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['mon_fichier']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$event=$_POST['idE'];
$nom = md5(uniqid(rand(), true));
$chemin="../Media/fichiers/".$event."/";
    if(!is_dir($chemin)){
        mkdir($chemin);
    }
$nomf="{$chemin}{$nom}.{$extension_upload}";
$resultat=move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$nomf);
if($resultat){
    echo"transfert reussi";
    insertPhoto($event, $nom, $extension_upload);
    header("Location: ../description.php?idEvent=".$event);
}
?>