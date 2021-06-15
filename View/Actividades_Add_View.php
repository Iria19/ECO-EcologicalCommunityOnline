<?php

//vista de añadir actividades
class Actividades_Add
{
    var $actividades;

    function __construct($actividades)
    {
        $this->actividades = $actividades;
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
                        <label class="fecha" for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" min="2021-01-01" max="2050-01-01">
                        <br>
                        <input type="hidden" id="username" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly>
                        <input type="hidden" id="validado" name="validado" class="form-control" value="No" readonly>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',20)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <div>
                            <label class="id_actividad">Identificar Actividad</label>
                            <select class="form-select" name="id_actividad" id="select_id_actividad">
                                <?php
                                if ($this->actividades != '') {
                                    foreach ($this->actividades as $actividad) { ?>
                                        <option value="<?php echo $actividad['id_actividad'] ?>"><?php echo $actividad['nombre'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividades');enviaformcorrecto(document.addForm, comprobar_actividades());">
                            Volver
                        </a>
                        <a class="boton_eco ActivityAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Actividades'); enviaformcorrecto(document.addForm, comprobar_actividades());">
                            Añadir Actividad
                        </a>
                    </form>
                </div>
            </div>
        </div>
        </div>

<?php

        include 'footer.php';
    }
}

?>