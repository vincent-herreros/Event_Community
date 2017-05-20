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

function creationEvent($titre, $type, $lieu, $nbPaticipant, $date, $heure, $description, $idUser, $motCles){
    require_once('pdo.php');
    $connexion = connexion();
    $reqType = $connexion->prepare("SELECT idCat FROM Categorie WHERE libelle=:libelle");
    $reqType->bindParam(':libelle', $type);
    $reqType->execute();
    $idCat = $reqType->fetch();
    $req = $connexion->prepare("INSERT INTO Users VALUES ('', :titre, :nbParticipant, :lieu, :dateEvent, :heure, '0', :description, :idUser, :idCat)");
    $value=array(':titre'=>$titre, ':nbPaticipant'=>$nbPaticipant, ':lieu'=>$lieu, ':dateEvent'=>$date, 'heure'=>$heure, ':decription'=>$description, ':idUser'=>$idUser, ':idCat'=>$idCat);
    $req->execute($value);
    $reqId = $connexion->prepare("SELECT idEvent FROM Events WHERE Titre=:titre AND idUser:=idUser");
    $reqId->bindParam(':idEvent', $idEvent);
    $reqId->bindParam(':idUser', $idUser);
    $reqId->execute();
    $idEvent=$reqId->fetch();
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
?>