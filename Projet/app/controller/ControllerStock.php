<?php
require_once '../model/ModelStock.php';

class ControllerStock
{

    public static function stockReadAll()
    {
        $query = "select centre.label as Label, sum(quantite) as Doses from stock, centre WHERE centre.id = stock.centre_id
group by label order by quantite DESC";
        $results = ModelStock::getAll($query);
        include 'config.php';
        require($root . '/app/view/stock/all.php');
    }

    public static function stockReadAllVaccin()
    {
        $query = "select centre.label as Label_centre, vaccin.label as Label_vaccin, quantite as Doses from stock, centre, vaccin
WHERE centre.id = stock.centre_id and vaccin.id = stock.vaccin_id and quantite != 0";
        $results = ModelStock::getAll($query);
        include 'config.php';
        require($root . '/app/view/stock/all.php');
    }

    public static function stockNew()
    {
        $results['centre'] = ModelCentre::getAll();
        $results['vaccin'] = ModelVaccin::getAll();
        include 'config.php';
        $vue = $root . '/app/view/stock/new.php';
        require($vue);
    }

    public static function stockNew2()
    {
        $doses = array();
        foreach ($_GET as $vaccin=>$value) {
            if (strcmp($vaccin, "action")!=0 && strcmp($vaccin,"stock")!=0) {
                if (!empty($value) && strcmp($value,"0")!=0) {
                    $doses[htmlspecialchars($vaccin)] = intval(htmlspecialchars($value));
                }
            }
        }
        $results = ModelStock::insert(htmlspecialchars($_GET['stock']), $doses);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/new2.php';
        require($vue);
    }





}
