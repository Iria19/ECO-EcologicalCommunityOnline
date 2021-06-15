
<?php
//Clase controladoe de registrarse
class Registro {

    function __construct() {         

        //Importo lo necessario
        include './View/Message_View.php';
        include './Model/Usuario_Model.php';
        include_once './Model/Mensaje_Model.php';

    }
    //Form registrarse
   
    function formRegistrar() {//importo vista de registro y creo vista
        include './View/Registro_View.php';
        new Registro_View();//vista
    }
    
    //Registrarse
    function registrar() {
        $usuario = new Usuario_Model();//Creo nuevo modelo

        $feedback = $usuario->registrar();
        if ($feedback['ok'] === true){//Si se inserto
            session_start();//Inicia sesion
            $_SESSION['username'] = $usuario->username;//la sesion con username
            if ($usuario->esAdmin()) {//guardo tipo usuario
                $_SESSION['tipo'] = "administrador";
            }else{
                $_SESSION['tipo'] ="estandar";
            }
            $mensaje = new Mensaje_Model();
            $feedbackmensajes = $mensaje->Notificaciones($_SESSION['username']);//buscao notificaciones de usuario
            $_SESSION['Notificaciones'] =$feedbackmensajes;//las guardo
            
            header('location: ./index.php');//header
        } else {
            new Message($feedback['code'], 'Registro', 'formregistrar');//Si no se inserto mensaje
        }
    }
    
}

?>