<?php
//vista de eliminar actividades
class Actividades_Delete
{

    var $actividades;

    function __construct($actividades)
    {
        $this->actividades = $actividades;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="aactividades-deletion-msg">Estas seguro de que quieres borrar la actividad <?php echo $this->grupo['id_grupo'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="actividadd-deletion-msg">Una vez realizes esta acción, no será posible recuperar la actividad </p>

                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividades');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividades','<?php echo $this->actividades['id_actividades'] ?>');insertacampo(document.formenviar,'controller','Actividades');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>