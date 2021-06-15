<?php

//Vista editar usuarios en un grupo
class Usuario_Grupo_Edit
{


    var $usuariogrupo;
    var $grupos;

    function __construct($usuariogrupo, $grupos)
    {
        $this->usuariogrupo = $usuariogrupo;
        $this->grupos = $grupos;

        $this->es_admin = es_admin();

        if (($this->es_admin) || ($_SESSION['username'] == $this->grupos['responsable_grupo'])) {
            $this->renderadmin();
        } else {
            $this->render();
        }
    }

    function renderadmin()
    {
        include 'header.php';
?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">

                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar</h1>
                        </div>
                        <h3><?php echo $this->grupos['nombre'] ?></h3>
                        <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->usuariogrupo['id_grupo'] ?>">
                        <!--id grupo del que viene-->
                        <br>
                        <label class="username" for="username">Nombre Usuario</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $this->usuariogrupo['username']  ?>" readonly>

                        <br>
                        <label class="ecoins" for="ecoins">Ecoins</label>
                        <input type="number" id="ecoins" name="ecoins" class="form-control" value="<?php echo $this->usuariogrupo['ecoins'] ?>">

                        <br>
                        <div>
                            <label class="tipo_participacion">Tipo Participacion</label>

                            <select class="form-select" name="tipo_participacion" id="select_grupo">
                                <option value="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" id="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" name="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" selected><?php echo $this->usuariogrupo['tipo_participacion'] ?></option>
                                <option value="participa" id='participa' name="participa">Participa</option>
                                <option value="sigue" id='sigue' name="sigue">Sigue</option>

                            </select>
                        </div>
                        <br>
                        <div class="mt-3">
                            <br>
                            <a class="boton_eco volverbtn" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo',<?php echo ($_POST['id_grupo']); ?>);insertacampo(document.formenviar,'controller','Usuario_Grupo');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_grupo','<?php echo $this->usuariogrupo['id_grupo'] ?>');insertacampo(document.editForm,'username','<?php echo $this->usuariogrupo['username'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Usuario_Grupo'); enviaform(document.editForm);">
                                Editar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php

        include 'footer.php';
    }

    function render()
    {
        include 'header.php';
    ?>

        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signupgrupo" name="editForm" method="post">
                        <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar</h1>

                        <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $usuariogrupo['id_grupo'] ?>">
                        <!--id grupo del que viene-->

                        <input type="hidden" id="username" name="username" class="form-control" value="<?php echo $usuariogrupo['username'] ?>">

                        <input type="hidden" id="ecoins" name="ecoins" class="form-control" value="<?php echo $this->usuariogrupo['ecoins'] ?>" readonly>

                        <h3><?php echo $this->grupos['nombre'] ?></h3>
                        <div>
                            <label class="tipo_participacion">Tipo Participacion</label>
                            <select class="form-select" name="tipo_participacion" id="select_grupo">
                                <option value="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" id="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" name="<?php echo $this->usuariogrupo['tipo_participacion'] ?>" selected><?php echo $this->usuariogrupo['tipo_participacion'] ?></option>
                                <option value="participa" id="participa" name="participa">Participa</option>
                                <option value="sigue" id="sigue" name="sigue">Sigue</option>

                            </select>
                        </div>
                        <br>
                        <a class="boton_eco volverbtn" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo',<?php echo ($_POST['id_grupo']); ?>);insertacampo(document.formenviar,'controller','Usuario_Grupo');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco UserGroupEditPal" type="button" onclick="insertacampo(document.editForm,'id_grupo','<?php echo $this->usuariogrupo['id_grupo'] ?>');insertacampo(document.editForm,'username','<?php echo $this->usuariogrupo['username'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Usuario_Grupo'); enviaform(document.editForm);">
                            Editar usuario en el grupo
                        </a>
                </div>

                </form>
            </div>
        </div>
        </div>


<?php

        include 'footer.php';
    }
}

?>