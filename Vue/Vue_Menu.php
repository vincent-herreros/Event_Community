<nav>
    <div class="nav-wrapper" style="background-color: #eeeeee;">
        <a href="index.php" class="brand-logo grey-text text-darken-4 right" style="margin-left: 100px;"><img class="responsive-img" src="Media/Images/logo10.png" style="height: 100%"/></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="color: black;">menu</i></a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="eventpast.php">Events passés</a></li>
            <li><a href="eventcoming.php">Events à venir</a></li>
            <li><a href="#modal1">Rechercher</a></li>
            <li><a href="creation.php">Créer un Event</a></li>
            <?php
            if(connect()){
                echo "<li><a href=\"mesevents.php\">Mes Events</a></li>";
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
            <form class="col s12" action="Controleur/Controleur_Rechercher.php" method="post" style="margin-bottom: 0px;">
                <div class="row">
                    <div class="input-field col s12">
                        <select id="type" name="type">
                            <option value="" disabled selected>Choisissez votre type d'event</option>
                            <?php
                            require('Modele/Categorie.php');
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
                        <textarea id="textarea1" name="tags" class="materialize-textarea" data-length="120"></textarea>
                        <label for="textarea1">Ecrivez vos mots clés séparés par des espaces</label>
                    </div>
                </div>
                <button class="btn waves-effect" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</div>