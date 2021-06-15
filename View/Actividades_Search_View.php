<?php
//vista buscar actividades
class Actividades_Search
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
                    <form class="form-signup form-grupo-search" name="searchFormActividades" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (comprobarLongitudMaxima('nombre', 20));">
                        <br>
                        <label class="fecha" for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" min="2021-01-01" max="2100-01-01">
                        <br>
                        <label class="id_actividad">Identificar Actividad</label>
                        <select class="form-select" name="id_actividad" id="select_id_actividad">
                            <option value=""></option>
                            <?php
                            foreach ($this->actividades as $actividad) { ?>
                                <option value="<?php echo $actividad['id_actividad'] ?>"><?php echo $actividad['id_actividad'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividades');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormActividades,'action','search');insertacampo(document.searchFormActividades,'controller','Actividades'); enviaformcorrecto(document.searchFormActividades, comprobar_actividades_buscar());">
                                Buscar
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