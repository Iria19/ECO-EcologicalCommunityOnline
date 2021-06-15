<?php

include_once './Common/Validator.php';

//Validaciones grupo
class Grupo_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

    var $ok = true;
    var $code = '00000';
    var $resource = '';
    var $feedback = array();
    var $errores_datos = array();

    var $nombre;
    var $descripcion;

    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Valido añadir
    function validar_atributos_add() {
        
        $nomberExito=$this->validar_Nombre();
        $responsable_grupoExito=$this->validar_responsable_grupo();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($responsable_grupoExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
       
        return true;
       
    }

    //Valido editar
    function validar_atributos_edit() {
        $nomberExito=$this->validar_Nombre();
        $responsable_grupoExito=$this->validar_responsable_grupo();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($responsable_grupoExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
       
   }


   //Valido busqueda
    function validar_atributos_search() {

        if ($this->nombre !== ''){ 
            $nomberExito=$this->validar_Nombre_buscar();
            if  (is_array($nomberExito)) {
                return $this->feedback;
            }
        }

        return true;
       
    }

    //Valido nombre grupo
    function validar_Nombre() {
        $this->resource = 'Grupo';

        if ($this->no_vacio($this->nombre) === false) {
            $this->code = '20018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '20019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '20020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->nombre, 2) === false) {
            $this->code = '20021';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

    }


    //Compruebo buscar nombre
    function validar_Nombre_buscar() {
        $this->resource = 'Grupo';


         if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '20019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '20020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Valido responsable grupo
    function validar_responsable_grupo() {

        $this->resource = 'Grupo';

        if ($this->no_vacio($this->responsable_grupo) === false) {
            $this->code = '20027';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;       
        }
    }

    //Valido descripcion
     function validar_Descripcion() {

        $this->resource = 'Grupo';

        if ($this->es_alfanumerico_especiales($this->descripcion) === false) {
            $this->code = '20023';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->descripcion, 255) === false) {
            $this->code = '20024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Valido seek nombre
    function validar_atributos_seek_nombre() {
        $this->validar_nombre();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }

}


?>