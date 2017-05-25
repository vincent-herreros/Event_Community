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
        <form class="col s12" action="Controleur/Controleur_CreationEvent.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">label_outline</i>
                    <input id="titre" name="titre" type="text" class="validate">
                    <label for="titre">Nom de l'évenement</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">turned_in_not</i>
                    <select id="type" name="type">
                        <option value="" disabled selected>Choisissez votre type d'event</option>
                        <?php
                        $categories=selectAllCategorie();
                        foreach($categories as $categorie){
                            echo"<option value=\"".$categorie['libelle']."\">".$categorie['libelle']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">star</i>
                    <textarea id="textarea1" name="tags" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Ecrivez vos mots clés séparés par des espaces</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <input id="lieu" name="lieu" type="text" class="validate">
                    <label for="lieu">Localisation de l'évenement</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="participant" name="participant" type="text" class="validate">
                    <label for="participant">Nombre de participant à l'évenement</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">today</i>
                    <input type="date" name="date" class="datepicker">
                    <label for="date">Date de l'évenement</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">schedule</i>
                    <p class="range-field">
                        <input type="range" id="test5" name="heure" min="0" max="24" />
                    </p>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">chat_bubble_outline</i>
                    <textarea id="textarea1" name="description" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
</div>


<?php
require('Media/Config/Config_js.php');
?>
</body>
</html>