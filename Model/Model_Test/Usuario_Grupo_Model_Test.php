<?php

include_once './Model/Usuario_Grupo_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';
//clase de test de usuario grupo
class Usuario_Grupo_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {
   
    //No considere que fuese necesario validar los atributo ya que se le impide meter datos incorrectos
    //El usuario selecciona el usuario entonces este existe o no existe, lo cual se prueba abajo   
    
    //Add
    $atributos = array('id_grupo'=>'4', 'username'=>'admin', 'ecoins'=>'3', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30001', 'Insercion correcto grupo', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'5', 'tipo_participacion'=>'sigue');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30003', 'El usuario ya esta en el grupo', $array_resultados);


    $atributos = array('id_grupo'=>'1', 'username'=>'desconocido', 'ecoins'=>'3', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30020', 'Usuario no existe', $array_resultados);
    
    $atributos = array('id_grupo'=>'10', 'username'=>'desconocido', 'ecoins'=>'3', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30023', 'Grupo no existe', $array_resultados);

    
    $atributos = array('id_grupo'=>'4', 'username'=>'admin', 'ecoins'=>'', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30029', 'Los ecoins no pueden ser vacios', $array_resultados);

    
    $atributos = array('id_grupo'=>'10', 'username'=>'desconocido', 'ecoins'=>'as', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos, '30027', 'Ecoins tienen que ser numeros', $array_resultados);
    
    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'4', 'tipo_participacion'=>'');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos,  '30026', 'El tipo no puede ser vacio Edit', $array_resultados);
    
    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'5', 'tipo_participacion'=>'ambos');
    $array_resultados =self::test_accion('Usuario_Grupo', 'add', $atributos,  '30025', 'El tipo solo puede ser participa o sigue Edit', $array_resultados);

    //Editar
    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'3', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Edit', $atributos, '30004', 'Edición correcta', $array_resultados);


    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Edit', $atributos,'30029', 'Los ecoins no pueden ser vacios Edit', $array_resultados);
    
    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'sf', 'tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Edit', $atributos,  '30027', 'Ecoins tienen que ser numeros Edit', $array_resultados);

    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'4', 'tipo_participacion'=>'');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Edit', $atributos,  '30026', 'El tipo no puede ser vacio Edit', $array_resultados);
    
    $atributos = array('id_grupo'=>'1', 'username'=>'admin', 'ecoins'=>'5', 'tipo_participacion'=>'ambos');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Edit', $atributos,  '30025', 'El tipo solo puede ser participa o sigue Edit', $array_resultados);
    //Eliminar
	
    $atributos = array('id_grupo'=>'2','username'=>'admin' );
    $array_resultados =self::test_accion('Usuario_Grupo', 'Delete', $atributos, '30006', 'Eliminación correcta del usuario en el grupo', $array_resultados);

   
    //Buscar
    
    $atributos = array('id_grupo'=>'1');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Search', $atributos, '30008', 'Busqueda correcta del usuario en el grupo', $array_resultados);

    $atributos = array('tipo_participacion'=>'participa');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Search', $atributos, '30008', 'Busqueda correcta del usuario en el grupo', $array_resultados);
    
    $atributos = array('tipo_participacion'=>'ambos');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Search', $atributos, '30025', ' El tipo solo puede ser participa o sigue Search', $array_resultados);

    $atributos = array('ecoins'=>'sf');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Search', $atributos,  '30027', 'Ecoins tienen que ser numeros Search', $array_resultados);
    
    
    $atributos = array('username'=>'ser');
    $array_resultados =self::test_accion('Usuario_Grupo', 'Search', $atributos,  '30020', 'El usuario tiene que existir', $array_resultados);
    

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