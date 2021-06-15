<?php

include_once './Model/Documentacion_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';

//clase de test del model de buscar
class Documentacion_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}

function test_action($array_resultados) {
    
    //Add
   $files= array( "name"=> "pruebaupload.txt" , "tmp_name"=> "/tmp/pruebaupload.txt");
   $ficheros =array('uploadedFile'=>$files);

   //add -actividad    
   $atributos = array('archivo'=>$ficheros, 'username'=>'admin', 'id_actividades'=>'4','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80001', 'Add documentacion actividad', $array_resultados);
 
    $atributos = array( 'archivo'=>$ficheros, 'username'=>'admin', 'id_actividades'=>'10','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80016', 'Actividad no existe', $array_resultados);

    //add -proyecto    
    $atributos = array( 'archivo'=>$ficheros, 'username'=>'admin', 'id_actividades'=>NULL,'id_proyecto'=>'3','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80001', 'Add documentacion proyecto', $array_resultados);
    
    $atributos = array( 'archivo'=>$ficheros, 'username'=>'admin', 'id_actividades'=>NULL,'id_proyecto'=>'11','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80019', 'Proyecto no existe', $array_resultados);

    //add- documentacion existente
    
    $files= array( "name"=> "pruebaupload.prueba" , "tmp_name"=> "/tmp/pruebaupload.txt");
    $ficherosmal =array('uploadedFile'=>$files);

    $atributos = array( 'archivo'=>$ficherosmal, 'username'=>'admin', 'id_actividades'=>NULL,'id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80021', 'Add selecionar o actividad o proyecto ', $array_resultados);

    //No existe usuario
    $atributos = array( 'archivo'=>$ficheros, 'username'=>'aaaaaaaaaaaaa', 'id_actividades'=>'4','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80026', 'Add usuario no existe', $array_resultados);
 

    //Add 
    $atributos = array( 'archivo'=>$ficherosmal, 'username'=>'admin', 'id_actividades'=>'4','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80023', 'Add Extension archivo no valida', $array_resultados);
    
    $atributos = array( 'archivo'=>$ficheros, 'username'=>'admin', 'id_actividades'=>'2','id_proyecto'=>'1','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'add', $atributos, '80021', 'Elegir o actividades o proyectos', $array_resultados); 
    

    //Editar
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>'4','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80004', 'Edit documentacion actividad', $array_resultados);
 
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>'4','id_proyecto'=>999999999,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80004', 'Edit documentacion actividad', $array_resultados);
    
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>999999999,'id_proyecto'=>'1','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80004', 'Edit documentacion actividad', $array_resultados);
 
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>NULL,'id_proyecto'=>'1','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80004', 'Edit documentacion actividad', $array_resultados); 

    
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>NULL,'id_proyecto'=>'1','validado'=>'');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80030', 'Validado no puede ser vacio', $array_resultados); 

    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>NULL,'id_proyecto'=>'1','validado'=>'Puede');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80029', 'Validado solo puede ser si o no Edit', $array_resultados); 

 
    $atributos = array( 'id_documentacion'=>'1','archivo'=>$ficheros, 'id_actividades'=>'92','id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80016', 'Actividad no existe', $array_resultados);
 
    $atributos = array( 'id_documentacion'=>'2','archivo'=>$ficheros, 'id_actividades'=>NULL,'id_proyecto'=>'17','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80019', 'Proyecto no existe', $array_resultados);
 
    
    $atributos = array( 'id_documentacion'=>'1','archivo'=>$ficheros, 'id_actividades'=>'2','id_proyecto'=>'1','validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80021', 'Elegir o actividades o proyectos', $array_resultados); 

    
    $atributos = array( 'id_documentacion'=>'1','archivo'=>$ficheros, 'id_actividades'=>NULL,'id_proyecto'=>NULL,'validado'=>'No');
    $array_resultados =self::test_accion('Documentacion', 'Edit', $atributos, '80021', 'Elegir o actividades o proyectos', $array_resultados); 
    //Eliminar
	
    $atributos = array('id_documentacion'=>'1',);
    $array_resultados =self::test_accion('Documentacion', 'Delete', $atributos, '80006', 'Eliminación correcta documentacion', $array_resultados);
   
    //Buscar
    $atributos = array('id_actividades'=>'1');
    $array_resultados =self::test_accion('Documentacion', 'Search', $atributos, '80008', 'Busqueda correcta documentacion', $array_resultados);
    
    $atributos = array( 'validado'=>'Puede');
    $array_resultados =self::test_accion('Documentacion', 'Search', $atributos, '80029', 'Validado solo puede ser si o no Search', $array_resultados); 

    
    $atributos = array( 'username'=>'Pep');
    $array_resultados =self::test_accion('Documentacion', 'Search', $atributos, '80026', 'El nombre del usuario debe existir', $array_resultados); 
    
    $atributos = array( 'id_actividades'=>'2','id_proyecto'=>'1',);
    $array_resultados =self::test_accion('Documentacion', 'Search', $atributos, '80021', 'Elegir o actividades o proyectos', $array_resultados); 
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