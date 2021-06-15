<?php

class Documentacion_Delete
{

    var $documentacion;

    function __construct($documentacion)
    {
        $this->documentacion = $documentacion;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="documentacion-deletion-msg">Estas seguro de que quieres borrar la documentacion <?php echo $this->documentacion['id_documentacion'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="documentacion-deletion-msgs">Una vez realizes esta acción, no será posible recuperar la documentacion </p>

                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_documentacion','<?php echo $this->documentacion['id_documentacion'] ?>');insertacampo(document.formenviar,'archivo','<?php echo $this->documentacion['archivo'] ?>');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>