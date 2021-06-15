<?php

include_once './Model/Usuario_Model.php';
include_once './Model/Model_Test/Default_Model_Test.php';

//Clase de test de usuario
class Usuario_Model_Test extends Default_Model_Test{

 var $errores_datos = array();

function __construct(){
    
    $this->test_action_display();
}



function test_action($array_resultados) {

    
    //username
    
    $atributos = array('username'=>'', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10023', 'Username vacío error', $array_resultados);

    $atributos = array('username'=>'imalvarez$', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10024', 'Username solo letras numeros', $array_resultados);

    $atributos = array('username'=>'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10026', 'Username tamaño máximo error', $array_resultados);

    $atributos = array('username'=>'im', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10025', 'Username tamaño mínimo error', $array_resultados);


    //nombre

    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10028', 'Nombre vacío error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose%', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10029', 'Nombre solo alfabeticos espacio', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10030', 'Nombre tamaño máximo error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'x', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '100031', 'Nombre tamaño minimo error', $array_resultados);

    //apellidos
    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10032', 'Apellidos vacío error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'marti%nez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10033', 'Apellidos solo alfabeticos espacio', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10034', 'Apellidos tamaño máximo error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'A', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '100035', 'Apellidos tamaño minimo error', $array_resultados);

    //contrasenha


    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10036', 'Contrasenha vacío error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10037', 'Contrasenha tamaño máximo error', $array_resultados);

    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'x', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '100038', 'Contrasenha tamaño minimo error', $array_resultados);

    
    //email
    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10039', 'Email vacío error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iria.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10040', 'Email formato email', $array_resultados);

    
    //descripcion
    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10044', 'Descripcion tamaño máximo error', $array_resultados);

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'(%iria)', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10043', 'Descripcion solo letras espacios numeros especiales', $array_resultados);
    
    //telefono

    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'Hola soy iamartinez', 'telefono'=>'6949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10046', 'Telefono formato telefono', $array_resultados);
        
