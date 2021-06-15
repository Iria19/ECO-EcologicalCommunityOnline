<?php

include_once './Model/Default_Model.php';
include_once './Model/Grupo_Model_Validaciones.php';

//Model de grupos
class Grupo_Model extends Default_Model {

    var $id_grupo;
    var $nombre;
    var $descripcion;
    var $responsable_grupo;
    
    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_grupo = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->responsable_grupo = '';

        if ($_POST) {
            if (isset($_POST['id_grupo']))
                $this->id_grupo = $_POST['id_grupo'];
            if (isset($_POST['nombre']))
                $this->nombre = $_POST['nombre'];
            if (isset($_POST['descripcion']))
                $this->descripcion = $_POST['descripcion'];
            if (isset($_POST['responsable_grupo']))
                $this->responsable_grupo = $_POST['responsable_grupo'];

        }
    }
    
    //Relleno datos validaciones
    function rellenar_atributos($grupo_validaciones){
        $grupo_validaciones->nombre=$this->nombre;
        $grupo_validaciones->descripcion=$this->descripcion;
        $grupo_validaciones->responsable_grupo=$this->responsable_grupo;

    }

    //Compruebo si existe actividad
    function existe_actividad() {

        $this->seek_existe_actividad();
        if ($this->feedback['code'] === '60011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '20032';
            return true;
        }
        return false;
    }

    //Busco si existe actividad
    function seek_existe_actividad() {
        $this->query = "
            SELECT * FROM actividad
            WHERE id_grupo = '$this->id_grupo';
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

    //Compruebo si existe proyecto  
    function existe_proyecto() {

        $this->seek_existe_proyecto();
        if ($this->feedback['code'] === '40011'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '20034';
            return true;
        }
        return false;
    }

    //Busco si existe proyecto
    function seek_existe_proyecto() {
        $this->query = "
            SELECT * FROM proyecto
            WHERE id_grupo = '$this->id_grupo';
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

    //Compruebo si existe usuario
    function existe_usuario() {

        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '20030';
            return true;
        }
        return false;
    }

    //Busco si exite usuario
    function seek_existe_usuario() {
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->responsable_grupo';
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
    //Compuebo si existe grupo
    function existe_grupo() {

        $this->Seek();
        if ($this->feedback['code'] === '20012')
            return true;
        else return false;
    }

    function existe_nombre() {
        $this->seek_nombre();
        if ($this->feedback['code'] === '20015')
            return true;
        else return false;
    }

    //Busco grupo
    function Seek() {
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

    //Comprueba si existe nombre si no es el del grupo actual
    function seek_nombre() {
        $grupo_validaciones = new Grupo_Model_Validaciones();
        $this->rellenar_atributos($grupo_validaciones);


        if ($grupo_validaciones->validar_atributos_seek_nombre() !== true) {
            return array($this->errores_datos);
        }
        $this->query = "
            SELECT * FROM grupo
            WHERE ((nombre = '$this->nombre') && (id_grupo != '$this->id_grupo'));

        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '20014';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '20015';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '20016';      // Error de obtención
            }
        
        return $this->feedback;
    }

    //Compruebo si existe usuario grupo
    function existe_UsuarioGrupo() {
        $this->SeekUsuarioGrupo();
        if ($this->feedback['code'] === '30011'){
            return true;
        }
        return false;
    }

    //Busco si existe usuario grupo
    function SeekUsuarioGrupo() {
        $this->query = "
        SELECT * FROM usuario_grupo
        WHERE id_grupo='$this->id_grupo'
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
    
    //Añadir grupo
    function Add() {
        //validaciones
        $grupo_validaciones = new Grupo_Model_Validaciones();
        $this->rellenar_atributos($grupo_validaciones);
        
        if (is_array($grupo_validaciones->validar_atributos_add())) {  
            return $grupo_validaciones->feedback;
        }     
        else if($this->existe_grupo() ){//existe grupo
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20003'; 
        }
        else if($this->existe_nombre()){//existe nombre
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20004'; 
        }
        else if(!($this->existe_usuario())){//existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20029'; 
        }
        else {
            $this->query = "
                INSERT INTO grupo (
                    nombre,
                    descripcion,
                    responsable_grupo
                ) VALUES (
                    '$this->nombre',
                    '$this->descripcion',
                    '$this->responsable_grupo'
                    );
                ";

            $this->execute_single_query();

            if ($this->feedback['ok']){
            $this->feedback['code'] = '20001';
            
            } else {
                if ($this->feedback['code'] != '20003') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '20002';  // Error de registro
            }    
        }

        return $this->feedback;
    }

    //Editar grupo
    function Edit() {
        //validaciones
        $grupo_validaciones = new Grupo_Model_Validaciones();
        $this->rellenar_atributos($grupo_validaciones);

        if (is_array($grupo_validaciones->validar_atributos_edit() )) {
            return $grupo_validaciones->feedback;
        }
        else if($this->existe_nombre()){//existe nombre
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20004'; 
        }
        else if(!($this->existe_usuario())){//existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20029'; 
        }

        else{
            $this->query = "

            UPDATE grupo
                    SET 
                    nombre = '".$this->nombre."',
                    descripcion = '".$this->descripcion."',
                    responsable_grupo = '".$this->responsable_grupo."'
                    WHERE
                    id_grupo = '$this->id_grupo'
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '20005';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '20006';  // Error de edición
            }
        }
        
        return $this->feedback;
    }

    //Eliminar grupo
    function Delete() {
        
        if ($this->existe_actividad()){//tiene actividad
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20032'; 
        }elseif ($this->existe_proyecto()){//tiene proyecto
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20034'; 
        }elseif ($this->existe_UsuarioGrupo()){//hay participantes
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20035'; 
        }
        else{
                $this->query = "
                    DELETE FROM grupo
                    WHERE id_grupo = '$this->id_grupo';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '20007';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '20008';  // Error de eliminación
                }
        }
        return $this->feedback;
    }

    //buscar
    function Search() {
        //validar
        $grupo_validaciones = new Grupo_Model_Validaciones();
        $this->rellenar_atributos($grupo_validaciones);
        if (is_array($grupo_validaciones->validar_atributos_search() )) {
            return $grupo_validaciones->feedback;
        }else if($this->responsable_grupo!=''&&!($this->existe_usuario())){//responsable no existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '20029'; 
        }
        else{
            $this->query = "
                SELECT * FROM grupo
                WHERE
                    nombre LIKE '%".$this->nombre."%' AND
                    responsable_grupo LIKE '%".$this->responsable_grupo."%' 
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '20009';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '20010';  // Error de búsqueda
            }
        }
            return $this->feedback;
        
    }

    function get_result() {
        return $this->rows;
    }
    
    //Todos
    function getAll() {
        $this->query = "
            SELECT * FROM grupo
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '20009';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '20010';  // Error de búsqueda
        }
        return $this->feedback;
    }

    //Grupos de los que un usuario es responsable
    function GruposesResponsable() {

        $this->query = "
            SELECT id_grupo,nombre FROM grupo
            WHERE
                responsable_grupo LIKE '%".$this->responsable_grupo."%' 
                "
            ;
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '20036';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '20010';  // Error de búsqueda
        }
        return $this->feedback;
    }


}


?>