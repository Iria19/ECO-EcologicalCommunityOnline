<?php

include_once './Model/Proyecto_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';
//Clase de test de proyecto
class Proyecto_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {

    //nombre    
    $atributos = array( 'nombre'=>'', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'admin', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40017', 'Nombre proyecto vacío error', $array_resultados);

    $atributos = array( 'nombre'=>'Pro4353%poPruebaT', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'admin', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40018', 'Nombre proyecto solo alfabeticos espacio', $array_resultados);

    $atributos = array( 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'admin', 'id_grupo'=>'3');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40019', 'Nombre proyecto tamaño máximo error ', $array_resultados);

    $atributos = array( 'nombre'=>'x', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'admin', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40020', 'Nombre proyecto tamaño minimo error ', $array_resultados);
    
    //descripcion
    
    $atributos = array('nombre'=>'proytest', 'descripcion'=>'Proyecto creado para probar prueba editar AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'responsable_proyecto'=>'admin', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40033', 'Descripcion tamaño máximo error', $array_resultados);

    $atributos = array('nombre'=>'proytest', 'descripcion'=>'(%proyecto)', 'responsable_proyecto'=>'admin', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40032', 'Descripcion solo letras espacios numeros especiales', $array_resultados);
    
    //responsable vacio
    
    $atributos = array('nombre'=>'proytest', 'descripcion'=>'Proyecto creado para probar prueba editar ', 'responsable_proyecto'=>'', 'id_grupo'=>'2');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40035', 'Responsable proyecto vacio', $array_resultados);
   
    // id_grupo no es necesario probar ya que al usuario se le muestra un deslagable y no introduce datos incorrecto
    
    //Add
    $atributos = array('nombre'=>'proytest', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_proyecto'=>'admin','id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40001', 'Insercion correcto proyecto', $array_resultados);
    
    $atributos = array('nombre'=>'proytestte', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_proyecto'=>'admin','id_grupo'=>'12');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40029', 'Identificador grupo no existe', $array_resultados);

    //No se puede realizar inserción erronea de forma natural porque id es autoincrement , el usuario no lo introduca

    $atributos = array( 'nombre'=>'ProyPruebaT', 'descripcion'=>'Grupo creado para probar', 'responsable_proyecto'=>'admin','id_grupo'=>'');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40021', 'Nombre proyecto existente add', $array_resultados);

    $atributos = array( 'nombre'=>'proytestre', 'descripcion'=>'Grupo creado para probar', 'responsable_proyecto'=>'randomresponsable','id_grupo'=>'');
    $array_resultados =self::test_accion('Proyecto', 'add', $atributos, '40025', 'Responsable del proyecto no existe add', $array_resultados);

    
    //Editar
    $atributos = array('id_proyecto'=>'1', 'nombre'=>'ProyPruebaT', 'descripcion'=>'Proyecto creado para probar prueba editar', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40005', 'Edición correcta', $array_resultados);

    $atributos = array('id_proyecto'=>'2','nombre'=>'ProyPruebaT', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'admin');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40021', 'Nombre proyecto existente Edit', $array_resultados);

    $atributos = array( 'id_proyecto'=>'2','nombre'=>'proytre', 'descripcion'=>'Proyecto creado para probar', 'responsable_proyecto'=>'randomresponsable','id_grupo'=>'');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40025', 'Responsable del proyecto no existe add', $array_resultados);

    //nombre
    $atributos = array('id_proyecto'=>'1', 'nombre'=>'', 'descripcion'=>'Proyecto creado para probar prueba editar', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40017', 'Nombre proyecto vacío error Edit', $array_resultados);

    $atributos = array('id_proyecto'=>'1', 'nombre'=>'Pro4353%poPruebaT', 'descripcion'=>'Proyecto creado para probar prueba editar', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40018', 'Nombre proyecto solo alfabeticos espacio Edit', $array_resultados);

    $atributos = array('id_proyecto'=>'1', 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'descripcion'=>'Proyecto creado para probar prueba editar', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40019', 'Nombre proyecto tamaño máximo error Edit', $array_resultados);

    $atributos = array('id_proyecto'=>'1', 'nombre'=>'x', 'descripcion'=>'(%proyecto)', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40020', 'Nombre proyecto tamaño minimo error Edit', $array_resultados);

    //descripcion
    $atributos = array('id_proyecto'=>'1', 'nombre'=>'ProyPruebaT', 'descripcion'=>'Proyecto creado para probar prueba editar AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40033', 'Descripcion tamaño máximo error', $array_resultados);

    $atributos = array('id_proyecto'=>'1', 'nombre'=>'ProyPruebaT', 'descripcion'=>'(%proyecto)', 'responsable_proyecto'=>'imalvarez');
    $array_resultados =self::test_accion('Proyecto', 'Edit', $atributos, '40032', 'Descripcion solo letras espacios numeros especiales', $array_resultados);

    //Eliminar
	
    $atributos = array('id_proyecto'=>'2');
    $array_resultados =self::test_accion('Proyecto', 'Delete', $atributos, '40007', 'Eliminación correcta proyecto', $array_resultados);

    $atributos = array('id_proyecto'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'Delete', $atributos, '400009', 'Eliminación erronea proyecto tiene documentacion', $array_resultados);

   
    //Buscar
    $atributos = array('nombre'=>'ProyPruebaT');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40009', 'Busqueda correcta proyecto', $array_resultados);
    
    $atributos = array('responsable_proyecto'=>'admin');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40009', 'Busqueda correcta proyecto', $array_resultados);
   
    $atributos = array('id_grupo'=>'1');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40009', 'Busqueda correcta proyecto', $array_resultados);
   
    $atributos = array('id_grupo'=>'23');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40029', 'Id_grupo tiene que existir', $array_resultados);
    
       
    $atributos = array('nombre'=>'ao&f');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40018', 'Nombre proyecto solo alfabeticos espacio', $array_resultados);
       
    $atributos = array('nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40019', 'Nombre tamaño maximo Search', $array_resultados);
    
    $atributos = array('responsable_proyecto'=>'admi');
    $array_resultados =self::test_accion('Proyecto', 'Search', $atributos, '40025', 'Responsable tiene que existir', $array_resultados);
    
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