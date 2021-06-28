<?php
require_once '../model/ModelPatient.php';

class ControllerPatient
{


    public static function patientReadAll()
    {
        $results = ModelPatient::getAll();

        include 'config.php';
        require($root . '/app/view/patient/all.php');
    }



    public static function patientNew()
    {
        include 'config.php';
        $vue = $root . '/app/view/patient/new.php';
        require($vue);
    }

    public static function patientCreated()
    {
        $results = ModelPatient::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
        );

        include 'config.php';
        $vue = $root . '/app/view/patient/new2.php';
        require($vue);
    }
}
