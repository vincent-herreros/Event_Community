<?php
function selectAllEvents(){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Events WHERE etat=0 ORDER BY dateEvent');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

function selectAllEventsLimit($i){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM Events ORDER BY dateEvent LIMIT ".$i);
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

function selectEvent($id){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Events WHERE idEvent=:id ORDER BY dateEvent');
    $req->bindParam(':id', $id);
    $req->execute();
    $data = $req->fetch();
    return $data;
}

function creationEvent($titre, $type, $lieu, $nbParticipant, $dateEvent, $heure, $description, $idUser, $motCles){
    require_once('pdo.php');
    $connexion = connexion();
    $reqType = $connexion->prepare("SELECT idCat FROM Categorie WHERE libelle=:libelle");
    $reqType->bindParam(':libelle', $type);
    $reqType->execute();
    $idCat = $reqType->fetch()[0][0];
    $date1=date_create($dateEvent);
    $dateEvent=date_format($date1,'Y-m-d H:i:s');
    $req = $connexion->prepare("INSERT INTO Events VALUES ('', :titre, :nbParticipant, :lieu, :dateEvent, :heure, '0', :description, :idUser, :idCat)");
    $value=array(':titre'=>$titre, ':nbParticipant'=>$nbParticipant, ':lieu'=>$lieu, ':dateEvent'=>$dateEvent, 'heure'=>$heure, ':description'=>$description, ':idUser'=>$idUser, ':idCat'=>$idCat);
    $req->execute($value);
    $Event=selectEventByUserandTitre($titre, $idUser);
    $idEvent=$Event["idEvent"];
    foreach ($motCles as $motCle){
        insertionMotCle($motCle);
        insertionCaracterise($idEvent, $motCle);
    }
}

function insertionMotCle($motCle){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("INSERT INTO MotCle VALUES( :motCle)");
    $req->bindParam(':motCle', $motCle);
    $req->execute();
}

function insertionCaracterise($idEvent, $motCle){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("INSERT INTO caracterise VALUES( :motCle, :idEvent)");
    $req->bindParam(':motCle', $motCle);
    $req->bindParam(':idEvent', $idEvent);
    $req->execute();
}

function selectEventByUserandTitre($titre, $idUser){
    require_once('pdo.php');
    $connexion = connexion();
    $reqId = $connexion->prepare("SELECT * FROM Events WHERE Titre=:titre AND idUser=:idUser");
    $reqId->bindParam(':titre', $titre);
    $reqId->bindParam(':idUser', $idUser);
    $reqId->execute();
    $data=$reqId->fetch();
    return $data;
}

function rechercheEvents($type, $motCles){
    require_once('pdo.php');
    $connexion = connexion();
    $chaine="";
    $i=1;
    foreach($motCles as $motCle) {
        if($motCle!=" " && $motCle!=""){
            if($i) {
                $chaine.="caracterise.idMot=\"".$motCle."\"";
                $i=0;
            }
            else {
                $chaine.=" OR caracterise.idMot=\"".$motCle."\"";
            }
        }
    }
    $sql="SELECT DISTINCT idEvent FROM (SELECT DISTINCT Events.idEvent FROM Events INNER JOIN Categorie ON Events.idCat=Categorie.idCat WHERE Categorie.libelle=\"".$type ."\") E";
    if($chaine!=""){
        $sql.=" NATURAL JOIN (SELECT DISTINCT * FROM caracterise WHERE ".$chaine.") C";
    }
    $req = $connexion->prepare($sql);
    $req->execute();
    $data=$req->fetchAll();
    return $data;
}

function selectEventByUser($idUser){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM Events WHERE idUser=:idUser ORDER BY dateEvent");
    $req->bindParam(':idUser', $idUser);
    $req->execute();
    $data=$req->fetchAll();
    return $data;
}

function selectEventByUserAndFini($idUser){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM Events WHERE idUser=:idUser AND etat=0 ORDER BY dateEvent DESC");
    $req->bindParam(':idUser', $idUser);
    $req->execute();
    $data=$req->fetchAll();
    return $data;
}

function selectEventInscrit($idUser){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM participe WHERE idUser=:idUser");
    $req->bindParam(':idUser', $idUser);
    $req->execute();
    $idEvents=$req->fetchAll();
    if(!empty($idEvents)){
        $chaine="";
        $i=1;
        foreach($idEvents as $idEvent) {
            if($i) {
                $chaine.=" AND idEvent=".$idEvent["idEvent"]."";
                $i=0;
            }
            else {
                $chaine.=" OR idEvent=".$idEvent["idEvent"]."";
            }
        }
        $req2 = $connexion->prepare("SELECT * FROM Events WHERE etat=0".$chaine." ORDER BY dateEvent");
        $req2->execute();
        $data = $req2->fetchAll();
        return $data;
    }
    else{
        return array();

    }
}

function selectEventInscritAndFini($idUser){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM participe WHERE idUser=:idUser");
    $req->bindParam(':idUser', $idUser);
    $req->execute();
    $idEvents=$req->fetchAll();
    if(!empty($idEvents)){
        $chaine="";
        $i=1;
        foreach($idEvents as $idEvent) {
            if($i) {
                $chaine.=" AND idEvent=".$idEvent["idEvent"]."";
                $i=0;
            }
            else {
                $chaine.=" OR idEvent=".$idEvent["idEvent"]."";
            }
        }
        $req2 = $connexion->prepare("SELECT * FROM Events WHERE etat=1".$chaine." ORDER BY dateEvent");
        $req2->execute();
        $data = $req2->fetchAll();
        return $data;
    }
    else{
        return array();

    }
}

function setEventFini($idEvent){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("UPDATE Events SET etat=1 WHERE idEvent=:idEvent ORDER BY dateEvent DESC");
    $req->bindParam(':idEvent', $idEvent);
    $req->execute();
}

function selectEventFini(){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("SELECT * FROM Events WHERE etat=1 ORDER BY dateEvent DESC");
    $req->execute();
    $data=$req->fetchAll();
    return $data;
}

function inscriptionEvent($idUser, $idEvent, $nb){
    require_once('pdo.php');
    $connexion = connexion();
    $verif = $connexion->prepare("SELECT * FROM participe WHERE idEvent=:idEvent AND idUser=:idUser");
    $verif->bindParam(':idEvent', $idEvent);
    $verif->bindParam(':idUser', $idUser);
    $verif->execute();
    $data2=$verif->fetchAll();
    if(empty($data2)){
        $req = $connexion->prepare("INSERT INTO participe VALUES( :idUser, :idEvent, :nb)");
    }
    else{
        $req = $connexion->prepare("UPDATE participe SET nbParticipants=:nb WHERE idEvent=:idEvent AND idUser=:idUser");
    }
    $value=array(':idUser'=>$idUser, ':idEvent'=>$idEvent, ':nb'=>$nb);
    $req->execute($value);
    $data = selectEvent($idEvent);
    $nb=$nb+$data['nbparticipant']-$data2['nbParticipants'];
    $req2 = $connexion->prepare("UPDATE Events SET nbparticipant=$nb WHERE idEvent=:idEvent");
    $req2->bindParam(':idEvent', $idEvent);
    $req2->execute();

}

function selectEventFiniandParticipe($idUser){
    $eventFinis=selectEventFini();
    $events=array();
    foreach ($eventFinis as $eventFini){
        $eventPs=selectEventInscritAndFini($idUser);
        foreach($eventPs as $eventP) {
            if (!empty($eventP) and $eventFini['idEvent']==$eventP['idEvent']){
                array_push($events, $eventFini);
            }
        }
        $eventCs=selectEventByUser($idUser);
        foreach($eventCs as $eventC) {
            if (!empty($eventC) and $eventFini['idEvent']==$eventC['idEvent']){
                array_push($events, $eventFini);
            }
        }
    }
    return $events;
}
?>