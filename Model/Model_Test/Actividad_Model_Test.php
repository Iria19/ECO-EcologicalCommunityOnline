<?php
//Clase de pruebas del Model de Actividad

include_once './Model/Actividad_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';
class Actividad_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {

    //nombre    
    $atributos = array( 'nombre'=>'','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60017', 'Nombre grupo vacío error', $array_resultados);
    
    $atributos = array( 'nombre'=>'p%oPruebaT','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60018', 'Nombre grupo solo alfabeticos espacio', $array_resultados);
 
    $atributos = array( 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60019', 'Nombre grupo tamaño máximo error ', $array_resultados);

    $atributos = array( 'nombre'=>'x','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60020', 'Nombre grupo tamaño minimo error ', $array_resultados);


    //descripcion
    $atributos = array( 'nombre'=>'actividad','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60023', 'Descripcion tamaño máximo error', $array_resultados);
   
    $atributos = array( 'nombre'=>'actividad','ecoins'=>'4', 'descripcion'=>'(%actividad)', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60022', 'Descripcion solo letras espacios numeros especiales', $array_resultados);
    
    //ecoins
        $atributos = array( 'nombre'=>'actividad','ecoins'=>'', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
        $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60031', 'Ecoins vacio', $array_resultados);
       
        $atributos = array( 'nombre'=>'actividad','ecoins'=>'fe', 'descripcion'=>'actividad', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
        $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60032', 'Ecoins solo numeros', $array_resultados);
       //responsable
        $atributos = array( 'nombre'=>'actividad','ecoins'=>'2', 'descripcion'=>'Actividad creado para probar prueba', 'responsable_actividad'=>'', 'tipo'=>'exterior', 'id_grupo'=>'1');
        $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60028', 'Responsable actividad debe existir', $array_resultados);
       
    //tipo 
    $atributos = array( 'nombre'=>'actividad','ecoins'=>'2', 'descripcion'=>'Actividad creado para probar prueba', 'responsable_actividad'=>'admin', 'tipo'=>'pepe', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60035', 'Error tipo formato', $array_resultados);
   
    //Add
    $atributos = array( 'nombre'=>'actividad','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60001', 'Insercion correcto actividad', $array_resultados);

    //No se puede realizar inserción erronea de forma natural porque id es autoincrement , el usuario no lo introduca
    $atributos = array( 'nombre'=>'actividad','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60024', 'Nombre actividad existente add', $array_resultados);
   
    $atributos = array( 'nombre'=>'activids','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'randomresponsable', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60028', 'Responsable de la actividad no existe add', $array_resultados);

    $atributos = array( 'nombre'=>'dosactividad','ecoins'=>'6', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'109');
    $array_resultados =self::test_accion('Actividad', 'add', $atributos, '60038', 'Identificador de grupo no existe add', $array_resultados);

    //Editar
    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60004', 'Edición correcta', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'actividad','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60024', 'Nombre actividad existente Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'ActPru','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'randomresponsable', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60028', 'Responsable de la actividad no existe Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'addos','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'100');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60038', 'Identificador de grupo no existe Edit', $array_resultados);

    //nombre
    $atributos = array('id_actividad'=>'1', 'nombre'=>'','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60017', 'Nombre grupo vacío error Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'p%oPruebaT','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60018', 'Nombre grupo solo alfabeticos espacio Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60019', 'Nombre grupo tamaño máximo error Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'x','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60020', 'Nombre grupo tamaño minimo error Edit', $array_resultados);

    //descripcion
    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'4', 'descripcion'=>'ActividadAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60023', 'Descripcion tamaño máximo error Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'4', 'descripcion'=>'(%actividad)', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60022', 'Descripcion solo letras espacios numeros especiales Edit ', $array_resultados);

    //ecoins
    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60031', 'Ecoins vacio Edit', $array_resultados);

    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'fe', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'exterior', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60032', 'Ecoins deben ser solamente numeros', $array_resultados);


    //tipo
    $atributos = array('id_actividad'=>'1', 'nombre'=>'activi','ecoins'=>'4', 'descripcion'=>'Actividad creado para probar prueba editar ', 'responsable_actividad'=>'admin', 'tipo'=>'pepe', 'id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Edit', $atributos, '60035', 'Error tipo formato Edit', $array_resultados);

    //Eliminar
	
    $atributos = array('id_actividad'=>'6','id_grupo'=>NULL);
    $array_resultados =self::test_accion('Actividad', 'Delete', $atributos, '60006', 'Eliminación correcta actividad', $array_resultados);

    $atributos = array('id_actividad'=>'3','id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Delete', $atributos, '60041', 'Actividad tiene actividades', $array_resultados);

    $atributos = array('id_actividad'=>'6','id_grupo'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Delete', $atributos, '60042', 'Actividad tiene grupo', $array_resultados);


    //Buscar
    $atributos = array('nombre'=>'ActPru');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60008', 'Busqueda correcta actividad', $array_resultados);
    
    $atributos = array('tipo'=>'exterior');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60008', 'Busqueda correcta actividad', $array_resultados);
  
    $atributos = array('responsable_actividad'=>'admin');
    $array_resultados =self::test_accion('Actividad', 'ActividadResponsable', $atributos, '60008', 'Busqueda correcta actividad.Responsable_actividad', $array_resultados);

   
    $atributos = array('id_actividad'=>'1');
    $array_resultados =self::test_accion('Actividad', 'Seek_Ecoins', $atributos, '60011', 'Busqueda correcta actividad.Seek_Ecoins', $array_resultados);

    
    $atributos = array('id_grupo'=>'45');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60038', 'El id_grupo tiene que ser de un grupo existente Search', $array_resultados);

    
    $atributos = array('tipo'=>'alguno');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60035', 'El tipo tiene que ser uno correcto Search', $array_resultados);

    
    $atributos = array('nombre'=>'alalgunoalgunoalgunoalgunoalgunoalgunoalgunoalgunoalgunoguno');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60019', 'Error en el tamaño máximo Search', $array_resultados);

    
    $atributos = array('nombre'=>'p%oPruebaT');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60018', 'Nombre solo alfabeticos espacio Search', $array_resultados);

    $atributos = array('responsable_actividad'=>'alguien');
    $array_resultados =self::test_accion('Actividad', 'Search', $atributos, '60028', 'Responsable actividad tiene que existir', $array_resultados);

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