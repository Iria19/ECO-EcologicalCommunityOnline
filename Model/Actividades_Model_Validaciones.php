<?php

include_once './Common/Validator.php';

//Clase que valida el model de actividades
class Actividades_Model_Validaciones extends Validator
{
    function __construct()
    {
    }
    function __destruct()
    {
    }

    var $ok = true;
    var $code = '00000';
    var $resource = '';
    var $feedback = array();
    var $errores_datos = array();

    var $nombre;
    var $fecha;
    var $validado;
    var $id_actividad;

    protected function construct_response()
    { //Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Funcion para validar el añadir de actividades
    function validar_atributos_add()
    {
        $nomberExito = $this->validar_Nombre();
        $fechaExito = $this->validar_Fecha();
        $validadoExito = $this->validar_Validado();

        if (is_array($nomberExito)) {
            return $this->feedback;
        }
        if (is_array($fechaExito)) {
            return $this->feedback;
        }
        if (is_array($validadoExito)) {
            return $this->feedback;
        }


        return true;
    }

    //Funcion para validar el editar de actividades

    function validar_atributos_edit()
    {
        $nomberExito = $this->validar_Nombre();
        $fechaExito = $this->validar_Fecha();
        $validadoExito = $this->validar_Validado();

        if (is_array($nomberExito)) {
            return $this->feedback;
        }
        if (is_array($fechaExito)) {
            return $this->feedback;
        }
        if (is_array($validadoExito)) {
            return $this->feedback;
        }

        return true;
    }


    //Funcion para validar el buscar de actividades

    function validar_atributos_search()
    {

        if ($this->nombre !== '') {
            $nomberExito = $this->validar_Nombre_buscar();
            if (is_array($nomberExito)) {
                return $this->feedback;
            }
        }
        if ($this->fecha !== '') {
            $nomberExito = $this->validar_Fecha();
            if (is_array($nomberExito)) {
                return $this->feedback;
            }
        }

        return true;
    }

    //Funcion para validar el nombre de  actividades
    function validar_Nombre()
    {
        $this->resource = 'Actividades';

        if ($this->no_vacio($this->nombre) === false) {
            $this->code = '70022';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '70023';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '70024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->longitud_minima($this->nombre, 2) === false) {
            $this->code = '70025';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }
    }

    //Funcion validar nombre al buscar
    function validar_Nombre_buscar()
    {
        $this->resource = 'Actividades';

        if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '70023';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '70024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }
    }

    //Funcion para validar el atributo validado de  actividades

    function validar_Validado()
    {

        $this->resource = 'Actividades';

        if ($this->no_vacio($this->validado) === false) {
            $this->code = '70032';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->es_validado($this->validado) === false) {
            $this->code = '70033';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }
    }

    //Funcion para validar la fecha de  actividades

    function validar_Fecha()
    {
        $this->resource = 'Actividades';
        $fecha_menor = strtotime("2021-01-01 00:00:00");
        $fecha_mayor = strtotime("2050-01-01 00:00:00");
        $fecha_entrada = strtotime($this->fecha);

        if ($this->no_vacio($this->fecha) === false) {
            $this->code = '70027';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($this->formato_fecha($this->fecha) === false) {
            $this->code = '70028';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($fecha_entrada > $fecha_mayor) {
            $this->code = '70029';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        } else if ($fecha_entrada < $fecha_menor) {
            $this->code = '70030';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }
    }
}
