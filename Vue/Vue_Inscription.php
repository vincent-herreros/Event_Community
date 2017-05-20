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
       <form class="col s12" action="Controleur/Controleur_Inscription.php" method="post">
           <div class="row">
               <div class="input-field col s6">
                   <i class="material-icons prefix">person_pin</i>
                   <input id="prenom" type="text" class="validate">
                   <label for="prenom">Prenom</label>
               </div>
               <div class="input-field col s6">
                   <i class="material-icons prefix">person_pin</i>
                   <input id="nom" type="text" class="validate">
                   <label for="nom">Nom</label>
               </div>
           </div>
           <div class="row">
               <div class="input-field col s12">
                   <i class="material-icons prefix">email</i>
                   <input id="email" type="email" class="validate">
                   <label for="email">Email</label>
               </div>
           </div>
           <div class="row">
               <div class="input-field col s12">
                   <i class="material-icons prefix">vpn_key</i>
                   <input id="password" type="password" class="validate">
                   <label for="password">Password</label>
               </div>
           </div>
           <div class="row">
               <div class="input-field col s12">
                   <i class="material-icons prefix">today</i>
                   <input id="age" type="text" class="validate">
                   <label for="age">Age</label>
               </div>
           </div>
           <div class="input-field col s12">
               <i class="material-icons prefix">phone</i>
               <input id="tel" type="tel" class="validate">
               <label for="tel">Telephone</label>
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