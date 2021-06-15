<?php

include_once './Model/Default_Model.php';
include_once './Model/Actividad_Model_Validaciones.php';

//model de Actividad
class Actividad_Model extends Default_Model {

    var $id_actividad;
    var $nombre;
    var $ecoins;
    var $descripcion;
    var $responsable_actividad;
    var $tipo;
    var $id_grupo;

    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_actividad = '';
        $this->nombre = '';
        $this->ecoins = '';
        $this->descripcion = '';
        $this->responsable_actividad = '';
        $this->tipo = '';
        $this->id_grupo = '';


        if ($_POST) {
            if (isset($_POST['id_actividad']))
                $this->id_actividad = $_POST['id_actividad'];
            if (isset($_POST['nombre']))
                $this->nombre = $_POST['nombre'];
            if (isset($_POST['ecoins']))
                $this->ecoins = $_POST['ecoins'];
            if (isset($_POST['descripcion']))
                $this->descripcion = $_POST['descripcion'];
            if (isset($_POST['responsable_actividad']))
                $this->responsable_actividad = $_POST['responsable_actividad'];     
            if (isset($_POST['tipo']))
                 $this->tipo = $_POST['tipo'];
            if (isset($_POST['id_grupo']))
                 $this->id_grupo = $_POST['id_grupo'];

        }
    }
    function rellenar_atributos($actividad_validaciones){
        $actividad_validaciones->nombre=$this->nombre;
        $actividad_validaciones->descripcion=$this->descripcion;
        $actividad_validaciones->ecoins=$this->ecoins;
        $actividad_validaciones->tipo=$this->tipo;
        $actividad_validaciones->id_grupo=$this->id_grupo;

    }

    //Comprobamos que el usuario exista para que pueda ser responsable
    function existe_usuario() {

        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '60029';
            return true;
        }
        return false;
    }

    //Buscamos si existe usuario
    function seek_existe_usuario() {
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->responsable_actividad';
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


    //Miramos si existe el grupo
    function existe_grupo() {

        $this->seek_existe_grupo();
        if ($this->feedback['code'] === '20012'){
            return true;
        }
        return false;
    }
    //Buscamos si existe grupo
    function seek_existe_grupo() {
        $this->query = "
            SELECT * FROM grupo
            WHERE id_grupo = '$this->id_grupo';
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '20011';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '20012';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '20013';      // Error de obtención
        }
        return $this->feedback;

    }

    //Buscamos si existe actividad
    function existe_actividad() {
        $this->Seek();
        if ($this->feedback['code'] === '60011')
            return true;
        else return false;
    }

    //Buscamos si ya existe nombre
    function existe_nombre() {
        $this->seek_nombre();
        if ($this->feedback['code'] === '60014')
            return true;
        else return false;
    }

    //Buscamos actividad en concreto
    function Seek() {     
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

    //miramos si existen actividades, porque no se puede borrar una actividad que tiene actividades
    function existe_actividades() {
        $this->seek_existe_actividades();
        if ($this->feedback['code'] === '70011'){
            return true;
        }
        return false;
    }

    //Buscamos si existen actividades
    function seek_existe_actividades() {
        $this->query = "
            SELECT * FROM actividades
            WHERE id_actividad = '$this->id_actividad';
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

    //Buscamos ecoins de actividad en concreto
    function Seek_Ecoins() {     
        $this->query = "
        SELECT ecoins FROM actividad
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



    //Comprueba si existe nombre si no es el del actividad actual
    function seek_nombre() {
        //validaciones
        $actividad_validaciones = new Actividad_Model_Validaciones();
        $this->rellenar_atributos($actividad_validaciones);

        if ($actividad_validaciones->validar_atributos_seek_nombre() !== true) {
            return array($this->errores_datos);
        }
        $this->query = "
            SELECT * FROM actividad
            WHERE ((nombre = '$this->nombre') && (id_actividad != '$this->id_actividad'));

        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '60013';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '60014';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '60015';      // Error de obtención
            }
        
        return $this->feedback;
    }

    //Funcion añadir actividad
    function Add() {
        //validaciones
        $actividad_validaciones = new Actividad_Model_Validaciones();
        $this->rellenar_atributos($actividad_validaciones);
        
        if (is_array($actividad_validaciones->validar_atributos_add())) {  
            return $actividad_validaciones->feedback;
        }     
        else if($this->existe_actividad()){//si ya existe id_actividad
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60011'; 
        }
        else if($this->existe_nombre()){//ya existe el nombre
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60024'; 
        }
        else if(!($this->existe_usuario())){//ya existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60028'; 
        }
        else if(!empty($this->id_grupo) && !($this->existe_grupo())){//grupo no vacio y no existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60038'; 
        }
        else {
            //si grupo vacio le ponemos valor por defecto si no le dejamos su valor
            if(empty($this->id_grupo)){
                $grupoid=999999999;
            }else{
                $grupoid=$this->id_grupo;
            }
            $this->query = "
                INSERT INTO actividad (
                    nombre,
                    ecoins,
                    descripcion,
                    responsable_actividad,
                    tipo,
                    id_grupo
                ) VALUES (
                    
                    '$this->nombre',
                    '$this->ecoins',
                    '$this->descripcion',
                    '$this->responsable_actividad',
                    '$this->tipo',
                     $grupoid

                    );
                ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
            $this->feedback['code'] = '60001';
            
            } else {
                if ($this->feedback['code'] != '60003') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '60002';  // Error de registro
            }    
    }

    return $this->feedback;
    }

    //Funcion editar actividad
    function Edit() {
        //validaciones
        $actividad_validaciones = new Actividad_Model_Validaciones();
        $this->rellenar_atributos($actividad_validaciones);

        if (is_array($actividad_validaciones->validar_atributos_edit() )) {
            return $actividad_validaciones->feedback;
        }
        else if($this->existe_nombre()){//ya existe nombre
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60024'; 
        }
        else if(!($this->existe_usuario())){//no existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60028'; 
        }
        else if(!empty($this->id_grupo) &&!($this->existe_grupo())){//grupo no vacio y no existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60038'; 
        }
        else{

            //si grupo vacio le ponemos valor
            if(empty($this->id_grupo)){
                $this->id_grupo=999999999;
            }
            $this->query = "

            UPDATE actividad
                    SET 
                    nombre = '".$this->nombre."',
                    descripcion = '".$this->descripcion."',
                    ecoins = '".$this->ecoins."',
                    responsable_actividad = '".$this->responsable_actividad."',
                    tipo = '".$this->tipo."',
                    id_grupo = '".$this->id_grupo."'
                    WHERE
                    id_actividad = '$this->id_actividad'
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '60004';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '60005';  // Error de edición
            }
        }
        
        return $this->feedback;
    }

    //Funcion eliminar actividad
    function Delete() {
       
        if ($this->existe_actividades()){//actividad tiene actividades
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60041'; 
        }

        else if($this->id_grupo!=NULL&&$this->id_grupo!=''&&$this->id_grupo!='999999999'&&$this->id_grupo!=999999999){//id_grupo no vacio
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60042'; 
        }
        else{
                $this->query = "
                    DELETE FROM actividad
                    WHERE id_actividad = '$this->id_actividad';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '60006';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '60007';  // Error de eliminación
                }
        }
        return $this->feedback;
    }

    //Buscar actividad
    function Search() {
        //validaciones
        $actividad_validaciones = new Actividad_Model_Validaciones();
        $this->rellenar_atributos($actividad_validaciones);
        if (is_array($actividad_validaciones->validar_atributos_search() )) {
            return $actividad_validaciones->feedback;
        }else if($this->id_grupo!=''&& !($this->existe_grupo())){//si no es vacio miramos si existe id_grupo
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60038'; 
        }
        else if($this->responsable_actividad!=''&&!($this->existe_usuario())){//miramos si existe actividad
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '60028'; 
        }else{
            $this->query = "
                SELECT * FROM actividad
                WHERE
                    nombre LIKE '%".$this->nombre."%' AND
                    tipo LIKE '%".$this->tipo."%' AND
                    responsable_actividad LIKE '%".$this->responsable_actividad."%' AND
                    id_grupo LIKE '%".$this->id_grupo."%' 
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '60008';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '60009';  // Error de búsqueda
            }
        }
            return $this->feedback;
        
    }
    
    function get_result() {
        return $this->rows;
    }

    //Funcionar obtener todas las actividades
    function getAll() {
        $this->query = "
            SELECT * FROM actividad
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '60008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '60009';  // Error de búsqueda
        }
        return $this->feedback;
    }

    //Funcion para obtener el id de la actividad y su nombre sabiendo el responsable
    function ActividadResponsable() {

        $this->query = "
            SELECT id_actividad,nombre FROM actividad
            WHERE
            responsable_actividad LIKE '%".$this->responsable_actividad."%' 
                "
            ;
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '60008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '60009';  // Error de búsqueda
        }
        return $this->feedback;
    }
    
    //Buscamos el responsable de una actividad
    function ResponsableActividad($id) {
        $responsablesactividad=array();
        if($id!=''&& $id!='999999999'){//no vacia
            //buscamos los distintos id de actividad donde la actividad sea id
            $this->query = "
            SELECT DISTINCT id_actividad FROM actividades
            WHERE
                id_actividades = '$id' 
                "
            ;
            $this->get_one_result_from_query();
            if ($this->feedback['ok']){
                //buscamos el responsable sabiendo el id de actividad
                $idactividad=$this->feedback['resource']['id_actividad'];
                $this->query = "
                    SELECT responsable_actividad FROM actividad
                    WHERE
                    id_actividad = '$idactividad' 
                        "
                    ;
                $this->get_results_from_query();
                if ($this->feedback['ok']){
                    // Éxito en la búsqueda
                    $responsablesactividad=array($id=>$this->feedback['resource'][0]['responsable_actividad']);
                }
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '60009';  // Error de búsqueda
                }
        }
        return $responsablesactividad;
    }
}


?>