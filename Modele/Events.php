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

?>