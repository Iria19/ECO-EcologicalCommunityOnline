<?php

//Vista buscar grupo
class Grupo_Search
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
                    <form class="form-signup form-grupo-search" name="searchFormGroup" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <div>
                            <label class="responsable_grupo">Nombre de usuario</label>
                            <select class="form-select" name="responsable_grupo" id="select_responsable">
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
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormGroup,'action','search');insertacampo(document.searchFormGroup,'controller','Grupo'); enviaformcorrecto(document.searchFormGroup, comprobar_grupo_buscar());">
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
                    insertacampo(document.searchFormGroup, 'action', 'search');
                    insertacampo(document.searchFormGroup, 'controller', 'Grupo');
                    enviaformcorrecto(document.searchFormGroup, comprobar_grupo_buscar());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>