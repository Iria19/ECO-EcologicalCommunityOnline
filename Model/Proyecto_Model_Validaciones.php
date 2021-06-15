<?php

include_once './Common/Validator.php';

//Validaciones proyecto
class Proyecto_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

    var $ok = true;
    var $code = '00000';
    var $resource = '';
    var $feedback = array();
    var $errores_datos = array();

    var $nombre;
    var $descripcion;
    var $responsable_proyecto;


    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Validar añadir proyecto
    function validar_atributos_add() {
        
        $nomberExito=$this->validar_Nombre();
        $responsable_proyectExito=$this->validar_responsable_proyecto();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($responsable_proyectExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
       
        return true;
       
    }

    //Validar editar proyecto
    function validar_atributos_edit() {
        $nomberExito=$this->validar_Nombre();
        $responsable_proyectExito=$this->validar_responsable_proyecto();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($responsable_proyectExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
       
   }


   //Validar buscar proyecto
    function validar_atributos_search() {

        if ($this->nombre !== ''){ 
            $nomberExito=$this->validar_Nombre_buscar();
            if  (is_array($nomberExito)) {
                return $this->feedback;
            }
        }

        return true;
       
    }

    //Validar atributo nombre
    function validar_Nombre() {
        $this->resource = 'Proyecto';

        if ($this->no_vacio($this->nombre) === false) {
            $this->code = '40017';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '40018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '40019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->nombre, 2) === false) {
            $this->code = '40020';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

    }

    //Validar atributo nombre al buscar proyecto
    function validar_Nombre_buscar() {
        $this->resource = 'Proyecto';


        if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '40018';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '40019';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar atributo responsable del proyecto
    function validar_responsable_proyecto() {

        $this->resource = 'Proyecto';

        if ($this->no_vacio($this->responsable_proyecto) === false) {
            $this->code = '40035';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;       
        }

    }

    //Validar de descripcion de un proyecto
    function validar_Descripcion() {

        $this->resource = 'Proyecto';


        if ($this->es_alfanumerico_especiales($this->descripcion) === false) {
            $this->code = '40032';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->descripcion, 255) === false) {
            $this->code = '40033';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //validar busqueda por nombre
    function validar_atributos_seek_nombre() {
        $this->validar_nombre();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }

}


?>