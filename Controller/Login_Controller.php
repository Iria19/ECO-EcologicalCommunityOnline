<?php

//Controlador de logearse
class Login
{

    function __construct()
    { //Importo lo necessario
        include './View/Message_View.php';
        include './Model/Usuario_Model.php';
        include_once './Model/Mensaje_Model.php';
    }

    function formulariologin()
    {
        include './View/Login_View.php'; //Importo vista de login
        new Login_View(); //Creo nueva vista de login
    }

    //Logearse
    function login()
    {
        $usuario = new Usuario_Model(); //nuevo Model

        $feedback = $usuario->login(); //metodo login

        if ($feedback['ok'] === true) { //se logea bien
            $_SESSION['username'] = $usuario->username; //sesion de usuario con username

            //guardo en sesion tipo usuario  
            if ($usuario->esAdmin()) {
                $_SESSION['tipo'] = "administrador";
            } else {
                $_SESSION['tipo'] = "estandar";
            }

            //guardo en sesion numero de notificacionses
            $mensaje = new Mensaje_Model();
            $feedbackmensajes = $mensaje->Notificaciones($_SESSION['username']);
            $_SESSION['Notificaciones'] = $feedbackmensajes;

            header('location: ./index.php'); //header
        } else {
            new Message($feedback['code'], 'login', 'formulariologin'); //Si no se logea bien mensaje
        }
    }

    function logout()
    { //deslogearse
        session_destroy();
        header('location: ./index.php'); //Va al index
    }
}

?>