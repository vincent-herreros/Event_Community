<?php
require('../Modele/Users.php');

print_r($_FILES);
if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['mon_fichier']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
//Créer un dossier 'fichiers/1/'
mkdir('fichier/', 0777, true);

//Créer un identifiant difficile à deviner
$id = selectCookieUser($_COOKIE["cookieUser"]);
$nom = md5(uniqid(rand(), true));
$chemin="fichier/".$id."/";
    if(!is_dir($chemin)){
        mkdir($chemin, 0777, true);
    }
$nomf="{$chemin}.{$nom}.{$extension_upload}";
$resulat=move_uploaded_file($_FILES['mon_fichier']['temp_name'],$nomf);
if($resulat) echo"transfert reussi";
?>