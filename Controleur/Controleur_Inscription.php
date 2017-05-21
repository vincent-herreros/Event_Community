<?php
    require("../Modele/Users.php");
    $email=$_POST["email"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $password=$_POST["password"];
    $tel=$_POST["tel"];
    $age=$_POST["age"];
    echo" salut";
    if(empty($email) || empty($nom) || empty($prenom) || empty($password) || empty($tel) || empty($age)){
        echo "vous n'avez pas rempli tous les champs";
    }
    else if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        echo "votre mail n'est pas valide";
    }
    else if(!empty(selectUser($email))){
        echo "email déjà existant";
    }
    else{
        $password=sha1(sha1($password));
        $codeCookie=substr(str_shuffle("0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN"),0,30);
        setcookie("cookieUser", $codeCookie, time()+(3600), "/", '');
        inscription($email, $nom, $prenom, $password, $age, $tel, $codeCookie);
        header("Location: ../index.php");
    }
?>