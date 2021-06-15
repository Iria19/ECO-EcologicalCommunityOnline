<?php

//Vista de buscar actividad
class Actividad_Search
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
                    <form class="form-signup form-grupo-search" name="searchFormActividad" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (comprobarLongitudMaxima('nombre', 20));">

                        <br>
                        <label class="ecoins" for="ecoins">Ecoins</label>
                        <input type="number" id="ecoins" name="ecoins" class="form-control" placeholder="ecoins" onblur="if (comprobarNumeros('ecoins'));">

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion">

                        <br>

                        <div>
                            <label class="responsable_actividad">Nombre de usuario</label>
                            <select class="form-select" name="responsable_actividad" id="select_responsable">

                                <option value="" selected></option>
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
                            <option value="" selected></option>
                            <option value="interior" id="interior" name="interior">Interior</option>
                            <option value="exterior" id="exterior" name="exterior">Exterior</option>
                        </select>
                        <br>
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
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividad');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormActividad,'action','search');insertacampo(document.searchFormActividad,'controller','Actividad'); enviaformcorrecto(document.searchFormActividad, comprobar_actividad_buscar());">
                                Buscar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            var input_pass = document.getElementById("nombre");
            input_pass.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormActividad, 'action', 'search');
                    insertacampo(document.searchFormActividad, 'controller', 'Actividad');
                    enviaformcorrecto(document.searchFormActividad, comprobar_actividad_buscar());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>