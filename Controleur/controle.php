<?php
    require('Modele/pdo.php');
    require('Modele/Users.php');

    function connect(){
        if(isset($_COOKIE["cookieUser"])){
            $cookie=$_COOKIE['cookieUser'];
            if(!empty(selectCookieUser($cookie))){
                $user=selectCookieUser($cookie);
                setcookie("cookieUser", $user['cookieUser'], time()+(3600), "/", '');
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