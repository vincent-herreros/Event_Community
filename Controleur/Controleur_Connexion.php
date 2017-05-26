<?php
    require("../Modele/Users.php");
    $mail=$_POST["email"];
    $pwd=$_POST["password"];
    if(empty($mail) || empty($pwd)){
        echo '<script>alert("vous n\'avez pas rempli tous les champs");</script>';
        header("Location: ../connexion.php");
    }
    else if(!(filter_var($mail, FILTER_VALIDATE_EMAIL))){
        echo '<script>alert("votre mail n\'est pas valide");</script>';
        header("Location: ../connexion.php");
    }
    else if(empty(selectUser($mail))){
        echo '<script>alert("aucun mail n\'est associé");</script>';
        header("Location: ../connexion.php");
    }
    else{
        $pwd=sha1(sha1($pwd));
        $user=selectUser($mail);
        if($pwd==$user['mdp']){
            $codeCookie=substr(str_shuffle("0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN"),0,30);
            setcookie("cookieUser", $codeCookie, time()+(3600), "/", '');
            updateCookie($user['idUser'], $codeCookie);
            header("Location: ../index.php");
        }
        else{
            echo '<script>alert("mot de passe erroné");</script>';
            header("Location: ../connexion.php");
        }
    }
?>