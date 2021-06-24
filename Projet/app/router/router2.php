<?php
require('../controller/Controller.php');
require('../controller/ControllerVaccin.php');

$query_string = $_SERVER['QUERY_STRING'];

parse_str($query_string, $param);

$action = htmlspecialchars($param["action"]);

$action = $param['action'];

unset($param['action']);

$args = $param;

switch ($action) {

  case "vaccinReadAll" :
  case "vaccinCreate" :
  case "vaccinCreated" :
  case "vaccinUpdate" :
  case "vaccinUpdated" :
      ControllerVaccin::$action();
      break;

    default:
        $action = "accueil";
        Controller::$action();
}
