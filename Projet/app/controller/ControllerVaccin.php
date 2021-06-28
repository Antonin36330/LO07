<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin
{

    public static function vaccinReadAll()
    {
        $vaccins = ModelVaccin::getAll();
        include 'config.php';
        $vue = $root . 'app/view/vaccin/all.php';
        require($vue);
    }

    public static function vaccinNew()
    {
        include 'config.php';
        $vue = $root . '/app/view/vaccin/new.php';
        require($vue);
    }

    public static function vaccinCreated()
    {
        $results = ModelVaccin::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));

        include 'config.php';
        $vue = $root . '/app/view/vaccin/new2.php';
        require($vue);
    }

    public static function vaccinMaj()
    {
        $vaccins = ModelVaccin::getAll();

        include 'config.php';
        $vue = $root . '/app/view/vaccin/maj.php';
        require($vue);
    }

    public static function vaccinMaj2()
    {
        $vaccin_id = $_GET['vaccin'];
        $doses = $_GET['doses'];
        $results = ModelVaccin::update($vaccin_id, $doses);

        include 'config.php';
        $vue = $root . '/app/view/vaccin/maj2.php';
        require($vue);
    }
}

?>
