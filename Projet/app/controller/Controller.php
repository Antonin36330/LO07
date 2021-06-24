<?php

require_once "../model/Model.php";

class Controller
{
    public static function accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        require($vue);
    }



}
