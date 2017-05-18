<?php
function connexion()
{
    try
    {
        $bd = new PDO('mysql:host=vincenthzhevent.mysql.db;dbname=vincenthzhevent;charset=utf8','vincenthzhevent','Zazou8306');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return($bd);
}
?>