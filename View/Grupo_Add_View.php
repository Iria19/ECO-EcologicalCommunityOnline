<?php

//vista añadir grupo
class Grupo_Add
{
    var $usuarios;
    function __construct($usuarios)
    {
        $this->usuarios = $usuarios;
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
                        <h1 class="h3 mb-4 font-weight-normal GroupAddPal text-success">Añadir Grupo</h1>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100) );">

                        <br>

                        <div>
                            <label class="responsable_grupo">Nombre de usuario</label>
                            <select class="form-select" name="responsable_grupo" id="select_responsable">
                                <?php
                                if ($this->usuarios) {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                        <br>

                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco GroupAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Grupo'); enviaformcorrecto(document.addForm, comprobar_grupo()); ">
                            Añadir Grupo
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
                    insertacampo(document.addForm, 'controller', 'Grupo');
                    enviaformcorrecto(document.addForm, comprobar_grupo());
                }
            });
            var input_descripcion = document.getElementById("descripcion");
            input_descripcion.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Grupo');
                    enviaformcorrecto(document.addForm, comprobar_grupo());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>