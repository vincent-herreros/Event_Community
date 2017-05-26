<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EventCommunity</title>
    <?php
    require('Media/Config/Config_css.php');
    ?>
</head>
<body>
<?php
require('Vue_Menu.php');
$idEvent=$_GET['idEvent'];
?>
<div class="container">
        <?php
            require ('Modele/Events.php');
            $event=selectEvent($idEvent);
            echo "<h1>".$event["Titre"]."</h1>";
        ?>
    <div class="row" >
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#Des">Description</a></li>
                <li class="tab col s3"><a href="#Com">Commentaire</a></li>
                <li class="tab col s3"><a href="#Pho">Photos</a></li>
            </ul>
        </div>
        <div id="Des" class="col s12" style="margin-top: 2%;">
            <div class='row'>
                <?php
                echo"<div class='col s6'>
                    <p>".$event["Description"]."</p>
                </div>
                <div class='col s6'>
                    <p>Lieu : ".$event["lieu"]."</p>
                    <p>Nombre de participant : ".$event["nbparticipant"]."</p>
                    <p>Date de l'évenement : ".$event["dateEvent"]."</p>
                    <p>Heure de rendez-vous : ".$event["heure"]."</p>
                </div>";
                ?>
            </div>
        </div>
        <div id="Com" class="col s12" style="margin-top: 2%;">
            <?php
                require ('Modele/Com.php');
                $coms=selectAllComByEvent($idEvent);
            echo"<ul class=\"collection\">";
            foreach ($coms as $com){
                    $user=selectUserById($com["idUser"]);
                    echo"<li class=\"collection-item\">Note : ".$com["Note"]."</br>".$com['com']."</br>".$user['mail']."</li>";
                }
            echo "</ul>";
            ?>
            <div class="row">
                <form class="col s12" action="Controleur/Controleur_Com.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <p class="range-field">
                                <input type="range" name='note' id="test5" min="0" max="10" />
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">chat_bubble_outline</i>
                            <textarea id="textarea1" name="com" class="materialize-textarea" data-length="120"></textarea>
                            <label for="textarea1">Commentaire</label>
                        </div>
                    </div>
                    <div class="input-field col s12">
                    <?php
                     echo "<textarea id=\"textarea1\" name=\"idE\" class=\"materialize - textarea disabled\" data-length=\"120\" style=\"visibility: hidden;\">".$idEvent."</textarea>";
                    ?>
                    </div>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <div id="Pho" class="col s12" style="margin-top: 2%;">
            <?php
                require ('Modele/Photos.php');
                $photos=selectPhotos($idEvent);
                $i=1;
                $j=0;
                foreach ($photos as $photo){
                    $j++;
                    if($i){
                        echo "<div class=\"row\">";
                    }
                    echo" <div class='col s6'>
                                <img  class=\"responsive-img materialboxed\" width=\"\" src='Media/fichiers/".$idEvent."/".$photo["idPhoto"].".".$photo["extension"]."'>
                            </div>";
                    if($i==2 or $j==sizeof($photos)){
                        echo"</div>";
                        $i=1;
                    }
                    elseif($i==1){
                        $i=2;
                    }
                    else{
                        $i=0;
                    }
                }
            ?>
            <form method="post" action="Controleur/Controleur_Photo.php" enctype="multipart/form-data">
                <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Fichier</span>
                        <input name="mon_fichier"type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <?php
                echo "<textarea id=\"textarea1\" name=\"idE\" class=\"materialize - textarea disabled\" data-length=\"120\" style=\"visibility: hidden;\">".$idEvent."</textarea>";
                ?>
                <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>
<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>