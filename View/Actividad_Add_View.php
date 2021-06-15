<?php

//vista de añadir actividad
class Actividad_Add
{
    var $usuarios;
    var $grupos;
    function __construct($usuarios, $grupos)
    {
        $this->usuarios = $usuarios;
        $this->grupos = $grupos;

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
                        <h1 class="h3 mb-4 font-weight-normal ActivityAddPal text-success">Añadir Actividad</h1>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <br>
                        <label class="ecoins" for="ecoins">Ecoins</label>
                        <input type="number" id="ecoins" name="ecoins" class="form-control" placeholder="ecoins" onblur="if (esNoVacio('ecoins') && comprobarNumeros('ecoins'));">
                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100) );">
                        <br>
                        <div>
                            <label class="responsable_actividad">Nombre de usuario</label>
                            <select class="form-select" name="responsable_actividad" id="select_responsable">
                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <label class="tipo">Tipo</label>
                        <select name="tipo">
                            <option value="interior" id="interior" name="interior" selected>Interior</option>
                            <option value="exterior" id="exterior" name="exterior">Exterior</option>
                        </select>
                        <br>
                        <div>
                            <label class="id_grupo">Identificador grupo</label>
                            <select class="form-select" name="id_grupo" id="select_grupo">
                                <option value="" selected></option>
                                <?php
                                if ($this->grupos != '') {
                                    foreach ($this->grupos as $grupo) { ?>
                                        <option value="<?php echo $grupo['id_grupo'] ?>"><?php echo $grupo['nombre'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividad');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco ActivityAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Actividad'); enviaformcorrecto(document.addForm, comprobar_actividad()); ">
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
                    insertacampo(document.addForm, 'controller', 'Actividad');
                    enviaformcorrecto(document.addForm, comprobar_grupo());
                }
            });
            var input_descripcion = document.getElementById("descripcion");
            input_descripcion.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Actividad');
                    enviaformcorrecto(document.addForm, comprobar_grupo());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>