    //tipo

    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'Hola soy iamartinez', 'telefono'=>'637267949', 'tipo'=>'', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10049', 'Tipo vacío error', $array_resultados);
        
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'Hola soy iamartinez', 'telefono'=>'637267949', 'tipo'=>'basico', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10050', 'Tipo formato tipo', $array_resultados);
   
    
    //DNI

    
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'Hola soy iamartinez', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'356098');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10052', 'DNI formato DNI', $array_resultados);
        
    $atributos = array('username'=>'iamartinez', 'contrasenha'=>'12345678', 'nombre'=>'Maria Jose', 'apellidos'=>'martinez', 'email'=>'iriapruebad@gmail.com', 'descripcion'=>'Hola soy iamartinez', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'12345678A');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10052', 'DNI formato DNI', $array_resultados);
    

    
    //Login
    $atributos = array('username'=>'admin', 'contrasenha'=>'25d55ad283aa400af464c76d713c07ad');
    $array_resultados =self::test_accion('Usuario', 'login', $atributos, '10003', 'login correcto', $array_resultados);

    
    $atributos = array('username'=>'UsuarioInexistente', 'contrasenha'=>'12345678');
    $array_resultados =self::test_accion('Usuario', 'login', $atributos, '10004', 'login erroneo', $array_resultados);

        
    $atributos = array('username'=>'admin', 'contrasenha'=>'123');
    $array_resultados =self::test_accion('Usuario', 'login', $atributos, '10005', 'login erroneo', $array_resultados);

    //Register
    $atributos = array('username'=>'irai', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'irai@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643212344', 'tipo'=>'estandar', 'DNI'=>'03432555N');
    $array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10000', 'Registro correcto', $array_resultados);

    $atributos = array('username'=>'admin', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iri@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643392344', 'tipo'=>'estandar', 'DNI'=>'42825009K');
    $array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10002', 'Registro erroneo', $array_resultados);

    $atributos = array('username'=>'imalvarezre', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'admin@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643298344', 'tipo'=>'estandar', 'DNI'=>'26983156Q');
    $array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10053', 'Email existente registrar', $array_resultados);

    $atributos = array('username'=>'analvarez', 'contrasenha'=>'12345678', 'nombre'=>'iriaDni', 'apellidos'=>'Gonzalez Martinez', 'email'=>'iriaGonzalez@gmail.com', 'descripcion'=>'Soy IraiDni', 'telefono'=>'643272344', 'tipo'=>'estandar', 'DNI'=>'35609734F');
    $array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10054', 'DNI existente registrar', $array_resultados);

    $atributos = array('username'=>'aalva', 'contrasenha'=>'12345678', 'nombre'=>'angelesDni', 'apellidos'=>'Alvarez Alvarez', 'email'=>'aalva@gmail.com', 'descripcion'=>'Soy aalva', 'telefono'=>'633422456', 'tipo'=>'estandar', 'DNI'=>'55018324R');
    $array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10055', 'Telefono existente registrar', $array_resultados);


    //Add
    $atributos = array('username'=>'iraiadd', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'iraai@gmail.com', 'descripcion'=>'Soy Irei', 'telefono'=>'637267949', 'tipo'=>'estandar', 'DNI'=>'72869963Y');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10009', 'Insercion correcto', $array_resultados);

    $atributos = array('username'=>'admin', 'contrasenha'=>'12345678', 'nombre'=>'iraai', 'apellidos'=>'Lopez Martinez', 'email'=>'irie@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643292344', 'tipo'=>'estandar', 'DNI'=>'45124774Q');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10011', 'Insercion erronea', $array_resultados);

    $atributos = array('username'=>'imalvarezemail', 'contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'admin@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643298344', 'tipo'=>'estandar', 'DNI'=>'96962113R');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10053', 'Email existente add', $array_resultados);

    $atributos = array('username'=>'analvarez', 'contrasenha'=>'12345678', 'nombre'=>'iriaDni', 'apellidos'=>'Gonzalez Martinez', 'email'=>'iriaGonzalez@gmail.com', 'descripcion'=>'Soy IraiDni', 'telefono'=>'643272344', 'tipo'=>'estandar', 'DNI'=>'35609734F');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10054', 'DNI existente add', $array_resultados);

    $atributos = array('username'=>'aalva', 'contrasenha'=>'12345678', 'nombre'=>'angelesDni', 'apellidos'=>'Alvarez Alvarez', 'email'=>'aalva@gmail.com', 'descripcion'=>'Soy aalva', 'telefono'=>'633422456', 'tipo'=>'estandar', 'DNI'=>'90247697K');
    $array_resultados =self::test_accion('Usuario', 'add', $atributos, '10055', 'Telefono existente add', $array_resultados);
   // $atributos = array('username'=>'admmin', 'contrasenha'=>'12345678', 'nombre'=>'iraai', 'apellidos'=>'Alvarez Martinez', 'email'=>'admin@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'643293344', 'tipo'=>'estandar', 'DNI'=>'60779608J');
    //$array_resultados =self::test_accion('Usuario', 'registrar', $atributos, '10053', 'Registro erroneo', $array_resultados);

    //Editar
    
   // $atributos = array('contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'irai@gmail.com', 'descripcion'=>'Soy Irai \ \;', 'telefono'=>'643212344',  'DNI'=>'03432555N');
    //$array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10014', 'Edición erronea', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10013', 'Edición correcta', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'admin@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656588344','tipo'=>'estandar',  'DNI'=>'75222476X');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10053', 'Email existente Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'659598344','tipo'=>'estandar',  'DNI'=>'35609734F');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10054', 'DNI existente Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'633422456','tipo'=>'estandar',  'DNI'=>'77703086R');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10055', 'Telefono existente Edit', $array_resultados);

    //contrasenha
    $atributos = array('username'=>'iraiadd','contrasenha'=>'', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10036', 'Contrasenha vacío error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'1234xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx5678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10037', 'Contrasenha tamaño máximo error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'x', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '100038', 'Contrasenha tamaño minimo error Edit', $array_resultados);

    //nombre
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10028', 'Nombre vacío error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'Maria Jose%', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10029', 'Nombre solo alfabeticos espacio Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'Mariaxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10030', 'Nombre tamaño máximo error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'x', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '100031', 'Nombre tamaño minimo error Edit', $array_resultados);


    //Apellidos
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10032', 'Apellidos vacío error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'marti%nez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10033', 'Apellidos solo alfabeticos espacio Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10034', 'Apellidos tamaño máximo error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'A', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '100035', 'Apellidos tamaño minimo error Edit', $array_resultados);

    //email
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10039', 'Email vacío error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10040', 'Email formato email Edit', $array_resultados);

    //descripcion
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'SAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10044', 'Descripcion tamaño máximo error Edit', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai (%iria)', 'telefono'=>'637267949','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10043', 'Descripcion solo letras espacios numeros especiales Edit', $array_resultados);

    //telefono
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'6949','tipo'=>'estandar',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10046', 'Telefono formato telefono', $array_resultados);


    //Tipo
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10049', 'Tipo vacío error', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'basico',  'DNI'=>'34279747H');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10050', 'Tipo formato tipo', $array_resultados);

    //DNI
    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'356098');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10052', 'DNI formato DNI', $array_resultados);

    $atributos = array('username'=>'iraiadd','contrasenha'=>'12345678', 'nombre'=>'irai', 'apellidos'=>'Alvarez Martinez', 'email'=>'emailoriginal@gmail.com', 'descripcion'=>'Soy Irai', 'telefono'=>'656598344','tipo'=>'estandar',  'DNI'=>'12345678A');
    $array_resultados =self::test_accion('Usuario', 'Edit', $atributos, '10052', 'DNI formato DNI', $array_resultados);


    //Eliminar
	
    $atributos = array('username'=>'irai');
    $array_resultados =self::test_accion('Usuario', 'Delete', $atributos, '10015', 'Eliminación correcta', $array_resultados);

    $atributos = array('username'=>'admin');
    $array_resultados =self::test_accion('Usuario', 'Delete', $atributos, '10074', 'Eliminación erronea. El usuario esta en grupo', $array_resultados);
 //$atributos = array('username'=>'& = pepe');
