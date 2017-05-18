<?php
    function selectAllUsers(){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM Users');
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }

    function selectUser($mail){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM Users WHERE mail=:mail');
        $req->bindParam(':mail', $mail);
        $req->execute();
        $data = $req->fetch();
        return $data;
    }

    function selectCookieUser($cookieUser){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('SELECT * FROM Users WHERE cookieUser=:cookieUser');
        $req->bindParam(':cookieUser', $cookieUser);
        $req->execute();
        $data = $req->fetch();
        return $data;
    }

    function updateCookie($idUser, $codeCookie){
        require_once('pdo.php');
        $connexion = connexion();
        $req = $connexion->prepare('UPDATE Users SET cookieUser=:cookieUsers WHERE idUser=:id');
        $req->bindParam(':cookieUsers', $codeCookie);
        $req->bindParam(':id', $idUser);
        $req->execute();
    }
?>