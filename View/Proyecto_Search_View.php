<?php

//Vista de buscar proyecto
class Proyecto_Search
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
                    <form class="form-signup form-grupo-search" name="searchFormProyecto" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <div>
                            <label class="responsable_proyecto">Nombre de usuario</label>
                            <select class="form-select" name="responsable_proyecto" id="select_responsable">
                                <option value=""></option>

                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>

                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormProyecto,'action','search');insertacampo(document.searchFormProyecto,'controller','Proyecto'); enviaformcorrecto(document.searchFormProyecto, comprobar_proyecto_buscar());">
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
                    insertacampo(document.searchFormProyecto, 'action', 'search');
                    insertacampo(document.searchFormProyecto, 'controller', 'Proyecto');
                    enviaformcorrecto(document.searchFormProyecto, comprobar_proyecto_buscar());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>