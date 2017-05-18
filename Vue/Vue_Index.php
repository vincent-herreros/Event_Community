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

<div style="display: inline; vertical-align: top;">
    <div style="width: 5%;">
        <div class="row">
            <div class="col s12">
            </div>
        </div>
    </div>
    <div class="blank">

    </div>
    <div class="colonneEventPast">
        <div class="row enteteEventPast" style="background-color: #0092CA; margin-bottom: 0px;">
            <div class="col s10 offset-s1" style="background-color: #393E46; color: white;">
                <p class="flow-text center-align">Events passés</p>
                <p>

                </p>
            </div>
        </div>

        <?php
        foreach ($clients as $client){
            echo" <div class=\"row\" style=\"background-color: #0092CA; margin-bottom: 0px;\">
            <div class=\"col s12\" style=\"padding: 7%;\">
                <div class=\"card\">
                    <div class=\"card-image waves-effect waves-block waves-light\">
                        <img class=\"activator\" src=\"Media/Images/vtt.png\">
                    </div>
                    <div class=\"card-content\">
                        <span class=\"card-title activator grey-text text-darken-4\">Card Title<i class=\"material-icons right\">more_vert</i></span>
                        <p><a href=\"#\">".$client['mail']."</a></p>
                    </div>
                    <div class=\"card-reveal\">
                        <span class=\"card-title grey-text text-darken-4\">Card Title<i class=\"material-icons right\">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
        </div>";
        }
    ?>
        <div class="row footerEventPast" style="background-color: #0092CA; margin-bottom: 0px;">
            <div class="col s10 offset-s1">
                <p></p>
            </div>
        </div>
    </div>
    <div class="colonneEventComing">
        <div class="row enteteEventComing">
            <div class="col s10 offset-s1" style="background-color: #393E46; color: white;">
                <p class="flow-text center-align">Events prévus</p>
            </div>
        </div>
        <?php
        for($i=1;$i<=3;$i++){
            echo('<div class="row">
                <div class="col s10 offset-s1">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="Media/Images/vtt.png">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            <a class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a>

                        </div>
                    </div>
                </div>
            </div>');
        }
        ?>
    </div>
</div>

<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>