<?php
//Vista eliminar actividad
class Actividad_Delete
{

    var $actividad;

    function __construct($actividad)
    {
        $this->actividad = $actividad;

        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="actividad-deletion-msg">Estas seguro de que quieres borrar la actividad <?php echo $this->actividad['id_actividad'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="actividad-deletion-msgs">Una vez realizes esta acción, no será posible recuperar la actividad </p>
                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividad');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividad','<?php echo $this->actividad['id_actividad'] ?>');insertacampo(document.formenviar,'id_grupo','<?php echo $this->actividad['id_grupo'] ?>');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>