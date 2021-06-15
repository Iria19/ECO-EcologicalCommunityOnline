<?php

include_once './Model/Default_Model.php';
include_once './Model/Usuario_Grupo_Model_Validaciones.php';

//Model de usuario grupo
class Usuario_Grupo_Model extends Default_Model {

    var $id_grupo;
    var $username;
    var $ecoins;
    var $tipo_participacion;
    
    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_grupo = '';
        $this->username = '';
        $this->ecoins = '';
        $this->tipo_participacion = '';

        if ($_POST) {
            if (isset($_POST['id_grupo']))
                $this->id_grupo = $_POST['id_grupo'];
            if (isset($_POST['username']))
                $this->username = $_POST['username'];
            if (isset($_POST['ecoins']))
                $this->ecoins = $_POST['ecoins'];
            if (isset($_POST['tipo_participacion']))
                $this->tipo_participacion = $_POST['tipo_participacion'];

        }
    }

    //Relleno los datos para las validaciones    
    function rellenar_atributos($usuariogrupo_validaciones){
        $usuariogrupo_validaciones->tipo_participacion=$this->tipo_participacion;
        $usuariogrupo_validaciones->username=$this->username;
        $usuariogrupo_validaciones->ecoins=$this->ecoins;


    }

    //Existe usuario grupo
    function existe_usuariogrupo() {
        $this->Seek();
        if ($this->feedback['code'] === '30011')
            return true;
        else return false;
    }

    //El usuario pertenece ya al grupo
    function existe_usuariogrupologeado() {

        $this->username=$_SESSION['username'];
        $this->Seek();
        if ($this->feedback['code'] === '30011')
            return true;
        else return false;
    }

    //Existe el usuario
    function existe_usuario() {
        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '30014';
            return true;
        }
        return false;
    }

    //Busco si existe el usuario
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

    //Miro si existe el grupo
    function existe_grupo() {

        $this->seek_existe_grupo();
        if ($this->feedback['code'] === '20012'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '30017';
            return true;
        }
        return false;
    }
    //Existe si existe el grupo
    function seek_existe_grupo() {
        $this->query = "
            SELECT * FROM grupo
            WHERE id_grupo = '$this->id_grupo'
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

    //Busco usuario en un grupo
    function Seek() {
        $this->query = "
        SELECT * FROM usuario_grupo
        WHERE id_grupo = '$this->id_grupo' && username='$this->username'
    ";

    $this->get_one_result_from_query();
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

    //Total ecoins grupo
    function totalEcoinsIndGrupo($idgrupo){
        $this->query = "
        SELECT SUM(ecoins),grupo.nombre,grupo.responsable_grupo,grupo.id_grupo FROM usuario_grupo INNER JOIN grupo ON usuario_grupo.id_grupo = grupo.id_grupo WHERE usuario_grupo.id_grupo=$idgrupo;
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '30008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '30009';  // Error de búsqueda
        }
        return $this->feedback;
    }

    //Añadir usuario al grupo
    function Add() {

        //validaciones
        $usuariogrupo_validaciones = new Usuario_Grupo_Model_Validaciones();
        $this->rellenar_atributos($usuariogrupo_validaciones);
        if (is_array($usuariogrupo_validaciones->validar_atributos_add())) {  
            return $usuariogrupo_validaciones->feedback;
        }     
        else if($this->existe_usuariogrupo()){//existe usuario en grupo
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30003'; 
        }
        else if(!($this->existe_grupo())){//exite el grupo
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30023'; 
        }

        else if(!($this->existe_usuario())){//existe usuario
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30020'; 
        }
        else {
            $this->query = "
                INSERT INTO usuario_grupo (
                    id_grupo,
                    username,
                    ecoins,
                    tipo_participacion
                ) VALUES (
                    '$this->id_grupo',
                    '$this->username',
                    '$this->ecoins',
                    '$this->tipo_participacion'
                    );
                ";

            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '30001';
            
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '30002';  // Error de registro
            }    
    }

    return $this->feedback;
    }

    //Funcion de editar
    function Edit() {
        
        $usuariogrupo_validaciones = new Usuario_Grupo_Model_Validaciones();
        $this->rellenar_atributos($usuariogrupo_validaciones);
        
        if (is_array($usuariogrupo_validaciones->validar_atributos_edit())) {  
            return $usuariogrupo_validaciones->feedback;
        }     
        else if(!($this->existe_grupo())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30023'; 
        }

        else if(!($this->existe_usuario())){
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30020'; 
        }
        else{
            $this->query = "

            UPDATE usuario_grupo
                    SET 
                    ecoins = '".$this->ecoins."',
                    tipo_participacion = '".$this->tipo_participacion."'
                    
                    WHERE id_grupo = '$this->id_grupo' && username='$this->username';
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '30004';      // Éxito en la edición
            } else {
                if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                    $this->feedback['code'] = '30005';  // Error de edición
            }
        }
        
        return $this->feedback;
    }


    //Eliminar usuario de un grupo
    function Delete() {

                $this->query = "
                    DELETE FROM usuario_grupo
                    WHERE id_grupo = '$this->id_grupo' && username='$this->username';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '30006';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '30007';  // Error de eliminación
                }

        return $this->feedback;
    }

    //Buscar usuario en un grupo
    function Search() {        
        //validaciones
        $usuariogrupo_validaciones = new Usuario_Grupo_Model_Validaciones();
        $this->rellenar_atributos($usuariogrupo_validaciones);
        
        if (is_array($usuariogrupo_validaciones->validar_atributos_search())) {  
            return $usuariogrupo_validaciones->feedback;
        }     
        else if($this->id_grupo!=''&&!($this->existe_grupo())){//si no esta vacio miro si el grupo existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30023'; 
        }
        else if($this->username!=''&&!($this->existe_usuario())){//si el usuario no esta vacio miro si existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '30020'; 
        }else{
            $this->query = "
                SELECT * FROM usuario_grupo
                WHERE
                    id_grupo LIKE '%".$this->id_grupo."%' AND
                    username LIKE '%".$this->username."%' AND
                    ecoins LIKE '%".$this->ecoins."%' AND
                    tipo_participacion LIKE '%".$this->tipo_participacion."%' 
                    "
                ;
            $this->get_results_from_query();
            if ($this->feedback['ok']){
                $this->feedback['code'] = '30008';      // Éxito en la búsqueda
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '30009';  // Error de búsqueda
            }
        }
            return $this->feedback;
        
    }
    

    function get_result() {
        return $this->rows;
    }

    //buscar usuarios en un determinado grupo
    function Searchusuarios() {
            $this->query = "
            SELECT DISTINCT username FROM usuario_grupo
            WHERE id_grupo = '$this->id_grupo'
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

}


?>