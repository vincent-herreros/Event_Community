<?php
function selectAllCategorie(){
    require_once('pdo.php');
    $connexion = connexion();
    $req = $connexion->prepare('SELECT * FROM Categorie');
    $req->execute();
    $data = $req->fetchAll();
    return $data;
}

?>