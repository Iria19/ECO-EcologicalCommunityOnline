<?php

include_once './Model/Default_Model.php';
include_once './Model/Mensaje_Model_Validaciones.php';

//Model de mensaje
class Mensaje_Model extends Default_Model {

    var $id_mensaje;
    var $emisor;
    var $receptor;
    var $titulo;
    var $cuerpo;
    var $leido;
    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_mensaje = '';
        $this->emisor = '';
        $this->receptor = '';
        $this->titulo = '';
        $this->leido = '';
        $this->cuerpo = '';

        if ($_POST) {
            if (isset($_POST['id_mensaje']))
                $this->id_mensaje = $_POST['id_mensaje'];
            if (isset($_POST['emisor']))
                $this->emisor = $_POST['emisor'];
            if (isset($_POST['receptor']))
                $this->receptor = $_POST['receptor'];
            if (isset($_POST['titulo']))
                $this->titulo = $_POST['titulo'];    
            if (isset($_POST['cuerpo']))
                $this->cuerpo = $_POST['cuerpo'];
            if (isset($_POST['leido']))
                $this->leido = $_POST['leido'];

        }
    }

    //Rellenar para validacion
    function rellenar_atributos($mensaje_validaciones){
        $mensaje_validaciones->titulo=$this->titulo;
        $mensaje_validaciones->cuerpo=$this->cuerpo;
        $mensaje_validaciones->leido=$this->leido;
        $mensaje_validaciones->emisor=$this->emisor;
        $mensaje_validaciones->receptor=$this->receptor;

    }

    //Compruebo existe emisor
    function existe_emisor() {

        $this->seek_existe_emisor();
        if ($this->feedback['code'] === '10007'){
            $this->feedback['ok'] = true;
            $this->feedback['code'] = '50010';
            return true;
        }
        return false;
    }

    //Busco si existe emisor
    function seek_existe_emisor() {
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->emisor';
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

    //Busco si existe receptor
    function existe_receptor() {
        if($this->receptor!='todos'){

            $this->seek_existe_receptor();
            if ($this->feedback['code'] === '10007'){
                $this->feedback['ok'] = true;
                $this->feedback['code'] = '50013';

                return true;
            }
                return false;
        }
        return true;
    }

    //Busco si existe receptor
    function seek_existe_receptor() {
        
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->receptor';
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

    //Busco mensaje concreto
    function Seek() {
        $this->query = "
        SELECT * FROM mensaje
        WHERE id_mensaje = '$this->id_mensaje';
    ";
    $this->get_one_result_from_query();
    if ($this->feedback['ok']){                     // Éxito en la obtención
        if ($this->feedback['code'] == '00002') {   // Vuelve vacío
            $this->feedback['code'] = '50005';
        } else {                                    // Vuelve con datos
            $this->feedback['code'] = '50006';
        }
    } else {
        if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
            $this->feedback['code'] = '50007';      // Error de obtención
    }
    return $this->feedback;
        
    }

    //Añadir
    function Add() {
        //validacioes
        $mensaje_validaciones = new Mensaje_Model_Validaciones();
        $this->rellenar_atributos($mensaje_validaciones);
        if (is_array($mensaje_validaciones->validar_atributos_add())) {  
            return $mensaje_validaciones->feedback;
        } else{
            if(!($this->existe_emisor())){//no existe emisor

                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50009'; 
            }
            else if(!($this->existe_receptor())){//no existe receptor
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50012'; 
            }
            else {
                $this->query = "
                    INSERT INTO mensaje (
                        emisor,
                        receptor,
                        titulo,
                        cuerpo,
                        leido
                    ) VALUES (
                        '$this->emisor',
                        '$this->receptor',
                        '$this->titulo',
                        '$this->cuerpo',
                        'No'
                        );
                    ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                $this->feedback['code'] = '50001';
                
                } else {
                        $this->feedback['code'] = '50002';  // Error de registro
                }    
        }

            return $this->feedback;
        }
    }

    //Añadir siendo admin
    function AddAdmin($nombreusuario) {
        //validaciones
        $mensaje_validaciones = new Mensaje_Model_Validaciones();
        $this->rellenar_atributos($mensaje_validaciones);
        
        if (is_array($mensaje_validaciones->validar_atributos_add())) {  
            return $mensaje_validaciones->feedback;
        } else{
            if(!($this->existe_emisor())){//no existe emisor

                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50009'; 
            }
            else if(!($this->existe_receptor())){//no existe receptor
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50012'; 
            }
            else {
                $this->query = "
                    INSERT INTO mensaje (
                        emisor,
                        receptor,
                        titulo,
                        cuerpo,
                        leido
                    ) VALUES (
                        '$this->emisor',
                        '$nombreusuario',
                        '$this->titulo',
                        '$this->cuerpo',
                        'No'
                        );
                    ";

                $this->execute_single_query();

                if ($this->feedback['ok']){
                $this->feedback['code'] = '50001';
                
                } else {
                        $this->feedback['code'] = '50002';  // Error de registro
                }    
        }

            return $this->feedback;
        }
    }

    //Buscar mensaje
    function Search() {
        //validaciones
        $mensaje_validaciones = new Mensaje_Model_Validaciones();
        $this->rellenar_atributos($mensaje_validaciones);
        if (is_array($mensaje_validaciones->validar_atributos_search() )) {
            return $mensaje_validaciones->feedback;
        }else{
            if(!($this->existe_emisor())&& !empty($this->emisor) ){//no existe emisor
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50009'; 
            }
            else if(!($this->existe_receptor())&& !empty($this->receptor)){//no existe emisor
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '50012'; 
            }
            else {
                $this->query = "
                    SELECT * FROM mensaje
                    WHERE
                        emisor LIKE '%".$this->emisor."%' AND
                        titulo LIKE '%".$this->titulo."%' AND
                        leido LIKE '%".$this->leido."%' AND
                        receptor LIKE '%".$this->receptor."%' || receptor LIKE 'todos'
                        "
                    ;
                    $this->get_results_from_query();
                    if ($this->feedback['ok']){
                        $this->feedback['code'] = '50003';      // Éxito en la búsqueda
                    } else {
                        if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                            $this->feedback['code'] = '50004';  // Error de búsqueda
                    }
                }
                return $this->feedback;
        }
    }

    //Cambia mensaje a leido
    function MensajeLeido() {
        $this->query = "
        UPDATE mensaje
                SET 
                leido = 'Si'
        WHERE id_mensaje= '$this->id_mensaje'
                ";
        $this->execute_single_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '90025';      // Éxito en la edición
        } else {
            if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                $this->feedback['code'] = '90026';  // Error de edición
        }
    
        return $this->feedback;
    }

    //Elimina mensajes
    function delete() {
        
                $this->query = "
                    DELETE FROM mensaje
                    WHERE id_mensaje = '$this->id_mensaje';
                ";
                $this->execute_single_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '50027';      // Éxito en la eliminación
                    
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '50028';  // Error de eliminación
                }
        
        return $this->feedback;
    }
    
    function get_result() {
        return $this->rows;
    }

    //Todos mensajes
    function getAll() {
        $this->query = "
            SELECT * FROM mensaje
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '50003';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '50004';  // Error de búsqueda
        }
        return $this->feedback;
    }
    
    //No se puede editar
    function Edit() {}

    //Obtiene notificaciones
    function Notificaciones($usuario){
        $this->query = " SELECT COUNT(`id_mensaje`) FROM `mensaje` WHERE `receptor`= '$usuario' && `leido`='No' ";
        $this->execute_simple_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '50003';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '50004';  // Error de búsqueda
        }
        $tuplas=$this->feedback['resource']->fetch_array();
        return $tuplas["COUNT(`id_mensaje`)"];
    }

}

?>