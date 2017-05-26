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
require ('Vue_Events.php');
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#EventC">Mes Evenements crées</a></li>
                <li class="tab col s3"><a href="#Inscri">Mes Inscriptions</a></li>
                <li class="tab col s3"><a href="#MyE">Mes Events finis</a></li>
                <li class="tab col s3"><a href="#MyI">Mes Infos</a></li>
            </ul>
        </div>
        <div id="EventC" class="col s12">
            <?php
                affichage(3);
            ?>
        </div>
        <div id="Inscri" class="col s12">
            <?php
                affichage(4);
            ?>
        </div>
        <div id="MyE" class="col s12">
            <?php
                affichage(5);
            ?>
        </div>
        <div id="MyI" class="col s12">
            <?php
                $cookieUser=$_COOKIE['cookieUser'];
                $user=selectCookieUser($cookieUser);
                echo "<p>".$user["nom"]."</p>";
            ?>
        </div>
    </div>
</div>

<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>