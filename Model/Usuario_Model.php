<?php

include_once './Model/Default_Model.php';
include_once './Model/Usuario_Model_Validaciones.php';

//Model de usuario
class Usuario_Model extends Default_Model {

    var $username;
    var $nombre;
    var $apellidos;
    var $contrasenha;
    var $email;
    var $descripcion;
    var $telefono;
    var $tipo;
    var $DNI;
    
    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->username = '';
        $this->nombre = '';
        $this->apellidos = '';
        $this->contrasenha = '';
        $this->email = '';
        $this->descripcion = '';
        $this->telefono = '';
        $this->tipo = '';
        $this->DNI = '';

        if ($_POST) {
            if (isset($_POST['username']))
                $this->username = $_POST['username'];
            if (isset($_POST['nombre']))
                $this->nombre = $_POST['nombre'];
            if (isset($_POST['apellidos']))
                $this->apellidos = $_POST['apellidos'];
            if (isset($_POST['contrasenha']))
                $this->contrasenha = $_POST['contrasenha'];
           if (isset($_POST['email']))
                $this->email = $_POST['email'];
            if (isset($_POST['descripcion']))
                $this->descripcion = $_POST['descripcion'];
            if (isset($_POST['telefono']))
                $this->telefono = $_POST['telefono'];
            if (isset($_POST['tipo']))
                $this->tipo = $_POST['tipo'];
            if (isset($_POST['DNI']))
                $this->DNI = $_POST['DNI'];
        }
    }

    //Rellenar atributos validaciones
    function rellenar_atributos($usuario_validaciones){
        $usuario_validaciones->username=$this->username;
        $usuario_validaciones->nombre=$this->nombre;
        $usuario_validaciones->apellidos=$this->apellidos;
        $usuario_validaciones->contrasenha=$this->contrasenha;
        $usuario_validaciones->email=$this->email;
        $usuario_validaciones->descripcion=$this->descripcion;
        $usuario_validaciones->telefono=$this->telefono;
        $usuario_validaciones->tipo=$this->tipo;
        $usuario_validaciones->DNI=$this->DNI;

    }

    //Comprobar existe contraseña
    function password_correcta() {
        $this->Seek();
        if ($this->get_result()['contrasenha'] === $this->contrasenha) {
            return true;
        } else {
            return false;
        }
    }

    //Comprobar existe usuario
    function existe_usuario() {
        $this->Seek();
        if ($this->feedback['code'] === '10007' )
            return true;
        else return false;
    }

    //Comprobar existe email
    function existe_email() {

        $this->seek_email();
        if ($this->feedback['code'] === '10060')
            return true;
        else return false;
    }

    //Comprobar existe DNI
    function existe_DNI() {

        $this->seek_DNI();
        if ($this->feedback['code'] === '10063')
            return true;
        else return false;
    }

    //Comprobar existe telefono

    function existe_telefono() {

        $this->seek_telefono();
        if ($this->feedback['code'] === '10066')
            return true;
        else return false;
    }

    //Comprobar existe actividad
    function existe_actividad() {

        $this->seek_existe_actividad();
        if ($this->feedback['code'] === '60011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '10069';
            return true;
        }
        return false;
    }

    //Buscar existe actividad
    function seek_existe_actividad() {
        $this->query = "
            SELECT * FROM actividad
            WHERE responsable_actividad = '$this->username';
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '60010';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '60011';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '60012';      // Error de obtención
        }
        return $this->feedback;
        
    }

    //Comprobar existe proyecto
    function existe_proyecto() {

        $this->seek_existe_proyecto();
        if ($this->feedback['code'] === '40011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '10073';
            return true;
        }
        return false;
    }

    //Buscar existe proyecto
    function seek_existe_proyecto() {
        $this->query = "
            SELECT * FROM proyecto
            WHERE responsable_proyecto = '$this->username';
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '40010';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '40011';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '40012';      // Error de obtención
        }
        return $this->feedback;

    }

    //Comprobar si existe usuario en grupo
    function existe_UsuarioGrupo() {

        $this->SeekUsuarioGrupo();
        if ($this->feedback['code'] === '30011'){
            return true;
        }
        return false;
    }

    //Buscar existe usuario en grupo
    function SeekUsuarioGrupo() {
        $this->query = "
        SELECT * FROM usuario_grupo
        WHERE username='$this->username'
    ";
    $this->get_results_from_query();
    if ($this->feedback['ok']){                     // Éxito en la obtención
        if ($this->feedback['code'] == '00002') {   // Vuelve vacío
            $this->feedback['code'] = '30010';
        } else {                                    // Vuelve con datos
            $this->feedback['code'] = '30011';
        }
    } else {
        if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
            $this->feedback['code'] = '30012';      // Error de obtención
    }
    return $this->feedback;
        
    }

    //Comprobar existe ectividades
    function existe_actividades() {

        $this->seek_existe_actividades();
        if ($this->feedback['code'] === '70011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '10071';
            return true;
        }
        return false;
    }

    //Buscar existe ectividades
    function seek_existe_actividades() {
        $this->query = "
            SELECT * FROM actividades
            WHERE username = '$this->username';
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '70010';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '70011';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '70012';      // Error de obtención
        }
        return $this->feedback;

    }

    //Buscar usuario concreto
    function Seek() {
            $this->query = "
                SELECT * FROM usuario
                WHERE username = '$this->username';
            ";
            $this->get_one_result_from_query();
            if ($this->feedback['ok']){                     // Éxito en la obtención
                if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                    $this->feedback['code'] = '10006';
                } else {                                    // Vuelve con datos
                    $this->feedback['code'] = '10007';
                }
            } else {
                if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                    $this->feedback['code'] = '10008';      // Error de obtención
            }
            return $this->feedback;
        
    }

    //Comprueba si existe email si no es el del usuario actual
    function seek_email() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);


        if ($usuario_validaciones->validar_atributos_seek_email() !== true) {
            return array($this->errores_datos);
        }
        $this->query = "
            SELECT * FROM usuario
            WHERE ((email = '$this->email') && (username != '$this->username'));
        ";

        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '10059';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '10060';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '10061';      // Error de obtención
            }
        
        return $this->feedback;
    }

    //Buscar DNI de usuario
    function seek_DNI() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);

        if (is_array($usuario_validaciones->validar_atributos_seek_DNI() )) {
            return $usuario_validaciones->feedback;
        }else{//si es de otro
            $this->query = "
                SELECT * FROM usuario
                WHERE ((DNI = '$this->DNI') && (username != '$this->username'));
            ";

            $this->get_one_result_from_query();
            if ($this->feedback['ok']){                     // Éxito en la obtención
                if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                    $this->feedback['code'] = '10062';
                } else {                                    // Vuelve con datos
                    $this->feedback['code'] = '10063';
                }
            } else {
                if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                    $this->feedback['code'] = '10064';      // Error de obtención
                }
            
            return $this->feedback;
        }
    }

    //Buscar telefono de usuario
    function seek_Telefono() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);

        if (is_array($usuario_validaciones->validar_atributos_seek_Telefono() )) {
            return $usuario_validaciones->feedback;
        }else{//si esde otro
            $this->query = "
                SELECT * FROM usuario
                WHERE ((telefono = '$this->telefono')&& (username != '$this->username'));
            ";

            $this->get_one_result_from_query();
            if ($this->feedback['ok']){                     // Éxito en la obtención
                if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                    $this->feedback['code'] = '10065';
                } else {                                    // Vuelve con datos
                    $this->feedback['code'] = '10066';
                }
            } else {
                if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                    $this->feedback['code'] = '10067';      // Error de obtención
                }
            
            return $this->feedback;
        }
    }

    //Añadir
    function Add() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);
        
        if (is_array($usuario_validaciones->validar_atributos_add())) {  
            return $usuario_validaciones->feedback;
        }
        else if ($this->existe_usuario()) {
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10011';   
        }        
        else if($this->existe_email()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10053'; 
        }
        else if($this->existe_DNI()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10054'; 
        }
        else if($this->existe_telefono()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10055'; 
        }
        else {
            $this->query = "
                INSERT INTO usuario (
                    username,
                    nombre,
                    apellidos,
                    contrasenha,
                    email,
                    descripcion,
                    telefono,
                    tipo,
                    DNI
                ) VALUES (
                    '$this->username',
                    '$this->nombre',
                    '$this->apellidos',
                    '$this->contrasenha',
                    '$this->email',
                    '$this->descripcion',
                    '$this->telefono',
                    '$this->tipo',
                    '$this->DNI'
                    );
                ";

            $this->execute_single_query();

            if ($this->feedback['ok']){
            $this->feedback['code'] = '10009';
            
            } else {
                if ($this->feedback['code'] != '10011') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '100003';  // Error de registro
            }    
    }

    return $this->feedback;
    }

    //Editar usuario
    function Edit() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);

        if (is_array($usuario_validaciones->validar_atributos_edit() )) {
            return $usuario_validaciones->feedback;
        }
        
        else if($this->existe_email()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10053'; 
        }
        else if($this->existe_DNI()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10054'; 
        }
        else if($this->existe_telefono()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10055'; 
        }
        else{
            $this->query = "

            UPDATE usuario
                    SET 
                    contrasenha = '".$this->contrasenha."', 
                    nombre = '".$this->nombre."',
                    apellidos = '".$this->apellidos."', 
                    email = '".$this->email."',
                    descripcion = '".$this->descripcion."',
                    telefono = '".$this->telefono."',
                    tipo = '".$this->tipo."',
                    DNI = '".$this->DNI."'
                    WHERE
                    username = '$this->username'
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '10013';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '10014';  // Error de edición
            }
        }
        
        return $this->feedback;
    }

    //eliminar usuario
    function Delete() {
    if ($this->existe_UsuarioGrupo()){
        $this->feedback['ok'] = false; 
        $this->feedback['code'] = '10074'; 
    }
    else{
        $this->query = "
        UPDATE usuario
        SET 
        contrasenha = 'eliminado', 
        nombre = 'eliminado',
        apellidos = 'eliminado', 
        email = 'eliminado@gmail.com',
        descripcion = 'Ninguna',
        telefono = '000000000',
        DNI = '12345678A'
        WHERE
        username = '$this->username'
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '10015';      // Éxito en la eliminación
                    
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '10016';  // Error de eliminación
            }
        }

        return $this->feedback;
            
    }

    //Buscar usuario
    function Search() {
        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);
        if (is_array($usuario_validaciones->validar_atributos_search() )) {
            return $usuario_validaciones->feedback;
        }else{
            $this->query = "
                SELECT * FROM usuario
                WHERE
                    username LIKE '%$this->username%' AND
                    nombre LIKE '%".$this->nombre."%' AND
                    apellidos LIKE '%".$this->apellidos."%' AND
                    email LIKE '%$this->email%' AND
                    telefono LIKE '%".$this->telefono."%' AND
                    DNI LIKE '%".$this->DNI."%' "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '10017';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '10018';  // Error de búsqueda
            }
            return $this->feedback;
        }
    }


    //Registrar
    function registrar() {

        $usuario_validaciones = new Usuario_Model_Validaciones();
        $this->rellenar_atributos($usuario_validaciones);
        if (is_array($usuario_validaciones->validar_atributos_add())) {
            return $usuario_validaciones->feedback;
        }
        else if ($this->existe_usuario()) {
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10002';   
        }
        
        else if($this->existe_email()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10053'; 
        }
        else if($this->existe_DNI()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10054'; 
        }
        else if($this->existe_telefono()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10055'; 
        }
        else {
            $this->query = "
                INSERT INTO usuario (
                    username,
                    nombre,
                    apellidos,
                    contrasenha,
                    email,
                    descripcion,
                    telefono,
                    tipo,
                    DNI
                ) VALUES (
                    '$this->username',
                    '$this->nombre',
                    '$this->apellidos',
                    '$this->contrasenha',
                    '$this->email',
                    '$this->descripcion',
                    '$this->telefono',
                    'estandar',
                    '$this->DNI'
                    );
                ";


            $this->execute_single_query();

            if ($this->feedback['ok']){
            $this->feedback['code'] = '10000';
            
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '100003';  // Error de registro
            }    
    }

        return $this->feedback;
    }
    
    //Logearse
    function login() {

        if ($this->existe_usuario()) {

            if ($this->password_correcta($this->contrasenha)) {
                    $this->feedback['ok'] = true; 
                    $this->feedback['code'] = '10003';
             } else {
                    $this->feedback['ok'] = false; 
                    $this->feedback['code'] = '10005';
            
           }
        } else {
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '10004';
        }
        return $this->feedback;
    }

    //comprobar si es admin
    function esAdmin(){
        $this->query = "
            SELECT tipo FROM usuario
            WHERE username = '$this->username';
        ";
        $this->get_one_result_from_query();

        if ( $this->feedback['code']=== '00003'){
            if ($this->rows['tipo']=='administrador'){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function get_result() {
        return $this->rows;
    }

    //Todos los usuarios
    function getAll() {
        $this->query = "
            SELECT * FROM usuario
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '10017';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '10018';  // Error de búsqueda
        }
        return $this->feedback;
    }

    //Total ecoins obtenidos por usuarios en actividades
    function totalEcoinsActividades($username){

        //coger id de actividad
        $this->query = "SELECT DISTINCT id_actividad FROM `actividades` AS diferentesactividad WHERE username='$username' AND validado='Si'"; 
        $this->get_results_from_query();
        $actividadesuser=$this->feedback['resource'];

        $idecoins=array();
        $contadorecoins=0;

        if($actividadesuser!=""){
            foreach($actividadesuser as $idactividadind){// Por cada id_actividad que tiene username
                $idactividad=$idactividadind["id_actividad"]; //cojo el id
                $this->query = "SELECT id_actividad,ecoins FROM `actividad` WHERE `id_actividad` = $idactividad";//busco las ecoins y el id_actividad de la actividad
                $this->get_results_from_query();
                $ecoinsporactividad=$this->feedback['resource']; //guardo ecoins y id_actividad
                array_push($idecoins,$ecoinsporactividad);//un array con los arrays que tienen el id de la actividad y los ecoins
            }

            $ecoins=array();
            $ecoin=array();
            for($i=0;$i<sizeof($idecoins);$i++){
                $ecoin=array($idecoins[$i][0]['id_actividad']=>(int)$idecoins[$i][0]['ecoins']);//$ecoins['id_actividad']=ecoins
                array_push($ecoins,$ecoin);//meto en otro array todos los valores

            }

            //cojo todas las actividades del usuario
        $this->query = "SELECT * FROM `actividades` WHERE username='$username'AND validado='Si'";
            $this->get_results_from_query();
            $actividadesusuario=$this->feedback['resource'];//todas las actividades del usuario

            foreach($actividadesusuario as $actividadusuario){
                $indice=$actividadusuario['id_actividad']-1;//la posicion de ecoins donde esta id_actividad y ecoins
            $contadorecoins+=array_sum($ecoins[$indice]);

            }
    }
        return $contadorecoins;
        
        
    }
    
    //Ecoins totales de un usuario en grupo
    function totalEcoinsGrupos($username){
        $this->query = "
        SELECT SUM(ecoins) FROM usuario_grupo WHERE username = '$username';
        ";
        $this->get_results_from_query();
        $ecoinsgrupo=0;
        if($this->feedback['resource'][0]["SUM(ecoins)"]!=NULL){
            $ecoinsgrupo=$this->feedback['resource'][0]["SUM(ecoins)"];
        }
        return $ecoinsgrupo;
    }

    //Total ecoin usuario
    function totaldeEcoins($username){
        $ecoinsgrupos=$this->totalEcoinsGrupos($username);
        $ecoinsactividades=$this->totalEcoinsActividades($username);
        $suma=$ecoinsactividades+$ecoinsgrupos;
        return $suma;
    }
}


?>