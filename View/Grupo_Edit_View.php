<?php

//Vista editar grupo
class Grupo_Edit
{

    var $usuarios;
    var $grupo;
    function __construct($usuarios, $grupo)
    {

        $this->usuarios = $usuarios;
        $this->grupo = $grupo;

        $this->render();
    }

    function render()
    {
        include 'header.php';
?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">

                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->grupo['nombre'] ?>:<?php echo $this->grupo['id_grupo'] ?></h1>
                        </div>


                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->grupo['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <!--Comprobaciones y las del final al enviar form-->

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->grupo['descripcion'] ?>" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100));">

                        <br>

                        <label class="responsable_grupo">Responsable Grupo</label>
                        <div>
                            <select class="form-select" name="responsable_grupo" id="select_responsable" required>
                                <option value="<?php echo $this->grupo['responsable_grupo'] ?>" id="<?php echo $this->grupo['responsable_grupo'] ?>" name="<?php echo $this->grupo['responsable_grupo'] ?>" selected><?php echo $this->grupo['responsable_grupo'] ?></option>

                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) {
                                        echo "<option " .
                                            "value=" . `"` . $usuario['username'] . `"` . '>' .
                                            $usuario['username'] .
                                            "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_grupo','<?php echo $this->grupo['id_grupo'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Grupo'); enviaformcorrecto(document.editForm, comprobar_grupo());">
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
}

?>