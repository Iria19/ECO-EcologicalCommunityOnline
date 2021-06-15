<?php

include_once './Common/Validator.php';
//Clase validar mensaje

class Mensaje_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

    var $ok = true;
    var $code = '00000';
    var $resource = '';
    var $feedback = array();
    var $errores_datos = array();

    var $titulo;
    var $cuerpo;
    var $leido;
    var $emisor;
    var $receptor;

    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Validar añadir
    function validar_atributos_add() {
        
        $tituloExito=$this->validar_titulo();

        if (is_array($tituloExito)) {return $this->feedback;}

        if ($this->cuerpo !== ''){ 
            $cuerpoExito=$this->validar_Cuerpo();
            if (is_array($cuerpoExito)) {
                return $this->feedback;
            }
        }
       
        return true;
       
    }

    //Validar bucar
    function validar_atributos_search() {

        if ($this->titulo !== ''){ 
            $tituloExito=$this->validar_Titulo();
            if  (is_array($tituloExito)) {
                return $this->feedback;
            }
        }
        if ($this->leido !== ''){ 
            $leidoExito=$this->validar_Leido();
            if  (is_array($leidoExito)) {
                return $this->feedback;
            }
        }
        
        if ($this->cuerpo !== ''){ 
            $cuerpoExito=$this->validar_Cuerpo();
            if (is_array($cuerpoExito)) {
                return $this->feedback;
            }
        }

        return true;
       
    }

    //Validar atributo leido
    function validar_Leido() {

        $this->resource = 'Mensaje';

        if ($this->es_validado($this->leido) === false ) {
            $this->code = '50016';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar atributo tirulo
    function validar_Titulo() {
        $this->resource = 'Mensaje';

        if ($this->no_vacio($this->titulo) === false) {
            $this->code = '50018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_alfabetico_espacios($this->titulo) === false) {
            $this->code = '50019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->titulo, 20) === false) {
            $this->code = '50020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->titulo, 2) === false) {
            $this->code = '50021';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

    }

    //Validar titual al buscar
    function validar_Titulo_buscar() {
        $this->resource = 'Mensaje';


         if ($this->es_alfabetico_espacios($this->titulo) === false) {
            $this->code = '50019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->titulo, 20) === false) {
            $this->code = '50020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar cuerpo
    function validar_Cuerpo() {

        $this->resource = 'Mensaje';


        if ($this->es_alfanumerico_especiales($this->cuerpo) === false) {
            $this->code = '50023';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->cuerpo, 255) === false) {
            $this->code = '50024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

}


?>