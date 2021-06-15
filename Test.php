
<?php
session_start();
$_SESSION['test'] = true;
$_SESSION['test_usuario'] = "imalvarez";

include './Common/Auth.php';

include './View/includes.php';

include 'View/header.php';

include_once './Model/Model_Test/Usuario_Model_Test.php';
include_once './Model/Model_Test/Grupo_Model_Test.php';
include_once './Model/Model_Test/Usuario_Grupo_Model_Test.php';
include_once './Model/Model_Test/Proyecto_Model_Test.php';
include_once './Model/Model_Test/Actividad_Model_Test.php';
include_once './Model/Model_Test/Actividades_Model_Test.php';
include_once './Model/Model_Test/Documentacion_Model_Test.php';
include_once './Model/Model_Test/Mensaje_Model_Test.php';

include_once './Model/Default_Model.php';


$usuario = new Usuario_Model_Test();
$grupo = new Grupo_Model_Test();
$proyecto = new Proyecto_Model_Test();
$actividad = new Actividad_Model_Test();
$actividades = new Actividades_Model_Test();

$usuariogrupo = new Usuario_Grupo_Model_Test();
$documentacion = new Documentacion_Model_Test();
$mensaje = new Mensaje_Model_Test();

unset($_SESSION['test_usuario']);

unset($_SESSION['test']);

include 'View/footer.php';

Default_Model::borra_db_test();
session_destroy();
?>