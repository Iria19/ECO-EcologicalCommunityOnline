<?php
//Vista borrar mensaje
class Mensaje_Delete
{

    var $mensaje;

    function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="mensaje-deletion-msg">Estas seguro de que quieres borrar el mensaje <?php echo $this->mensaje['id_mensaje'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="mensaje-deletion-msgs">Una vez realizes esta acción, no será posible recuperar el mensaje </p>

                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Mensaje');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_mensaje','<?php echo $this->mensaje['id_mensaje'] ?>');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>