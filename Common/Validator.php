<?php
//esta clase contiene las funciones basicas para las validaciones
class Validator {

    function __construct(){}
    function __destruct(){}

    //comprobar es vacio
    function no_vacio($string){
        if(!preg_match('/.+$/', $string) || $string == ''){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud maxima
    function longitud_maxima($string, $max){
        if(strlen($string) <= $max){
            return true;
        } else {
            return false;
        }
    }

    //comprobar longitud minima
    function longitud_minima($string, $min){
        if(strlen($string) < $min){
            return false;
        } else {
            return true;
        }
    }
    
    //comprobar longitud es alfabetico
    function es_alfabetico($string){
        if (!preg_match('/^[A-Za-zÁáÉéíÍóÓúÚÀ-úñÑ]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico y espacio
    function es_alfabetico_espacios($string){
        if (!preg_match('/^[A-Za-zÁáÉéíÍóÓúÚÀ-úñÑ\s]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico, espacios y guiones
    function es_alfabetico_guiones_espacios($string) {
        if (!preg_match('/^[-A-Za-zÁáÉéíÍóÓúÚÀ-úñÑ\s]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }
    
    //comprobar longitud es numerico
    function es_numerico($string){
        if (!preg_match('/^[-]?[0-9]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es decimal
    function es_decimal($string) {
        if (!preg_match('/[0-9]+(\.[0-9][0-9]?)?/', $string)) {
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico y/o numerico
    function es_alfanumerico($string){
        if (!preg_match('/^[A-Za-zÁáÉéíÍóÓúÚÀ-ú0-9ñÑ]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //es alfabeticoDNI
    function es_alfanumericoDNI($string){
        if (!preg_match('/^[A-Za-z0-9]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico,numerico o espacios

    function es_alfanumerico_espacios($string) {
        if (!preg_match('/^[A-Za-zÁáÉéíÍóÓúÚÀ-ú0-9ñÑ\s]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico,numerico o guiones
    function es_alfanumerico_guiones($string) {
        if (!preg_match('/^[-_A-Za-zÁáÉéíÍóÓúÚÀ-ú0-9ñÑ]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar longitud es alfabetico,numerico o caracteres especiales
    function es_alfanumerico_especiales($string) {
        if (!preg_match('/^[,\‘.\/&ªºÁáÉéíÍóÓúÚA-Za-zÀ-ú0-9ñÑ\s]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }
    
    //funcion para buscar email
    function es_email_buscar($string) {
        if (!preg_match('/^[.@A-z0-9ÑñÀ-ú\s]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }
    
    //funcion para buscar telefono
    function es_telefono_buscar($string) {
        if (!preg_match('/^[-0-9\s ]+$/', $string)){
            return false;
        } else {
            return true;
        }
    }
    //comprobacion mayor
    function es_mayor($string, $min) {
        if(intval($string) > $min){
            return true;
        } else {
            return false;
        }
    }

    //comprobacion mayor o igual
    function es_mayor_igual($string, $min) {
        if(intval($string) >= $min){
            return true;
        } else {
            return false;
        }
    }

    //comprobacion menor
    function es_menor($string, $max) {
        if(intval($string) < $max){
            return true;
        } else {
            return false;
        }
    }

    function es_menor_igual($string, $max) {
        if(intval($string) <= $max){
            return true;
        } else {
            return false;
        }
    }

    //comprobar formato email
    function formato_email($string){
        if(filter_var($string, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }

    //comprobar formato telefono
    function formato_telefono($string) {
        if(!preg_match('/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/', $string)){
            return false;
        } else {
            return true;
        }
    }

    //comprobar formato DNI
    function formato_DNI($string){
        $letra = substr($string, -1);
        $numeros = substr($string, 0, -1);
        $valido;
        if(
            preg_match('/^((([X-Z])|([LM])){1}([-]?)((\d){7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]))$/', $string)
        ){
            if(preg_match('/^(([X-Z])|([LM])){1}([-]?)/',$string)){//En caso de que sea NIE
                return true;
            }else{
                if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1)== $letra ){
                    return true;
                }else{
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    //comprobar formato fecha
    function formato_fecha($string){
        if(preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/', $string)){
            return true;
        } else {
            return false;
        }
    }

    //comprobar tipo usuario
    function es_tipo($string) {
        if ($string == 'estandar' || $string == 'administrador') {
            return true;
        } else {
            return false;
        }
    }

    //comprobar atributo validado
    function es_validado($string) {
        if ($string == 'Si' || $string == 'No') {
            return true;
        } else {
            return false;
        }
    }

    //comprobar tipo actividad
    function es_tipo_actividad($string) {
        if ($string == 'interior' || $string == 'exterior') {
            return true;
        } else {
            return false;
        }
    }

    //comprobar tipo participacion de un usuario en un grupo
    function es_tipo_participacion($string) {
        if ($string == 'participa' || $string == 'sigue') {
            return true;
        } else {
            return false;
        }
    }
}

?>