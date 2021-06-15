<?php
//Clase abstracta de los test de model
abstract class Default_Model_Test {

    static function test_accion($entidad, $action, $atributos, $error_esperado, $mensaje_error, $array_resultados){
        $model = $entidad.'_Model';
        $obj = new $model;
        foreach ($atributos as $key => $value) {
            $obj->$key = $value;
        }
        $feedback = $obj->$action();

        //si es array de array esto se hace en bucle
        $resultado['entidad'] = $entidad;
        $resultado['atributo'] = 'tupla';
        $resultado['error'] = $mensaje_error;
        $resultado['dato'] = $atributos;
        $resultado['esperado'] = $error_esperado;
        $resultado['obtenido'] = $feedback['code'];
        if ($feedback['code'] === $error_esperado){
            $resultado['conclusion'] = '1';	
        }
        else{
            $resultado['conclusion'] = '0';		
        }

        array_push($array_resultados, $resultado);
        return $array_resultados;
    }


}

?>