<?php
require('../controller/Controller.php');
require('../controller/ControllerVaccin.php');
require('../controller/ControllerCentre.php');
require('../controller/ControllerPatient.php');

$query_string = $_SERVER['QUERY_STRING'];

parse_str($query_string, $param);

$action = htmlspecialchars($param["action"]);

$action = $param['action'];

unset($param['action']);

$args = $param;

switch ($action) {

  case "vaccinReadAll" :
  case "vaccinNew" :
  case "vaccinCreated" :
  case "vaccinMaj" :
  case "vaccinMaj2" :
  ControllerVaccin::$action();
  break;

  case "centreReadAll" :
  case "centreNew" :
  case "centreCreated" :
  ControllerCentre::$action();
  break;

  case "patientReadAll" :
  case "patientNew" :
  case "patientCreated" :
  ControllerPatient::$action();
  break;

  default:
  $action = "accueil";
  Controller::$action();
}
