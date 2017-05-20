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
    <div class="carousel">
        <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
        <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
        <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
        <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
        <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
    </div>
    <?php
        for ($i=0;$i<6;$i++){
            echo "<div class=\"row\">";
            for ($j=0;$j<2;$j++){
                echo "<div class=\"col s6\">
            <div class=\"card\">
                <div class=\"card-image waves-effect waves-block waves-light\">
                    <img class=\"activator\" src=\"Media/Images/chaton.jpg\">
                </div>
                <div class=\"card-content\">
                    <span class=\"card-title activator grey-text text-darken-4\">Card Title<i class=\"material-icons right\">more_vert</i></span>
                </div>
                <div class=\"card-reveal\">
                    <span class=\"card-title grey-text text-darken-4\">Card Title<i class=\"material-icons right\">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
        </div>";
            }
        }
    ?>
</div>
<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>