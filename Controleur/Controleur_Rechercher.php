<?php
require('../Modele/Events.php');
    $type=$_POST["type"];
    $motCles=$_POST["tags"];
    if(empty($type)){
        echo"tous les champs ne sont pas remplis";
    }
    else{
        $motCles = explode(" ", $motCles);
        $datas=rechercheEvents($type, $motCles);
        echo "heu";
        $chaine="";
        $i=1;
        foreach ($datas as $data){
            if($chaine==""){
                $chaine.="?idEvent".$i."=".$data["idEvent"];
            }
            else{
                $chaine.="&idEvent".$i."=".$data["idEvent"];
            }
            $i++;
        }
        header("Location: ../resultat.php".$chaine);
    }
?>