// $array_resultados =self::test_accion('Usuario', 'Delete', $atributos, '10016', 'Eliminación erronea', $array_resultados);
   
    //Buscar
    $atributos = array('username'=>'imalvarez');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10017', 'Busqueda correcta', $array_resultados);
    
    $atributos = array('telefono'=>'634422456');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10017', 'Busqueda correcta', $array_resultados);
    
    $atributos = array('username'=>'ir&/');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10024', 'Username solo letras y numeros Search', $array_resultados);
    
    $atributos = array('username'=>'iraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10026', 'Username tamaño máximo Search', $array_resultados);

    $atributos = array('nombre'=>'34Ei');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10029', 'Nombre solo letras y espacios Search', $array_resultados);

    $atributos = array('nombre'=>'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10030', 'Nombre tamaño maximo Search', $array_resultados);

    $atributos = array('apellidos'=>'marti%&ez');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10033', 'Apelidos caracteres', $array_resultados);
    
    $atributos = array('apellidos'=>'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAezaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10034', 'Apellidos tamaño maximo Search', $array_resultados);

    
    $atributos = array('email'=>'marti%&ez.com');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10040', 'Email contiene caracteres que no se corresponden al formato de buscar email', $array_resultados);

    
    $atributos = array('telefono'=>'mi numero');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10046', 'Telefono contiene caracteres que no se corresponden al formato de buscar telefono', $array_resultados);

    
    $atributos = array('DNI'=>'12%');
    $array_resultados =self::test_accion('Usuario', 'Search', $atributos, '100052', 'DNI contiene caracteres que no se corresponden al formato de buscar DNI', $array_resultados);

   // $atributos = array('username'=>'aaaaaaaaaaaaaaaa');
    //$array_resultados =self::test_accion('Usuario', 'Search', $atributos, '10018', 'Busqueda erronea', $array_resultados);

    
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