<?php

//Vista de editar proyecto
class Proyecto_Edit
{

    var $usuarios;
    var $proyecto;

    function __construct($usuarios, $proyecto)
    {

        $this->usuarios = $usuarios;
        $this->proyecto = $proyecto;

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
                            <h1 class="usuarionombrecolor"><?php echo $this->proyecto['nombre'] ?>:<?php echo $this->proyecto['id_proyecto'] ?></h1>
                        </div>


                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->proyecto['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->proyecto['descripcion'] ?>" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100));">

                        <br>
                        <label class="responsable_proyecto">Responsable Proyecto</label>
                        <div>
                            <select class="form-select" name="responsable_proyecto" id="select_responsable" required>
                                <option value="<?php echo $this->proyecto['responsable_proyecto'] ?>" id="<?php echo $this->proyecto['responsable_proyecto'] ?>" name="<?php echo $this->proyecto['responsable_proyecto'] ?>" selected><?php echo $this->proyecto['responsable_proyecto'] ?></option>

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
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_proyecto','<?php echo $this->proyecto['id_proyecto'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Proyecto'); enviaformcorrecto(document.editForm, comprobar_proyecto());">
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