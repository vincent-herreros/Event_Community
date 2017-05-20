<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">label_outline</i>
                    <input id="titre" type="text" class="validate">
                    <label for="titre">Nom de l'évenemment</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">turned_in_not</i>
                    <select>
                        <option value="" disabled selected>Choisissez votre type d'event</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
            <div class="row col s12">
                <i class="material-icons prefix">star</i>
                <div class="chip chips-placeholder">
                    <input id="input_text" type="text" data-length="10">
                    <label for="input_text">Input text</label>
                    <i class="close material-icons">close</i>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input id="lieu" type="text" class="validate">
                    <label for="lieu">Localisation de l'évenemment</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="participant" type="text" class="validate">
                    <label for="participant">Nombre de participant à l'évenemment</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">today</i>
                    <input type="date" class="datepicker">
                    <label for="date">Date de l'évenemment</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">schedule</i>
                    <p class="range-field">
                        <input type="range" id="test5" min="0" max="24" />
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">chat_bubble_outline</i>
                    <textarea id="textarea1" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>


<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>