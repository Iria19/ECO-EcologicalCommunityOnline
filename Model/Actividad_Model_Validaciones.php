<?php

include_once './Common/Validator.php';

//Clase de validaciones del model de actividad
class Actividad_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

       var $ok = true;
       var $code = '00000';
       var $resource = '';
       var $feedback = array();
       var $errores_datos = array();

        var $nombre;
        var $descripcion;
        var $ecoins;
        var $tipo;
        var $id_grupo;

        protected function construct_response() {//Constructor de la respuesta
            $this->feedback['ok'] = $this->ok;
            $this->feedback['code'] = $this->code;
            $this->feedback['resource'] = $this->resource;
        }

    //Funcion de validar los atributos de añadir una actividad
    function validar_atributos_add() {
        $nomberExito=$this->validar_Nombre();
        $ecoinsExito=$this->validar_Ecoins();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($ecoinsExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
        if ($this->tipo !== ''){ 
            $tipoExito=$this->validar_Tipo();
            if (is_array($tipoExito)) {
                return $this->feedback;
            }            
        }
       
        return true;
       
    }

    //Funcion de validar los atributos de editar una actividad
    function validar_atributos_edit() {
        $nomberExito=$this->validar_Nombre();
        $ecoinsExito=$this->validar_Ecoins();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($ecoinsExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }

        if ($this->tipo !== ''){ 
            $tipoExito=$this->validar_Tipo();
            if (is_array($tipoExito)) {
                return $this->feedback;
            }            
        }
        return true;

   }


    //Funcion de validar los atributos de una busqueda de actividad
    function validar_atributos_search() {

        if ($this->nombre !== ''){ 
            $nomberExito=$this->validar_Nombre_buscar();
            if  (is_array($nomberExito)) {
                return $this->feedback;
            }
        }
        if ($this->tipo !== ''){ 
            $tipoExito=$this->validar_Tipo();
            if (is_array($tipoExito)) {
                return $this->feedback;
            }            
        }
        
        return true;
       
    }


    //Funcion de validar el nombre de una actividad
    function validar_Nombre() {
        $this->resource = 'Actividad';

        if ($this->no_vacio($this->nombre) === false) {
            $this->code = '60017';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '60018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '60019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->nombre, 2) === false) {
            $this->code = '60020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

    }

    //Funcion de validar el nombre de una actividad
    function validar_Nombre_buscar() {
        $this->resource = 'Actividad';

        if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '60018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '60019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }


    }

    //Funcion de validar las ecoins de una actividad
    function validar_Ecoins() {
        $this->resource = 'Actividad';

        if ($this->no_vacio($this->ecoins) === false) {
            $this->code = '60031';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_numerico($this->ecoins) === false) {
            $this->code = '60032';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        
        }


    //Funcion de validar el tipo de una actividad
    function validar_Tipo() {
        $this->resource = 'Actividad';
    
    
        if ($this->es_tipo_actividad($this->tipo) === false) {
            $this->code = '60035';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        
        }
    
    }
    
    //Funcion de validar la descripción de una actividad
    function validar_Descripcion() {

        $this->resource = 'Actividad';


        if ($this->es_alfanumerico_especiales($this->descripcion) === false) {
            $this->code = '60022';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        
        }

        else if ($this->longitud_maxima($this->descripcion, 255) === false) {
            $this->code = '60023';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        
        }

    }
    
    //Funcion de validar el seek por nombre

    function validar_atributos_seek_nombre() {
        $this->validar_nombre();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }



}


?>