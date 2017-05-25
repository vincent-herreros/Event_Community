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
                                        <p>".$event["lieu"]."</p>
                                        <p>".$event["nbparticipant"]."</p>
                                        <p>".$event["dateEvent"]."</p>
                                        <p>".$event["heure"]."</p>
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