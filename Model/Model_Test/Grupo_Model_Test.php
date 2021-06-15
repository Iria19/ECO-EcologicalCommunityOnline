<?php

include_once './Model/Grupo_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';

//Clase de test del model de grupo
class Grupo_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {

    //nombre    
    $atributos = array( 'nombre'=>'', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20018', 'Nombre grupo vacío error', $array_resultados);

    $atributos = array( 'nombre'=>'Gru4353%poPruebaT', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20019', 'Nombre grupo solo alfabeticos espacio', $array_resultados);

    $atributos = array( 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20020', 'Nombre grupo tamaño máximo error ', $array_resultados);

    $atributos = array( 'nombre'=>'x', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20021', 'Nombre grupo tamaño minimo error ', $array_resultados);


    //descripcion
    
    $atributos = array('nombre'=>'grupotest', 'descripcion'=>'Grupo creado para probar prueba editar AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20024', 'Descripcion tamaño máximo error', $array_resultados);

    $atributos = array('nombre'=>'grupotest', 'descripcion'=>'(%grupo)', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20023', 'Descripcion solo letras espacios numeros especiales', $array_resultados);
    
   
    //responsable grupo
    //El usuario selecciona el usuario entonces este existe o no existe, lo cual se prueba abajo   
    
    //Add
    $atributos = array('nombre'=>'grupotest', 'descripcion'=>'Grupo creado para probar prueba ', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20001', 'Insercion correcto grupo', $array_resultados);

    //No se puede realizar inserción erronea de forma natural porque id es autoincrement , el usuario no lo introduca
    /*
    $atributos = array('nombre'=>'grupopruebatest', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20003', 'Insercion erronea grupo', $array_resultados);
    
    $atributos = array('id_grupo'=>'1','nombre'=>'grupopruebatest', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20003', 'Insercion erronea grupo', $array_resultados);
    */
    $atributos = array( 'nombre'=>'GrupoPruebaT', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20004', 'Nombre grupo existente add', $array_resultados);

    $atributos = array( 'nombre'=>'grupottest', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'randomresponsable');
    $array_resultados =self::test_accion('Grupo', 'add', $atributos, '20029', 'Responsable del grupo no existe add', $array_resultados);

    //Editar
    $atributos = array('id_grupo'=>'1', 'nombre'=>'GrupoPruebaT', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20005', 'Edición correcta', $array_resultados);

    $atributos = array('id_grupo'=>'2','nombre'=>'GrupoPruebaT', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20004', 'Nombre grupo existente Edit', $array_resultados);

    $atributos = array('id_grupo'=>'2', 'nombre'=>'GrupruebaT', 'descripcion'=>'Grupo creado para probar', 'responsable_grupo'=>'randomresponsable');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20029', 'Responsable del grupo no existe add', $array_resultados);

    //Nombre
    $atributos = array('id_grupo'=>'1', 'nombre'=>'', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20018', 'Nombre grupo vacío error Edit', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'nombre'=>'$%$grupo', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20019','Nombre grupo solo alfabeticos espacio Edit', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20020','Nombre grupo tamaño máximo error Edit', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'nombre'=>'g', 'descripcion'=>'Grupo creado para probar prueba editar', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20021', 'Nombre grupo tamaño minimo error Edit', $array_resultados);

    //Descripcion
    $atributos = array('id_grupo'=>'1', 'nombre'=>'GrupoPruebaT', 'descripcion'=>'Grupo creado para probar prueba editar AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20024', 'Descripcion tamaño máximo error Edit', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'nombre'=>'GrupoPruebaT', 'descripcion'=>'Grupo /(%$', 'responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Edit', $atributos, '20023', 'Descripcion solo letras espacios numeros especiales Edit', $array_resultados);
    
   

    //Eliminar
	
    $atributos = array('id_grupo'=>'3');
    $array_resultados =self::test_accion('Grupo', 'Delete', $atributos, '20007', 'Eliminación correcta grupo', $array_resultados);

    $atributos = array('id_grupo'=>'1');
    $array_resultados =self::test_accion('Grupo', 'Delete', $atributos, '20032', 'Grupo tiene actividad', $array_resultados);

    $atributos = array('id_grupo'=>'2');
    $array_resultados =self::test_accion('Grupo', 'Delete', $atributos, '20034', 'Grupo tiene proyecto', $array_resultados);

   
    $atributos = array('id_grupo'=>'6');
    $array_resultados =self::test_accion('Grupo', 'Delete', $atributos, '20035', 'Grupo tiene usuarios', $array_resultados);
    //Buscar
    $atributos = array('nombre'=>'GrupoPruebaT');
    $array_resultados =self::test_accion('Grupo', 'Search', $atributos, '20009', 'Busqueda correcta grupo', $array_resultados);
    
    $atributos = array('responsable_grupo'=>'imalvarez');
    $array_resultados =self::test_accion('Grupo', 'Search', $atributos, '20009', 'Busqueda correcta grupo', $array_resultados);
    
    $atributos = array('responsable_grupo'=>'admi');
    $array_resultados =self::test_accion('Grupo', 'Search', $atributos, '20029', 'El responsable del grupo tiene que existir', $array_resultados);

   //nombre
   $atributos = array('nombre'=>'grupo%');
   $array_resultados =self::test_accion('Grupo', 'Search', $atributos, '20019', 'Nombre grupo solo alfabeticos espacio Search', $array_resultados);

   $atributos = array('nombre'=>'grupoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
   $array_resultados =self::test_accion('Grupo', 'Search', $atributos, '20020', 'Nombre grupo tamaño máximo error Search', $array_resultados);


   //Grupo es responsable
    $atributos = array('responsable_grupo'=>'admin');
    $array_resultados =self::test_accion('Grupo', 'GruposesResponsable', $atributos, '20036', 'El usuario es responsable de un grupo Search', $array_resultados);

    //Buscar id grupo
   /* 
    $atributos = array('id_grupo'=>'1');
    $array_resultados =self::test_accion('Grupo', 'Searchgroup', $atributos, '20009', 'Busqueda correcta grupo', $array_resultados);

    
    $atributos = array('id_grupo'=>'35');
    $array_resultados =self::test_accion('Grupo', 'Searchgroup', $atributos, '20010', 'Busqueda erronea grupo', $array_resultados);
*/
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