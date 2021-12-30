<?php
    require_once("../config/config.php");
    require_once("../config/autoloader.php");
    Autoloader::charger();
    new \Controlleurs\FrontControler();
?>