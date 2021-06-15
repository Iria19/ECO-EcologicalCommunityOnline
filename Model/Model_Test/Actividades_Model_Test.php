<?php

include_once './Model/Actividades_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';

//Clase de test del model de actividades
class Actividades_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {
   //nombre
    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70022', 'Nombre actividad no puede ser vacio', $array_resultados);

    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'culti%%', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70023', 'Nombre actividad formado por letras y espacios', $array_resultados);

    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'a', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70025', 'Nombre actividad más de dos caracteres', $array_resultados);

    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70024', 'Nombre actividad menos de 20 caracteres', $array_resultados);
    //fecha
    $atributos = array('fecha'=>'', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70027', 'La fecha no puede ser vacia', $array_resultados);

    $atributos = array('fecha'=>'202-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70028', 'La fecha debe seguir un formato de fecha', $array_resultados);

    $atributos = array('fecha'=>'2060-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70029', ' La fecha tiene que ser antes de 01/01/2050', $array_resultados);

    $atributos = array('fecha'=>'2020-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70030', 'La fecha tiene que ser posterior a 01/01/2021', $array_resultados);

    //validado
    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70032', 'Validado no puede ser vacio', $array_resultados);
    
    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'Puede');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70033', 'Validado tiene que ser Si o No', $array_resultados);

    //Add
    $atributos = array('fecha'=>'2022-10-12', 'nombre'=>'cultivo', 'id_actividad'=>'1','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70001', 'Insercion correcto actividades', $array_resultados);

    $atributos = array('fecha'=>'2022-10-12','nombre'=>'cultivo', 'id_actividad'=>'121','username'=>'admin','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Add', $atributos, '70015', 'Actividad no exite add', $array_resultados);

    //Editar
    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'2022-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70004', 'Edición correcta actividades', $array_resultados);

    //fecha
    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70027', 'La fecha no puede ser vacia', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'202-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70028', 'La fecha debe seguir un formato de fecha', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'2060-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70029', ' La fecha tiene que ser antes de 01/01/2050', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'2020-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70030', 'La fecha tiene que ser posterior a 01/01/2021', $array_resultados);

    //nombre
    $atributos = array('id_actividades'=>'4','nombre'=>'','fecha'=>'2022-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70022', 'Nombre actividad no puede ser vacio', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'culti%%','fecha'=>'2022-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70023', 'Nombre actividad formado por letras y espacios', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'a','fecha'=>'2022-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70025', 'Nombre actividad más de dos caracteres', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'cultivaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaopru','fecha'=>'2022-10-12','validado'=>'No');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70024', 'Nombre actividad menos de 20 caracteres', $array_resultados);

    //valido
    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'2022-10-12','validado'=>'');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70032', 'Validado no puede ser vacio', $array_resultados);

    $atributos = array('id_actividades'=>'4','nombre'=>'cultivopru','fecha'=>'2022-10-12','validado'=>'Puede');
    $array_resultados =self::test_accion('Actividades', 'Edit', $atributos, '70033', 'Validado tiene que ser Si o No', $array_resultados);

    //Eliminar
	
    $atributos = array('id_actividades'=>'3');
    $array_resultados =self::test_accion('Actividades', 'Delete', $atributos, '70006', 'Eliminación correcta actividades', $array_resultados);

    $atributos = array('id_actividades'=>'2');
    $array_resultados =self::test_accion('Actividades', 'Delete', $atributos, '700008', 'Eliminación erronea actividades.Actividades tiene documentacion', $array_resultados);

    //Buscar
    $atributos = array('id_actividad'=>'1');
    $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70008', 'Busqueda correcta actividades', $array_resultados);
    
    $atributos = array('fecha'=>'2022-10-12');
    $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70008', 'Busqueda correcta actividades', $array_resultados);

    $atributos = array('nombre'=>'cultivo');
    $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70008', 'Busqueda correcta actividades', $array_resultados);

   //fecha

   $atributos = array('fecha'=>'202-10-12');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70028', 'La fecha debe seguir un formato de fecha', $array_resultados);

   $atributos = array('fecha'=>'2060-10-12');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70029', ' La fecha tiene que ser antes de 01/01/2050', $array_resultados);

   $atributos = array('fecha'=>'2020-10-12');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70030', 'La fecha tiene que ser posterior a 01/01/2021', $array_resultados);

   //nombre
   $atributos = array('nombre'=>'culti%%');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70023', 'Nombre actividad formado por letras y espacios Search', $array_resultados);

   $atributos = array('nombre'=>'cultivaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaopru');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70024', 'Nombre actividad menos de 20 caracteres Search', $array_resultados);

   //id_actividad
   $atributos = array('id_actividad'=>'34');
   $array_resultados =self::test_accion('Actividades', 'Search', $atributos, '70015', 'El id de actividad tiene que existir', $array_resultados);




    $atributos = array('id_actividad'=>'1');
    $array_resultados =self::test_accion('Actividades', 'Searchusuariosactividades', $atributos, '70008', 'Busqueda correcta actividades.Searchusuariosactividades', $array_resultados);

    
    $atributos = array('username'=>'admin');
    $array_resultados =self::test_accion('Actividades', 'getAllUser', $atributos, '70008', 'Busqueda correcta actividades. getAllUser', $array_resultados);

    return $array_resultados;
}

function test_action_display() {
    $array_resultados = array();
    $array_resultados = $this->test_action($array_resultados);
    include_once './View/Test_View.php';
    new Test_View($array_resultados);
}

}
?>