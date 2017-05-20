<?php
echo"hello";
    require('../Modele/Events.php');
    require('../Modele/Users.php');

    if(isset ($_POST['data'])){
        echo "ok";
    }
    else{
        $titre=$_POST['titre'];
        $type=$_POST['type'];
        $motCles=$_POST['tags'];
        $lieu=$_POST['lieu'];
        $nbParticipant=$_POST['participant'];
        $date=$_POST['date'];
        $heure=$_POST['heure'];
        $description=$_POST['description'];
        $user=selectCookieUser($_COOKIE['cookieUser']);
        print_r($type);
        echo "$titre, $lieu, $nbParticipant, $date, $heure, $description, $user";
    }
?>