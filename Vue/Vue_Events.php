<?php
require('Modele/Events.php');
function affichage($choix){
    $user=selectCookieUser($_COOKIE['cookieUser']);
    $events=array();
    if($choix==0){
        $events=selectAllEventsLimit(6);
    }
    elseif($choix==1){
        $events=selectAllEvents();
    }
    elseif ($choix==2){
        $events=selectEventFini();
    }
    elseif ($choix==3){
        $events=selectEventByUserAndFini($user["idUser"]);
    }
    elseif($choix==4){
        $eventsinscri=selectEventInscrit($user["idUser"]);
        foreach ($eventsinscri as $eventid){
            array_push($events,selectEvent($eventid["idEvent"]));
        }
    }
    elseif($choix==5){
        $events=selectEventFiniandParticipe($user["idUser"]);
    }
    elseif($choix==6){
        $k=1;
        while(isset($_GET["idEvent".$k.""])){
            array_push($events, selectEvent($_GET["idEvent".$k.""]));
            $k++;
        }
    }
    $i=1;
    $j=0;
    foreach($events as $event){
        $j++;
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
                                        <p>Lieu : ".$event["lieu"]."</p>
                                        <p>Nombre de participant : ".$event["nbparticipant"]."</p>
                                        <p>Date de l'évenement : ".$event["dateEvent"]."</p>
                                        <p>Heure de rendez-vous : ".$event["heure"]."</p>
                                    </div>
                                </div>";

        if($choix==1){
            echo "<form action=\"Controleur/Controleur_InscriptionEvent.php\" method=\"post\">
                    <p class=\"range-field\">
                        <input type=\"range\" name='nbpersonne' id=\"test5\" min=\"0\" max=\"100\" />
                    </p>
                    <button class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Submit
                        <i class=\"material-icons right\">send</i>
                    </button>
                </form>";
        }
        elseif ($choix==3){
            echo "<form action=\"Controleur/Controleur_MesEvents.php\" method=\"post\">
                    <div class=\"input-field col s12\">
                        <textarea id=\"textarea1\" name=\"idE\" class=\"materialize-textarea disabled\" data-length=\"120\" style=\"visibility: hidden;\">".$event["idEvent"]."</textarea>
                    </div>
                    <button class=\"btn waves - effect waves - light\" type=\"submit\" name=\"action\">Submit
                        <i class=\"material - icons right\">send</i>
                    </button>
                </form>";
        }
        elseif ($choix==5) {
            echo "<form action=\"Controleur/Controleur_Event.php\" method=\"post\">
                    <div class=\"input-field col s12\">
                        <textarea id=\"textarea1\" name=\"idE\" class=\"materialize-textarea disabled\" data-length=\"120\" style=\"visibility: hidden;\">".$event["idEvent"]."</textarea>
                    </div>
                    <button class=\"btn waves - effect waves - light\" type=\"submit\" name=\"action\">Submit
                        <i class=\"material - icons right\">send</i>
                    </button>
                </form>";
        }

        echo "</div>
                    </div>
                 </div>";
        if(!$i or $j==sizeof($events)){
            echo"</div>";
            $i=1;
        }
        else{
            $i=0;
        }
    }
}

?>