<?php

include_once './Common/Validator.php';
//Clase comprobar usuario grupo

class Usuario_Grupo_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

       var $ok = true;
       var $code = '00000';
       var $resource = '';
       var $feedback = array();
       var $errores_datos = array();

    var $ecoins;
    var $tipo_participacion;
    var $username;

    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Validaciones añadir
    function validar_atributos_add() {
        
        $ecoinsExito=$this->validar_Ecoins();

        if (is_array($ecoinsExito)) {return $this->feedback;}

       
        $tipoExito=$this->validar_Tipo();

        if (is_array($tipoExito)) {return $this->feedback;}
        
        return true;
       
    }

    //Validaciones editar
    function validar_atributos_edit() {

        $ecoinsExito=$this->validar_Ecoins();

        if (is_array($ecoinsExito)) {return $this->feedback;}

        
        $tipoExito=$this->validar_Tipo();

        if (is_array($tipoExito)) {return $this->feedback;}
       
   }


   //Validaciones buscar
    function validar_atributos_search() {

        if ($this->ecoins !== ''){ 
            $ecoinsExito=$this->validar_Ecoins();
            if  (is_array($ecoinsExito)) {
                return $this->feedback;
            }
        }

  

        if ($this->tipo_participacion !== ''){ 
            $tipoparticipacionExito=$this->validar_Tipo();
            if  (is_array($tipoparticipacionExito)) {
                return $this->feedback;
            }
        } 
        return true;
       
    }


        //Funcion de validar el tipo de participacion
        function validar_Tipo() {
            $this->resource = 'Usuario_Grupo';

            if ($this->no_vacio($this->tipo_participacion) === false) {
                $this->code = '30026';
                $this->ok = false;
                $this->construct_response();
                return $this->feedback;        }
    
            if ($this->es_tipo_participacion($this->tipo_participacion) === false) {
                $this->code = '30025';
                $this->ok = false;
                $this->construct_response();
                return $this->feedback;        }
    
        }
        
    //Funcion de validar las ecoins de un usuario en grupo
    function validar_Ecoins() {
        $this->resource = 'Usuario_Grupo';

        if ($this->no_vacio($this->ecoins) === false) {
            $this->code = '30029';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_numerico($this->ecoins) === false) {
            $this->code = '30027';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        
        }


}


?>