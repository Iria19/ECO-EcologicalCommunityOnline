<?php

include_once './Model/Default_Model.php';
include_once './Model/Actividades_Model_Validaciones.php';

//Model de Actividades
class Actividades_Model extends Default_Model {

    var $id_actividades;
    var $nombre;
    var $fecha;
    var $id_actividad;
    var $username;
    var $validado;
    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_actividades = '';
        $this->fecha = '';
        $this->id_actividad = '';
        $this->nombre = '';
        $this->username = '';
        $this->validado = '';
        if ($_POST) {
            if (isset($_POST['id_actividades']))
                $this->id_actividades = $_POST['id_actividades'];
            if (isset($_POST['fecha']))
                $this->fecha = $_POST['fecha'];
            if (isset($_POST['id_actividad']))
                $this->id_actividad = $_POST['id_actividad'];
            if (isset($_POST['username']))
                $this->username = $_POST['username'];  
            if (isset($_POST['validado']))
                $this->validado = $_POST['validado']; 
            if (isset($_POST['nombre']))
                $this->nombre = $_POST['nombre']; 
        }
    }

    function rellenar_atributos($actividades_validaciones){
        $actividades_validaciones->nombre=$this->nombre;
        $actividades_validaciones->fecha=$this->fecha;
        $actividades_validaciones->validado=$this->validado;
        $actividades_validaciones->id_actividad=$this->id_actividad;


    }

    //Comprobamos si existe el usuario
    function existe_usuario() {

        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '70020';
            return true;
        }
        return false;
    }

    //Busco si existe usuario
    function seek_existe_usuario() {
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

    //Comprobamos si hay documentación sobre la actividad
    function existe_documentacion() {

        $this->SeekDocumentacion();
        if ($this->feedback['code'] === '80011')
            return true;
        else return false;
    }

    //Comprobamos si existen documentos
    function SeekDocumentacion() {
        $this->query = "
        SELECT * FROM documentacion
        WHERE (id_actividades = '$this->id_actividades') ;
    ";
    $this->get_one_result_from_query();
    if ($this->feedback['ok']){                     // Éxito en la obtención
        if ($this->feedback['code'] == '00002') {   // Vuelve vacío
            $this->feedback['code'] = '80010';
        } else {                                    // Vuelve con datos
            $this->feedback['code'] = '80011';
        }
    } else {
        if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
            $this->feedback['code'] = '80012';      // Error de obtención
    }
    return $this->feedback;
        
    }

    //Comprobamos si existe la actividad
    function existe_actividad() {

        $this->seek_existe_actividad();
        if ($this->feedback['code'] === '60011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '70016';
            return true;
        }
        return false;
    }

    //Busco si existe actividad
    function seek_existe_actividad() {
        $this->query = "
            SELECT * FROM actividad
            WHERE id_actividad = '$this->id_actividad';
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

    //Funcion para ver si ya existe el nombre de la actividad
    function existe_nombre() {
        $this->seek_nombre();
        if ($this->feedback['code'] === '70011')
            return true;
        else return false;
    }

    //Busco si existe nombre
    function seek_nombre() {

        $this->query = "
            SELECT * FROM actividades
            WHERE ((nombre = '$this->nombre') && (id_actividades != '$this->id_actividades'));

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

    //Busco nombre una actividad en concreto y lo devuelvo
    function seek_nombre_actividad() {
        $this->query = "
            SELECT nombre FROM actividad
            WHERE id_actividad = '$this->id_actividad';
        ";
        $nombre=$this->get_one_result_from_query();

        return $nombre;
    }
    
    //Comprobamos si existe actividades
    function existe_actividades() {

        $this->Seek();
        if ($this->feedback['code'] === '70011')
            return true;
        else return false;
    }

    //Busca actividades en concreo
    function Seek() {
        $this->query = "
        SELECT * FROM actividades
        WHERE id_actividades = '$this->id_actividades';
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

    //Añadir actividades
    function Add() {
        //validaciones
        $actividades_validaciones = new Actividades_Model_Validaciones();
        $this->rellenar_atributos($actividades_validaciones);
        
        if (is_array($actividades_validaciones->validar_atributos_add())) {  
            return $actividades_validaciones->feedback;
        }     
        else if($this->existe_actividades()){//ya existe actividades
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '70003'; 
        }
        else if(!($this->existe_usuario())){//existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '70019'; 
        }
        else if(!($this->existe_actividad())){//existe actividad
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '70015'; 
        } else if($this->existe_nombre()){//existe nombre
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '700004'; 
        }
        else {
            $this->query = "
                INSERT INTO actividades (
                    fecha,
                    id_actividad,
                    username,
                    validado,
                    nombre
                ) VALUES (
                    '$this->fecha',
                    '$this->id_actividad',
                    '$this->username',
                    '$this->validado',
                    '$this->nombre'
                );
                ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
            $this->feedback['code'] = '70001';
            
            } else {
                if ($this->feedback['code'] != '70003') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '70002';  // Error de registro
            }    
    }

      return $this->feedback;
    }

    //Editar actividades
    function Edit() {
        //validaciones
        $actividades_validaciones = new Actividades_Model_Validaciones();
        $this->rellenar_atributos($actividades_validaciones);

        if (is_array($actividades_validaciones->validar_atributos_edit() )) {
            return $actividades_validaciones->feedback; 
        }else if($this->existe_nombre()){//existe nombre

                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '700004'; 
        }else{

            $this->query = "

            UPDATE actividades
                    SET 
                    fecha = '".$this->fecha."',
                    validado='".$this->validado."' ,
                    nombre='".$this->nombre."'

                    WHERE
                    id_actividades = '$this->id_actividades'";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '70004';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '70005';  // Error de edición
            }
        
        
        return $this->feedback;
        }
    }

    //Eliminar actividades
    function Delete() {
        if ($this->existe_documentacion()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '700008'; 
        }
        else{
                $this->query = "
                    DELETE FROM actividades
                    WHERE id_actividades = '$this->id_actividades';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '70006';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '70007';  // Error de eliminación
                }
        }
        return $this->feedback;
    }

    //Buscar actividades
    function Search() {
        //validaciones
        $actividades_validaciones = new Actividades_Model_Validaciones();
        $this->rellenar_atributos($actividades_validaciones);
        if (is_array($actividades_validaciones->validar_atributos_search() )) {
            return $actividades_validaciones->feedback;
        }
        else if($this->id_actividad!=''&& !($this->existe_actividad())){//si actividad no vacia miro si existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '70015'; 
        }else{
            $this->query = "
                SELECT * FROM actividades
                WHERE
                    fecha LIKE '%".$this->fecha."%' AND
                    nombre LIKE '%".$this->nombre."%' AND
                    id_actividad LIKE '%".$this->id_actividad."%' 
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '70008';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '70009';  // Error de búsqueda
            }
        }
            return $this->feedback;
        
    }

    function get_result() {
        return $this->rows;
    }

    //Obtener todas
    function getAll() {
        $this->query = "
            SELECT * FROM actividades
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '70008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '70009';  // Error de búsqueda
        }
        return $this->feedback;
    }
    
    //Todas actividades de un determinado usuario
    function getAllUser() {

        $this->query = "
        SELECT * FROM actividades
        WHERE
            username LIKE '%".$this->username."%'  "
        ;
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '70008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '70009';  // Error de búsqueda
        }
        return $this->feedback;
    }

    //Todos los usuarios que hicieron actividad
    function Searchusuariosactividades() {
        $this->query = "
            SELECT DISTINCT username FROM actividades
            WHERE id_actividad = '$this->id_actividad'
        ";

        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '70008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '70009';  // Error de búsqueda
        }
        return $this->feedback;   
    }
}


?>