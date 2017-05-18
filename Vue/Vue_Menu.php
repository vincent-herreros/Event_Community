<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper" style="background-color: #0092CA;">
            <a href="index.php" class="brand-logo grey-text text-darken-4" style="margin-left: 100px;">EventCommunity</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="eventpast.php">Events passés</a></li>
                <li><a href="eventcoming.php">Events à venir</a></li>
                <li><a href="#modal1">Rechercher</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>

        </div>
    </nav>
</div>
<ul class="side-nav" id="mobile-demo">
    <li><a href="eventpast.php">Events passés</a></li>
    <li><a href="eventcoming.php">Events à venir</a></li>
    <li><a href="#modal1">Rechercher</a></li>
    <li><a href="connexion.php">Connexion</a></li>
</ul>
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row" style="margin-bottom: 0px;">
            <form class="col s12" style="margin-bottom: 0px;">
                <div class="row">
                    <div class="input-field col s12">
                        <p>Type</p>
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
                        <div class="row" style="margin-left: 10px;">
                            <p>Entrez vos mots clés</p>
                            <div class="chip chips-placeholder">
                                <input id="input_text" type="text" data-length="10">
                                <label for="input_text">Input text</label>
                                <i class="close material-icons">close</i>
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