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
    <h1>Evénements futurs</h1>
    <?php
    require('Vue_Events.php');
    affichage(1);
    ?>

</div>
<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>