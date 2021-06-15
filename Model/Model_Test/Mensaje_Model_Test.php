<?php

include_once './Model/Mensaje_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';
//Clase de test del model de Mensaje
class Mensaje_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {
    //Titulo
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50018', 'El titulo no puede ser vacio', $array_resultados);
 
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'Hola&','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50019', 'El titulo tiene que ser letras o espacios', $array_resultados);
  
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'HolaHolaHolaHolaHolaHola','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50020', 'El tamaño maximo del titulo es 20', $array_resultados);
 
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'H','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50021', 'El tamaño minimo del titulo es 2', $array_resultados);
 
    //Cuerpo

    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'Hola','cuerpo'=>'Hola&&%%','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50023', 'El cuerpo solo permite letras, espacios y algunos caracteres especiales', $array_resultados);
 
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'Hola','cuerpo'=>'HolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHolaHola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50024', 'Tamaño maximo del cuerpo es 255 caracteres', $array_resultados);
 

    //Add
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarez', 'titulo'=>'Hola','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50001', 'Mensaje enviado correctamente', $array_resultados);
    
    $atributos = array( 'emisor'=>'admin', 'receptor'=>'imalvarezzzzzzzzz', 'titulo'=>'Hola','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50012', 'No existe receptor', $array_resultados);

    $atributos = array( 'emisor'=>'adminnnnnnnn', 'receptor'=>'imalvarez', 'titulo'=>'Hola','cuerpo'=>'Hola','leido'=>'No');
    $array_resultados =self::test_accion('Mensaje', 'add', $atributos, '50009', 'No existe emisor', $array_resultados);
     
   
    //Buscar
    $atributos = array( 'emisor'=>'admin');
    $array_resultados =self::test_accion('Mensaje', 'Search', $atributos, '50003', 'Busqueda correcta', $array_resultados);
    
    $atributos = array( 'titulo'=>'admi%n');
    $array_resultados =self::test_accion('Mensaje', 'Search', $atributos, '50019', 'El titulo tiene que ser letras o espacios', $array_resultados);

    $atributos = array( 'titulo'=>'HolaHolaHolaHolaHolaHola');
    $array_resultados =self::test_accion('Mensaje', 'Search', $atributos, '50020', 'El tamaño maximo del titulo es 20', $array_resultados);

    $atributos = array( 'emisor'=>'Hola');
    $array_resultados =self::test_accion('Mensaje', 'Search', $atributos, '50009', 'El emisor debe existir', $array_resultados);

    $atributos = array( 'receptor'=>'Hola');
    $array_resultados =self::test_accion('Mensaje', 'Search', $atributos, '50012', 'El receptor debe existir', $array_resultados);

    //Eliminar
    $atributos = array( 'id_mensaje'=>'1');
    $array_resultados =self::test_accion('Mensaje', 'Delete', $atributos, '50027', 'Eliminacion correcta', $array_resultados);

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