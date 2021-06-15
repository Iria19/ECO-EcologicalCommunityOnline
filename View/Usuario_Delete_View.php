<?php

class Usuario_Delete {

    var $usuario;

    function __construct($usuario) {
        $this->usuario = $usuario;
        $this->render();
    }

    function render() {
        include 'header.php';
        ?>
            <div class="alert alert-warning m-5" role="alert">
                <form class="form-signup" name="deleteForm" method="post">

                    <h4 style="alert-heading system-error-msg" class="user-deletion-msg">Estas seguro de que quieres borrar a <?php echo $this->usuario['username'].'?'; ?></h4>
                    <p style="alert-heading system-error-msg" class="user-deletion-msg">Una vez realizes esta acción, no será posible recuperar el usuario </p>

                    <hr>
                    <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                        Volver
                    </a>
                    <a class="mb-0 btn boton_eco filter borrarbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $this->usuario['username']?>');insertacampo(document.formenviar,'controller','Usuario');insertacampo(document.formenviar,'action','delete');enviaform(document.formenviar);">
                        Borrar
                    </a>
                </form>
            </div>
        <?php

        include 'footer.php';
    }

}

?>