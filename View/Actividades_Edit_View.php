<?php

//Actividad edit
class Actividades_Edit
{

    var $actividades;
    var $actividad;

    function __construct($actividades, $actividad)
    {

        $this->es_admin = es_admin();
        $this->actividades = $actividades;
        $this->actividad = $actividad;
        if (($this->es_admin) || ($_SESSION['username'] == $this->actividad['responsable_actividad'])) {
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
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->actividades['id_actividades'] ?></h1>
                        </div>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->actividades['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',20)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">

                        <label class="fecha" for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" min="2021-01-01" max="2050-01-01" value="<?php echo date('Y-m-d', strtotime($this->actividades['fecha'])) ?>" min="2021-01-01" max="2100-01-01">
                        <br>
                        <label class="validado">Validado</label>
                        <select class="form-select" name="validado" id="select_validado">
                            <option value="<?php echo $this->actividades['validado'] ?>" id="<?php echo $this->actividades['validado'] ?>" name="<?php echo $this->actividades['validado'] ?>" selected><?php echo $this->actividades['validado'] ?></option>
                            <option value="Si" id="Si" name="Si">Si</option>
                            <option value="No" id="No" name="No">Sigue</option>

                        </select>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_actividades','<?php echo $this->actividades['id_actividades'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Actividades'); enviaformcorrecto(document.editForm, comprobar_actividades());">
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
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->actividades['nombre'] ?></h1>
                        </div>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->actividades['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',20)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <br>
                        <input type="hidden" id="validado" name="validado" class="form-control" value="No" readonly>

                        <label class="fecha" for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" min="2021-01-01" max="2050-01-01" value="<?php echo date('Y-m-d', strtotime($this->actividades['fecha'])) ?>" min="2021-01-01" max="2100-01-01">
                        <br>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_actividades','<?php echo $this->actividades['id_actividades'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Actividades'); enviaformcorrecto(document.editForm, comprobar_actividades());">
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