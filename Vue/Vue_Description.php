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
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#Des">Description</a></li>
                <li class="tab col s3"><a href="#Com">Commentaire</a></li>
                <li class="tab col s3"><a href="#Pho">Photos</a></li>
            </ul>
        </div>
        <div id="Des" class="col s12">
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
        <div id="Com" class="col s12">
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
        <div id="Pho" class="col s12">
            <form method="post" action="Controleur/Controleur_Photo.php" enctype="multipart/form-data">
                <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" name="mon_fichier" id="mon_fichier" /><br />
                <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
                <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
                <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
                <textarea name="description" id="description"></textarea><br />
                <input type="submit" name="submit" value="Envoyer" />
            </form>
        </div>
    </div>
</div>
<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>