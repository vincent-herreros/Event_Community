<?php
function selectAllComByEvent($idEvent){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Commentaire WHERE idEvent=:idEvent');
    $req->bindParam(':idEvent', $idEvent);
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

function insertionCom($idEvent, $idUser, $note, $com){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("INSERT INTO Commentaire VALUES('',  :note, :com, :idUser, :idEvent)");
    $value=array(':idUser'=>$idUser, ':idEvent'=>$idEvent, ':note'=>$note, ':com'=>$com);
    $req->execute($value);
}

?>