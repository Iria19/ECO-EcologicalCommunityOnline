<?php

//Clase padre de los controladores, salvo de logearse y registrarse
class _Default {

    function __construct() {
        null;
        include_once './Model/Mensaje_Model.php';
        include_once './Model/Usuario_Model.php';
        $usuarionotificaciones = new Usuario_Model();
        $mensaje = new Mensaje_Model();
        //en caso de estar autenticado
        if (is_authenticated()) {
        $feedbackmensajes = $mensaje->Notificaciones($_SESSION['username']);//cojo valor notificaciones del usuario
        $_SESSION['Notificaciones'] =$feedbackmensajes;//guardo notificaciones es sesion para actualizar facilmente
        }
    }

    //Por defecto se muestra dashboard que llama a Dashboard_View
    function _default() {
        $this->dashboard();
    }

    function dashboard() {
        include './View/Dashboard_View.php';
        new Dashboard();
    }

}

?>