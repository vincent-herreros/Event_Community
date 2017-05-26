<?php
function selectPhotos($idEvent){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Photos WHERE idEvent=:idEvent');
    $req->bindParam('idEvent', $idEvent);
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

function insertPhoto($idEvent, $idPhoto, $extension){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare("INSERT INTO Photos VALUES( :idPhoto,:extension, :idEvent)");
    $req->bindParam(':idPhoto', $idPhoto);
    $req->bindParam(':idEvent', $idEvent);
    $req->bindParam(':extension', $extension);
    $req->execute();
}

?>