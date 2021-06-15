<?php

//Vista eliminar grupo
class Grupo_Delete
{

    var $grupo;

    function __construct($grupo)
    {
        $this->grupo = $grupo;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="group-deletion-msg">Estas seguro de que quieres borrar el grupo <?php echo $this->grupo['id_grupo'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="group-deletion-msg">Una vez realizes esta acción, no será posible recuperar el grupo </p>

                <hr>
                <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo','<?php echo $this->grupo['id_grupo'] ?>');insertacampo(document.formenviar,'controller','Grupo');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>