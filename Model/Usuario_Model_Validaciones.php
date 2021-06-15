<?php

include_once './Common/Validator.php';

//Validaciones de usuario
class Usuario_Model_Validaciones extends Validator {
    function __construct(){}
    function __destruct(){}

       var $ok = true;
       var $code = '00000';
       var $resource = '';
       var $feedback = array();
       var $errores_datos = array();

    var $username;
    var $nombre;
    var $apellidos;
    var $contrasenha;
    var $email;
    var $descripcion;
    var $telefono;
    var $tipo;
    var $DNI;

    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Validaciones añadir
    function validar_atributos_add() {
        
        $usernameExito=$this->validar_Username();
        $nomberExito=$this->validar_Nombre();
        $apellidosExito=$this->validar_Apellidos();
        $contrasenhaExito=$this->validar_Contrasenha();
        $emailExito=$this->validar_Email();
        $tipoExito=$this->validar_Tipo();

        if (is_array($usernameExito)) {return $this->feedback;}
        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($apellidosExito)) {return $this->feedback;}
        if (is_array($contrasenhaExito)) {return $this->feedback;}
        if (is_array($emailExito)) {return $this->feedback;}
        if (is_array($tipoExito)) {return $this->feedback;}
        
        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
       
        if ($this->telefono !== ''){
            $telefonoExito=$this->validar_Telefono();
            if (is_array($telefonoExito)) {
                return $this->feedback;
            }
        }       

