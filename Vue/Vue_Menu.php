<nav>
    <div class="nav-wrapper" style="background-color: white;">
        <a href="index.php" class="brand-logo grey-text text-darken-4 right" style="margin-left: 100px;">EventCommunity</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="color: black;">menu</i></a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="eventpast.php">Events passés</a></li>
            <li><a href="eventcoming.php">Events à venir</a></li>
            <li><a href="#modal1">Rechercher</a></li>
            <li><a href="creation.php">Créer un Event</a></li>
            <?php
            if(connect()){
                echo "<li><a href=\"connexion.php\">Déconnexion</a></li>";
            }
            else{
                echo "<li><a href=\"connexion.php\">Connexion</a></li>";
            }
            ?>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="eventpast.php">Events passés</a></li>
            <li><a href="eventcoming.php">Events à venir</a></li>
            <li><a href="#modal1">Rechercher</a></li>
            <li><a href="creation.php">Créer un Event</a></li>
            <?php
            if(connect()){
                echo "<li><a href=\"connexion.php\">Déconnexion</a></li>";
            }
            else{
                echo "<li><a href=\"connexion.php\">Connexion</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row" style="margin-bottom: 0px;">
            <form class="col s12" style="margin-bottom: 0px;">
                <div class="row">
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Choisissez votre type d'event</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 0px;">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="tags" class="materialize-textarea" data-length="120"></textarea>
                                <label for="textarea1">Ecrivez vos mots clés séparés par des espaces</label>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>