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
    <?php
    require('Modele/Events.php');
    $i=1;
    while(isset($_GET["idEvent".$i.""])){
        $event=selectEvent($_GET["idEvent".$i.""]);
        if($i%2==1){
            echo "<div class=\"row\">";
        }
        echo "<div class=\"col s6\">
                    <div class=\"card\">
                        <div class=\"card-image waves-effect waves-block waves-light\">
                            <img class=\"activator\" src=\"Media/Images/chaton.jpg\">
                        </div>
                        <div class=\"card-content\">
                            <span class=\"card-title activator grey-text text-darken-4\">".$event["Titre"]."<i class=\"material-icons right\">more_vert</i></span>
                        </div>
                        <div class=\"card-reveal\">
                            <span class=\"card-title grey-text text-darken-4\">".$event["Titre"]."<i class=\"material-icons right\">close</i></span>
                            <p>".$event["Description"]."</p>
                        </div>
                    </div>
                 </div>";
        if($i%2==0){
            echo"</div>";
        }
        $i++;
    }
    ?>

</div>

<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>