        if ($this->DNI !== ''){ 
            $DNIExito=$this->validar_DNI();
            if (is_array($DNIExito)) {
                return $this->feedback;
            }
        }
        return true;
       
    }

    //Validaciones editar
    function validar_atributos_edit() {
        $nomberExito=$this->validar_Nombre();
        $apellidosExito=$this->validar_Apellidos();
        $contrasenhaExito=$this->validar_Contrasenha();
        $emailExito=$this->validar_Email();
        $tipoExito=$this->validar_Tipo();

        if (is_array($nomberExito)) {return $this->feedback;}
        if (is_array($apellidosExito)) {return $this->feedback;}
        if (is_array($contrasenhaExito)) {return $this->feedback;}
        if (is_array($emailExito)) {return $this->feedback;}
        if (is_array($tipoExito)) {return $this->feedback;}

        if ($this->descripcion !== ''){ 
            $descripcionExito=$this->validar_Descripcion();
            if (is_array($descripcionExito)) {
                return $this->feedback;
            }
        }
        if ($this->telefono !== ''){
            $telefonoExito=$this->validar_Telefono();
            if (is_array($telefonoExito)) {
                return $this->feedback;
            }
        }       

        if ($this->DNI !== ''){ 
            $DNIExito=$this->validar_DNI();
            if (is_array($DNIExito)) {
                return $this->feedback;
            }
        }

        return true;
   }


   //Validaciones buscar
    function validar_atributos_search() {
        if ($this->username !== '') { 
            $usernameExito=$this->validar_Username_buscar();
            if (is_array($usernameExito)) {
                return $this->feedback;
            }
        }
        if ($this->nombre !== ''){ 
            $nomberExito=$this->validar_Nombre_buscar();
            if  (is_array($nomberExito)) {
                return $this->feedback;
            }
        }
        if ($this->apellidos !== ''){
            $apellidosExito=$this->validar_Apellidos_buscar();
            if (is_array($apellidosExito)) {
                return $this->feedback;
            }
        }
        if ($this->email !== ''){ 
            $emailExito=$this->validar_Email_buscar();
            if (is_array($emailExito)) {
                return $this->feedback;
            }
        }
        if ($this->telefono !== ''){
            $telefonoExito=$this->validar_Telefono_buscar();
            if (is_array($telefonoExito)) {
                return $this->feedback;
            }
        }
        if ($this->DNI !== ''){ 
            $DNIExito=$this->validar_DNI_buscar();
            if (is_array($DNIExito)) {
                return $this->feedback;
            }
        }

        return true;
       
    }

    //Validaciones seek
    function validar_atributos_seek() {
        $this->validar_Username();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }

    //Validaciones username(no vacio, alfanumerico,maximo, minimo)
    function validar_Username() {


        $this->resource = 'Usuario';
        if ($this->no_vacio($this->username) === false) {
            $this->code = '10023';
            $this->ok = false;
            $this->construct_response();
             return $this->feedback;
        }

        else if ($this->es_alfanumerico($this->username) === false) {
            $this->code = '10024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;

        }

        else if ($this->longitud_maxima($this->username, 30) === false) {
            $this->code = '10026';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;

        }

        else if ($this->longitud_minima($this->username, 3) === false) {
            $this->code = '10025';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;

        }


    }

    //Validar username buscar(alfabetico,maximo)
    function validar_Username_buscar() {


        $this->resource = 'Usuario';

        if ($this->es_alfanumerico($this->username) === false) {
            $this->code = '10024';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;

        }

        else if ($this->longitud_maxima($this->username, 30) === false) {
            $this->code = '10026';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;

        }


    }

    //Validacion nombre(no vacio,alfabetico con espacios,maximo,minimo)
    function validar_Nombre() {
        $this->resource = 'Usuario';

        if ($this->no_vacio($this->nombre) === false) {
            $this->code = '10028';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

        else if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '10029';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '10030';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->nombre, 2) === false) {
            $this->code = '100031';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;
        }

    }

    //Validacion nombre buscar(alfabetico con espacios,maximo)
    function validar_Nombre_buscar() {
        $this->resource = 'Usuario';

         if ($this->es_alfabetico_espacios($this->nombre) === false) {
            $this->code = '10029';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->nombre, 20) === false) {
            $this->code = '10030';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }
    
    //Validacion apellidos(no vacio,alfabetico con espacios,maximo,minimo)

    function validar_Apellidos() {

        $this->resource = 'Usuario';
        if ($this->no_vacio($this->apellidos) === false) {
            $this->code = '10032';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->es_alfabetico_espacios($this->apellidos) === false) {
            $this->code = '10033';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->apellidos, 200) === false) {
            $this->code = '10034';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_minima($this->apellidos, 3) === false) {
            $this->code = '100035';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }
    
    //Validacion apellidos(alfabetico con espacios,maximo)

    function validar_Apellidos_buscar() {

        $this->resource = 'Usuario';


         if ($this->es_alfabetico_espacios($this->apellidos) === false) {
            $this->code = '10033';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->apellidos, 200) === false) {
            $this->code = '10034';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }


    }

    //Validar contraseña(no vacio,maximo, minimo)
    function validar_Contrasenha() {
        $this->resource = 'Usuario';

        if ($this->no_vacio($this->contrasenha) === false) {
            $this->code = '10036';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->contrasenha, 100) === false) {
            $this->code = '10037';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }
            
        else if ($this->longitud_minima($this->contrasenha, 3) === false) {
            $this->code = '100038';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }
    }

    //Validar email(no vacio,formato)
    function validar_Email() {
        $this->resource = 'Usuario';

        if ($this->no_vacio($this->email) === false) {
            $this->code = '10039';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->formato_email($this->email) === false) {
            $this->code = '10040';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar email buscar(formato)
    function validar_Email_buscar() {
        $this->resource = 'Usuario';
        if ($this->es_email_buscar($this->email) === false) {
            $this->code = '10040';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar descripcion(alfanumerico y especiales,maximo)
    function validar_Descripcion() {

        $this->resource = 'Usuario';


        if ($this->es_alfanumerico_especiales($this->descripcion) === false) {
            $this->code = '10043';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->longitud_maxima($this->descripcion, 255) === false) {
            $this->code = '10044';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar telefono(formato)
    function validar_Telefono() {
        $this->resource = 'Usuario';

        if ($this->formato_telefono($this->telefono) === false) {
            $this->code = '10046';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }
    }

    //Validar telefono(formato)
    function validar_Telefono_buscar() {
        $this->resource = 'Usuario';

        if ($this->es_telefono_buscar($this->telefono) === false) {
            $this->code = '10046';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        
        }
    }

    //Validar tipo(tipo,no vacio)
    function validar_Tipo() {

        $this->resource = 'Usuario';

        if ($this->no_vacio($this->tipo) === false) {
            $this->code = '10049';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

        else if ($this->es_tipo($this->tipo) === false) {
            $this->code = '10050';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;        }

    }

    //Validar dni(formato)
    function validar_DNI() {

        $this->resource = 'Usuario';

        if ($this->formato_DNI($this->DNI) === false) {
            $this->code = '10052';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;    
            }
    }

    //Validar dni buscar(alfanumerioDni)    
    function validar_DNI_buscar() {

        $this->resource = 'Usuario';

        if ($this->es_alfanumericoDNI($this->DNI) === false) {
            $this->code = '100052';
            $this->ok = false;
            $this->construct_response();
            return $this->feedback;    
            }
    }

    //Validar seek
    function validar_atributos_seek_email() {
        $this->validar_Email();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }

    //Validar seek dni
    function validar_atributos_seek_DNI() {
        $this->validar_DNI();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }

    //Validar seek telefono
    function validar_atributos_seek_telefono() {
        $this->validar_Telefono();

        $this->errores_datos = array_filter($this->errores_datos, function($error) {
            return $error['ok'] === false;
        });
        return count($this->errores_datos) == 0 ? true : $this->errores_datos;
    }
    



}


?>