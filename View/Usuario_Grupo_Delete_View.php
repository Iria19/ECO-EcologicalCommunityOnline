<?php
//Vista borrar usuarios de un grupo

class Usuario_Grupo_Delete
{

    var $usuarioGrupo;

    function __construct($usuarioGrupo)
    {
        $this->usuarioGrupo = $usuarioGrupo;
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="alert alert-warning m-5" role="alert">
            <form class="form-signup" name="deleteForm" method="post">

                <h4 style="alert-heading system-error-msg" class="user-deletion-msg">Estas seguro de que quieres borrar a <?php echo $this->usuarioGrupo['username'] . '?'; ?></h4>
                <p style="alert-heading system-error-msg" class="usergroup-deletion-msg">Una vez realizes esta acción, no será posible recuperar la información del usuario en el grupo </p>

                <hr>
                <a class="boton_eco volverbtn" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo',<?php echo ($_POST['id_grupo']); ?>);insertacampo(document.formenviar,'controller','Usuario_Grupo');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">
                    Volver
                </a>
                <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $this->usuarioGrupo['username'] ?>');insertacampo(document.formenviar,'id_grupo','<?php echo $this->usuarioGrupo['id_grupo'] ?>');insertacampo(document.formenviar,'controller','Usuario_Grupo');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                    Borrar
                </a>
            </form>
        </div>
<?php

        include 'footer.php';
    }
}

?>