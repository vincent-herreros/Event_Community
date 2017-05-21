<?php
function selectAllEvents(){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Events');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

function selectEvent($id){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Users WHERE idEvent=:mail');
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
    $Event=selectEventByUser($titre, $idUser);
    $idEvent=$Event["idEvent"];
    echo $idEvent;
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

function selectEventByUser($titre, $idUser){
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
    /*require_once('pdo.php');
    $connexion = connexion();
    $chaine="";
    $i=1;
    foreach($motCles as $motCle) {
        if($i) {
            $chaine.="idMot=$motCle";
                $i=0;
        }
        else {
            $chaine.="AND idMot=$motCle";
        }
    }
    $sql="SELECT * FROM (SELECT * FROM Events E, Categorie C WHERE libelle=:type AND E.idCat=C.idCat)";
    if($chaine!=""){
        $sql.="INTERSECT (SELECT idEvent FROM caraterise WHERE ".$chaine.")";
    }
    $req = $connexion->query($sql);
    $date=$req->fetchAll();
    echo"hello";*/
}
?>