<?php
    require("../Modele/Users.php");
    $mail=$_POST["email"];
    $pwd=$_POST["password"];
    if(empty($mail) || empty($pwd)){
        echo "vous n'avez pas rempli tous les champs";
    }
    else if(!(filter_var($mail, FILTER_VALIDATE_EMAIL))){
        echo "votre mail n'est pas valide";
    }
    else if(empty(selectUser($mail))){
        echo "aucun mail n'est associé";
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
            echo "mdp erroné";
        }
    }
?>