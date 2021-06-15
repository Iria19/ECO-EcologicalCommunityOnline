<?php

//Vista de buscar documentacion
class Documentacion_Search
{
    var $actividades;
    var $proyectos;
    var $usuarios;

    function __construct($actividades, $proyectos, $usuarios)
    {
        $this->actividades = $actividades;
        $this->proyectos = $proyectos;
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
                    <form class="form-signup form-grupo-search" name="searchFormDocu" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>
                        <br>
                        <label class="Selecciona">Selecciona</label>
                        <select name=selecionar onchange="mostrarSelect()">
                            <option value="Selecciona">Selecciona</option>
                            <option class="proyecto" name="proyecto" value="proyecto">Proyecto</option>
                            <option class="actividades" name="actividades" value="actividades">Actividades</option>

                        </select>
                        <div>
                            <label class="id_proyecto">Identificador del Proyecto</label>
                            <select class="form-select" name="id_proyecto" id="select_id_proyectodocumentacion">
                                <option value="" selected></option>
                                <?php
                                if (!empty($this->proyectos)) {
                                    foreach ($this->proyectos as $proyecto) {
                                ?>
                                        <option value="<?php echo $proyecto['id_proyecto'] ?>"><?php echo $proyecto['nombre'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <div>
                            <label class="id_actividades">Identificador de la Actividad</label>
                            <select class="form-select" name="id_actividades" id="select_id_actividadesdocumentacion">
                                <option value="" selected></option>
                                <?php
                                if (!empty($this->actividades)) {
                                    foreach ($this->actividades as $actividad) { ?>
                                        <option value="<?php echo $actividad['id_actividades'] ?>"><?php echo $actividad['nombre'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <label class="validado">Validado</label>
                        <select class="form-select" name="validado" id="select_validado">
                            <option value="" selected></option>
                            <option value="Si" id="Si" class="Si">Si</option>
                            <option value="No" id="No" class="No">No</option>
                        </select>
                        <div>
                            <label class="username">Nombre de usuario</label>
                            <select class="form-select" name="username" id="select_username">
                                <option value="" selected></option>
                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormDocu,'action','search');insertacampo(document.searchFormDocu,'controller','Documentacion'); enviaformcorrecto(document.searchFormDocu, comprobar_documentacion());">

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
<script>
    function mostrarSelect() {
        //tomo el valor del select  elegido 
        var selecionar
        selecionar = document.searchFormDocu.selecionar[document.searchFormDocu.selecionar.selectedIndex].value
        if (selecionar == "proyecto") {
            document.getElementById('select_id_proyectodocumentacion').style.display = 'block';
            document.getElementById('select_id_actividadesdocumentacion').style.display = 'none';
            document.getElementById('select_id_actividadesdocumentacion').value = '';


        } else if (selecionar == "actividades") {
            document.getElementById('select_id_actividadesdocumentacion').style.display = 'block';
            document.getElementById('select_id_proyectodocumentacion').style.display = 'none';
            document.getElementById('select_id_proyectodocumentacion').value = '';


        } else {
            document.getElementById('select_id_proyectodocumentacion').style.display = 'none';
            document.getElementById('select_id_actividadesdocumentacion').style.display = 'none';

        }
    }
</script>