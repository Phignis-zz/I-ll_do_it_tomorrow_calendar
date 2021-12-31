<?php
    
    require_once("../config/config.php");
    require_once("../config/Autoloader.php");
    
    Autoloader::charger();
    // donner le namespace spécifié dans le fichier de la classe
    new IllDoTomorrowCalendar\controlleurs\FrontControler();
?>