<?php

//vista de borrar proyecto
class Proyecto_Delete
{

    var $proyecto;

    function __construct($proyecto)
    {
        $this->proyecto = $proyecto;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="proyect-deletion-msg">Estas seguro de que quieres borrar el proyecto <?php echo $this->proyecto['id_proyecto'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="proyect-deletion-msg">Una vez realizes esta acción, no será posible recuperar el proyecto </p>

                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_proyecto','<?php echo $this->proyecto['id_proyecto'] ?>');insertacampo(document.formenviar,'controller','Proyecto');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>