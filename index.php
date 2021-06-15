
<?php
include './Common/Auth.php';

include './View/includes.php';
//fichero intermedio por el que pasan todos

session_start();
$_SESSION['test'] = false;

if (is_authenticated()) {
  $requested_controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : '_Default';
  $requested_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '_Default';
  include './Controller/' . $requested_controller . '_Controller.php';
  $current_controller = new $requested_controller;
  $current_controller->$requested_action();
} else {
  if (!$_POST) {
    include './View/Dashboard_View.php';
    new Dashboard();
  } else {
    if ($_POST['controller'] === 'Registro') {
      if ($_REQUEST['action'] === 'formregistrar') {
        include './Controller/Registro_Controller.php';
        $registro = new Registro;
        $registro->formregistrar();
      } else {
        include './Controller/Registro_Controller.php';
        $registro = new Registro;
        $registro->registrar();
      }
    } else if ($_POST['controller'] === 'Login') {
      if ($_REQUEST['action'] === 'formulariologin') {

        include_once './Controller/Login_Controller.php';
        $login = new Login();
        $login->formulariologin();
      } else {
        include_once './Controller/Login_Controller.php';
        $login = new Login;
        $login->login();
      }
    } else if (($_POST['controller'] === 'Actividades') && ($_REQUEST['action'] === 'Showall')) {
      include_once './Controller/Actividades_Controller.php';
      $actividad = new Actividades();
      $actividad->showAll();
    } else if (($_POST['controller'] === 'Proyecto') && ($_REQUEST['action'] === 'showAll')) {
      include_once './Controller/Proyecto_Controller.php';
      $proyecto = new Proyecto();
      $proyecto->showAll();
    } else {
      include_once './Controller/Login_Controller.php';
      $login = new Login();
      $login->formulariologin();
    }
  }
}
?>
