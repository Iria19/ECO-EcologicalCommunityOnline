<?php

include_once './Common/Validator.php';

//clase de validaciones de documentacion
class Documentacion_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

       var $ok = true;
       var $code = '00000';
       var $resource = '';
       var $feedback = array();
       var $errores_datos = array();

    var $validado;

    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Validaciones editar
    function validar_atributos_edit() {
        $validadoExito=$this->validar_Validado();

        if (is_array($validadoExito)) {return $this->feedback;}
   }


   //Validaciones buscar
    function validar_atributos_search() {

        if ($this->validado !== ''){ 
            $validadoExito=$this->validar_Validado();
            if  (is_array($validadoExito)) {
                
                return $this->feedback;
            }
        }
        return true;
       
    }

    //Validar atributo validado
    function validar_Validado() {

        $this->resource = 'Documentacion';

        if ($this->no_vacio($this->validado) === false) {
            $this->code = '80030';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->es_validado($this->validado) === false) {
            $this->code = '80029';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

}


?>