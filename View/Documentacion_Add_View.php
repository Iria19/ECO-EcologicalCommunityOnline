<?php

class Documentacion_Add
{
    var $actividades;
    var $proyectos;
    function __construct($actividades, $proyectos)
    {
        $this->actividades = $actividades;
        $this->proyectos = $proyectos;

        $this->render();
    }

    function render()
    {
        include 'header.php';
?>

        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signupgrupo" name="addForm" method="post" enctype="multipart/form-data">
                        <h1 class="h3 mb-4 font-weight-normal DocuAddPal text-success">Añadir Documentación</h1>
                        <?php
                        //Muestra estado de carga
                        if (isset($_SESSION['message']) && $_SESSION['message']) {
                            printf('<b>%s</b>', $_SESSION['message']);
                            unset($_SESSION['message']);
                        }
                        ?>
                        <label class="archivo" for="archivo">Archivo</label>
                        <input type="file" id="archivo" name="uploadedFile" class="form-control" placeholder="archivo">

                        <br>
                        <input type="hidden" id="username" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly>
                        <input type="hidden" id="validado" name="validado" class="form-control" value="No" readonly>

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
                                if (!empty($this->proyectos[0])) {
                                    foreach ($this->proyectos as $proyecto) {
                                ?>

                                        <option value="<?php echo $proyecto[0]['id_proyecto'] ?>"><?php echo $proyecto[0]['nombre'] ?></option>

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
                                if (!empty($this->actividades[0])) {

                                    foreach ($this->actividades as $actividad) { ?>
                                        <option value="<?php echo $actividad['id_actividades'] ?>"><?php echo $actividad['nombre'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>


                        <br>
                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco DocuAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Documentacion');  enviaformcorrecto(document.addForm, comprobar_documentacion());  ">
                            Añadir Documentación
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
        selecionar = document.addForm.selecionar[document.addForm.selecionar.selectedIndex].value
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