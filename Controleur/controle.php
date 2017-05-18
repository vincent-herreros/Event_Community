<?php
    require('Modele/pdo.php');
    require('Modele/Users.php');

    function connect(){
        if(isset($_COOKIE["cookieUser"])){
            $cookie=$_COOKIE['cookieUser'];
            if(!empty(selectCookieUser($cookie))){
                $codeCookie=substr(str_shuffle("0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN"),0,30);
                $user=selectCookieUser($cookie);
                setcookie("cookieUser", $codeCookie, time()+(3600), "/", '');
                updateCookie($user['idUser'], $codeCookie);
                return true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        }

    }

?>