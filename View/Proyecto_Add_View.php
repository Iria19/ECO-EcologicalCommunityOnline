<?php

//Vista de añadir proyecto
class Proyecto_Add
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
                    <form class="form-signupgrupo" name="addForm" method="post">
                        <h1 class="h3 mb-4 font-weight-normal ProyectAddPal text-success">Añadir Proyecto</h1>
                        <h1 class="h3 mb-4 font-weight-normal text-success"><?php echo $this->grupo['nombre']; ?></h1>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100) );">

                        <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->grupo['id_grupo']; ?>" readonly>

                        <br>

                        <div>
                            <label class="responsable_proyecto">Nombre de usuario</label>
                            <select class="form-select" name="responsable_proyecto" id="select_responsable">
                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                        <br>

                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco ProyectAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Proyecto'); enviaformcorrecto(document.addForm, comprobar_proyecto()); ">
                            Añadir Proyecto
                        </a>
                </div>

                </form>
            </div>
        </div>
        </div>

        <script>
            var input_nombre = document.getElementById("nombre");
            input_nombre.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Proyecto');
                    enviaformcorrecto(document.addForm, comprobar_proyecto());
                }
            });
            var input_descripcion = document.getElementById("descripcion");
            input_descripcion.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Proyecto');
                    enviaformcorrecto(document.addForm, comprobar_proyecto());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>