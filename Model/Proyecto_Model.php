<?php

include_once './Model/Default_Model.php';
include_once './Model/Proyecto_Model_Validaciones.php';

//Model de proyecto
class Proyecto_Model extends Default_Model {

    var $id_proyecto;
    var $nombre;
    var $descripcion;
    var $responsable_proyecto;
    var $id_grupo;

    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_proyecto = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->responsable_proyecto = '';
        $this->id_grupo = '';
        $this->username = '';


        if ($_POST) {
            if (isset($_POST['id_proyecto']))
                $this->id_proyecto = $_POST['id_proyecto'];
            if (isset($_POST['nombre']))
                $this->nombre = $_POST['nombre'];
            if (isset($_POST['descripcion']))
                $this->descripcion = $_POST['descripcion'];
            if (isset($_POST['responsable_proyecto']))
                $this->responsable_proyecto = $_POST['responsable_proyecto'];
            if (isset($_POST['id_grupo']))
            $this->id_grupo = $_POST['id_grupo'];
            if (isset($_POST['username']))
            $this->username = $_POST['username'];
        }
    }

    //Rellenar atributos para validaciones
    function rellenar_atributos($proyecto_validaciones){
        $proyecto_validaciones->nombre=$this->nombre;

        $proyecto_validaciones->descripcion=$this->descripcion;
        $proyecto_validaciones->responsable_proyecto=$this->responsable_proyecto;        
    }

    //Comprobar existe usuario
    function existe_usuario() {

        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '40026';
            return true;
        }
        return false;
    }

    //Buscar existe grupo
    function seek_existe_usuario() {
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->responsable_proyecto';
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

    //comprueba documentacion
    function existe_documentacion() {

        $this->SeekDocumentacion();
        if ($this->feedback['code'] === '80011')
            return true;
        else return false;
    }

    //busca si existe documentacion
    function SeekDocumentacion() {
        $this->query = "
        SELECT * FROM documentacion
        WHERE (id_proyecto = '$this->id_proyecto') ;
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

    //Comprobar existe grupo
    function existe_grupo() {

        $this->seek_existe_grupo();
        if ($this->feedback['code'] === '20012'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '40030';
            return true;
        }
        return false;
    }

    //Buscar existe grupo
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

    //Comprobar existe proyecto
    function existe_proyecto() {

        $this->Seek();
        if ($this->feedback['code'] === '40011')
            return true;
        else return false;
    }

    //Comprobar si existe nombre
    function existe_nombre() {
        $this->seek_nombre();
        if ($this->feedback['code'] === '40014')
            return true;
        else return false;
    }

    //Comprobar si responsable
    function esta_responsable() {
        $this->seek_responsableengrupo();
        if ($this->feedback['code'] === '20012'){
            return true;
        }
        return false;
    }
    
    //Buscar usuario que es responsable de un grupo
    function seek_responsableengrupo() {
        $this->query = "
            SELECT * FROM usuario_grupo
            WHERE id_grupo = '$this->id_grupo' AND username='$this->responsable_proyecto';
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

    //Buscar un proyecto en concreto
    function Seek() {
        $this->query = "
        SELECT * FROM proyecto
        WHERE id_proyecto = '$this->id_proyecto';
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

    //Comprueba si existe nombre si no es el del grupo actual
    function seek_nombre() {
        $proyecto_validaciones = new Proyecto_Model_Validaciones();
        $this->rellenar_atributos($proyecto_validaciones);


        if ($proyecto_validaciones->validar_atributos_seek_nombre() !== true) {
            return array($this->errores_datos);
        }
        $this->query = "
            SELECT * FROM proyecto
            WHERE ((nombre = '$this->nombre') && (id_proyecto != '$this->id_proyecto'));

        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '40013';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '40014';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '40015';      // Error de obtención
            }
        
        return $this->feedback;
    }
    
    //Buscar proyecto de un grupo
    function seek_existe_grupoproy() {
        $this->query = "
            SELECT * FROM proyecto
            WHERE id_grupo = $this->id_grupo;
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '40010';
            } else {        
                $this->feedback['code'] = '40011';
                // Vuelve con datos
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '40012';      // Error de obtención
    
    
        }
        return $this->feedback;
    }

    //Añadir proyecto
    function Add() {
        $proyecto_validaciones = new Proyecto_Model_Validaciones();
        $this->rellenar_atributos($proyecto_validaciones);
        
        if (is_array($proyecto_validaciones->validar_atributos_add())) {  
            return $proyecto_validaciones->feedback;
        }     
        else if($this->existe_proyecto()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40004'; 
        }
        else if($this->existe_nombre()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40021'; 
        }
        else if(!($this->existe_usuario())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40025'; 
        }
        else if(!($this->existe_grupo())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40029'; 
        }
        else {
            if(!$this->esta_responsable()){//si el participante del grupo no esta en el grupo se añade
                $this->query = "
                INSERT INTO usuario_grupo (
                    id_grupo,
                    username,
                    ecoins,
                    tipo_participacion
                ) VALUES (
                    '$this->id_grupo',
                    '$this->responsable_proyecto',
                    0,
                    'participa'
                    );
                ";

            $this->execute_single_query();

            if(!$this->feedback['ok']){
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '30002';  // Error de registro
                    return $this->feedback;
                }
            }
            $this->query = "
                INSERT INTO proyecto (
                    nombre,
                    descripcion,
                    responsable_proyecto,
                    id_grupo

                ) VALUES (
                    '$this->nombre',
                    '$this->descripcion',
                    '$this->responsable_proyecto',
                    '$this->id_grupo'
                    );
                ";

            $this->execute_single_query();

            if ($this->feedback['ok']){
            $this->feedback['code'] = '40001';
            
            } else {
                if ($this->feedback['code'] != '40003') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '40002';  // Error de registro
            } 
          
        }   

        return $this->feedback;
    }

    //Editar proyecto
    function Edit() {
        $proyecto_validaciones = new Proyecto_Model_Validaciones();
        $this->rellenar_atributos($proyecto_validaciones);

        if (is_array($proyecto_validaciones->validar_atributos_edit() )) {
            return $proyecto_validaciones->feedback;
        }
        else if($this->existe_nombre()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40021'; 
        }
        else if(!($this->existe_usuario())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40025'; 
        }

        else{
            $this->query = "

            UPDATE proyecto
                    SET 
                    nombre = '".$this->nombre."',
                    descripcion = '".$this->descripcion."',
                    responsable_proyecto = '".$this->responsable_proyecto."'
                    WHERE
                    id_proyecto = '$this->id_proyecto'
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '40005';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '40006';  // Error de edición
            }
        }
        
        return $this->feedback;
    }

    //Eliminar proyecto
    function Delete() {
        if ($this->existe_documentacion()){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '400009'; 
        }
        else{
                $this->query = "
                    DELETE FROM proyecto
                    WHERE id_proyecto = '$this->id_proyecto';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '40007';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '40008';  // Error de eliminación
                }
        }
        return $this->feedback;
    
    }

    //Buscar protecto
    function Search() {
        $proyecto_validaciones = new Proyecto_Model_Validaciones();
        $this->rellenar_atributos($proyecto_validaciones);
        if (is_array($proyecto_validaciones->validar_atributos_search() )) {
            return $proyecto_validaciones->feedback;
        }else if($this->id_grupo!='' && !($this->existe_grupo())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40029'; 
        }else if($this->responsable_proyecto!=''&& !($this->existe_usuario())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '40025'; 
        }else
        {
            $this->query = "
                SELECT * FROM proyecto
                WHERE
                    id_grupo LIKE '%".$this->id_grupo."%' AND
                    nombre LIKE '%".$this->nombre."%' AND
                    responsable_proyecto LIKE '%".$this->responsable_proyecto."%'
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '40009';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '400100';  // Error de búsqueda
            }
        }
            return $this->feedback;
        
    }

    //Responsable proyecto $id
    function ResponsableProyecto($id) {

            $this->query = "
                SELECT id_proyecto,responsable_proyecto FROM proyecto
                WHERE
                id_proyecto = '$id' 
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '40009';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '400100';  // Error de búsqueda
            }
            return $this->feedback;
        
    }
    function get_result() {
        return $this->rows;
    }

    //Todos proyectos
    function getAll() {
        $this->query = "
            SELECT * FROM proyecto
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '40009';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '400100';  // Error de búsqueda
        }
        return $this->feedback;
    }

    function getAllUsers(){
    $this->query = "
    SELECT DISTINCT id_grupo FROM `usuario_grupo` WHERE `username` ='$this->username' AND `tipo_participacion` ='participa' 
    ";
    $this->get_results_from_query();
 
    if ($this->feedback['ok']){

        $proyectosusuario=array();
        if($this->feedback['resource']!=''){
            foreach($this->feedback['resource'] as $usuario){
                $id=$usuario['id_grupo'];
                $this->query = "
                SELECT * FROM `proyecto` WHERE `id_grupo` =  $id
            ";
            $this->get_results_from_query();

            array_push($proyectosusuario,$this->feedback['resource']);
            }
        }
        if ($this->feedback['ok']){
            $this->feedback['code'] = '40009';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '400100';  // Error de búsqueda
        }
    } else {
        if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
            $this->feedback['code'] = '400100';  // Error de búsqueda
    }
    return $proyectosusuario;
    }

}


?>