<?php

function selectParticipant($idEvent){
require_once('pdo.php');
$connexion = connexion();
$req = $connexion->prepare('SELECT * FROM participe WHERE idEvent=:idEvent');
$req->bindParam(':idEvent', $idEvent);
$req->execute();
$data = $req->fetchAll();
return $data;
}

?>