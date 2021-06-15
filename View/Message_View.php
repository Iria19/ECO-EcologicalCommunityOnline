<?php

//Vista de mensajes del sistema
class Message
{

    var $msg;
    var $controller;
    var $action;

    function __construct($msg, $controller, $action)
    {
        $this->msg = $msg;
        $this->controller = $controller;
        $this->action = $action;
        $this->render();
    }

    function render()
    {
        include 'header.php';

?>
        <div class="alert alert-warning m-5" role="alert">
            <h4 class="alert-heading system-error-msg">Mensaje del Sistema</h4>
            <p class="<?php echo $this->msg ?>"></p>
            <hr>
            <a class="mb-0 cerrar-boton" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','<?php echo $this->action; ?>'); insertacampo(document.formenviar,'controller','<?php echo $this->controller; ?>');enviaform(document.formenviar);">
                Cerrar
            </a>
        </div>
<?php

        include 'footer.php';
    }
}

?>