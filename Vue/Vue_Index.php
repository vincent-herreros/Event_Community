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
?>
<div class="container">
    <div class="center-align" style="margin-top: 5%">
        <img class="responsive-img" src="Media/Images/logo2.png">
    </div>
    <div class="carousel carousel-slider center" data-indicators="true">
        <div class="carousel-item red white-text" href="#one!">
            <h2>First Panel</h2>
            <p class="white-text">This is your first panel</p>
        </div>
        <div class="carousel-item amber white-text" href="#two!">
            <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p>
        </div>
        <div class="carousel-item green white-text" href="#three!">
            <h2>Third Panel</h2>
            <p class="white-text">This is your third panel</p>
        </div>
        <div class="carousel-item blue white-text" href="#four!">
            <h2>Fourth Panel</h2>
            <p class="white-text">This is your fourth panel</p>
        </div>
    </div>
    <?php
        require('Modele/Events.php');
        $events=selectAllEventsLimit(6);
        $i=1;
        foreach($events as $event){
            if($i){
                echo "<div class=\"row\">";
            }
            echo "<div class=\"col s6\">
                    <div class=\"card\">
                        <div class=\"card-image waves-effect waves-block waves-light\">
                            <img class=\"activator\" src=\"Media/Images/chaton.jpg\">
                        </div>
                        <div class=\"card-content\">
                            <span class=\"card-title activator grey-text text-darken-4 center-align\">".$event["Titre"]."<i class=\"material-icons right\">more_vert</i></span>
                        </div>
                        <div class=\"card-reveal\">
                            <span class=\"card-title grey-text text-darken-4 center-align\">".$event["Titre"]."<i class=\"material-icons right\">close</i></span>
                                <div class='row'>
                                    <div class='col s6'>
                                        <p>".$event["Description"]."</p>
                                    </div>
                                    <div class='col s6'>
                                        <p>".$event["lieu"]."</p>
                                        <p>".$event["nbparticipant"]."</p>
                                        <p>".$event["dateEvent"]."</p>
                                        <p>".$event["heure"]."</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                 </div>";
            if($i){
                $i=0;
            }
            else{
                echo"</div>";
                $i=1;
            }
        }
    ?>
</div>
<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>