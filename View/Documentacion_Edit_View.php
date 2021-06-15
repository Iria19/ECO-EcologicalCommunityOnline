<?php

//documentacion edit
class Documentacion_Edit
{

    var $usuarios;
    var $proyectos;
    var $documentos;

    var $todosactividades;
    var $todosproyectos;

    function __construct($actividades, $proyectos, $documentos,$todosactividades,$todosproyectos)
    {
        $this->actividades = $actividades;
        $this->proyectos = $proyectos;
        $this->documentos = $documentos;
        
        $this->todosactividades = $todosactividades;
        $this->todosproyectos = $todosproyectos;
        $this->es_admin = es_admin();
        if (($this->es_admin)) {
            $this->renderadmin();
        } else {
            $this->render();
        }
    }
    function render()
    {
        include 'header.php';
?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">

                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="editForm" method="post" enctype="multipart/form-data">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->documentos['id_documentacion'] ?></h1>
                        </div>


                        <input type="hidden" id="validado" name="validado" class="form-control" value="No" readonly>
                        <label class="archivo" for="archivo">Archivo</label>
                        <br>
                        <br>

                        <a href="<?php echo '/ECO/uploaded_files/' . $this->documentos['archivo']; ?>"><?php echo $this->documentos['archivo']; ?></a>
                        <br>
                        <?php
                        //Muestra estado de carga
                        if (isset($_SESSION['message']) && $_SESSION['message']) {
                            printf('<b>%s</b>', $_SESSION['message']);
                            unset($_SESSION['message']);
                        }
                        ?>
                        <input type="file" id="archivo" name="uploadedFile" class="form-control">

                        <br>
                        <br>

                        <label class="Selecciona">Selecciona</label>
                        <select name=selecionar onchange="mostrarSelect()">
                            <option value="Selecciona">Selecciona</option>
                            <option class="proyecto" name="proyecto" value="proyecto">Proyecto</option>
                            <option class="actividades" name="actividades" value="actividades">Actividades</option>

                        </select>
                        <br>
                        <div>

                            <label class="id_proyecto">Identificador del Proyecto</label>
                            <select class="form-select" name="id_proyecto" id="select_id_proyectodocumentacion">
                                <?php if ($this->documentos['id_proyecto'] == "999999999") { ?>
                                    <option value="<?php echo $this->documentos['id_proyecto'] ?>" selected></option>
                                <?php } else { ?>

                                    <option value="<?php echo $this->documentos['id_proyecto'] ?>" selected><?php echo $this->documentos['nombre'] ?></option>
                                <?php } ?>
                                <option value=""></option>
                                <?php
                                if (!empty($this->proyectos[0])) {

                                    foreach ($this->proyectos as $proyecto) {
                                ?>

                                        <option value="<?php echo $proyecto[0]['id_proyecto'] ?>"><?php echo $proyecto[0]['id_proyecto'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <label class="id_actividades">Identificador de la Actividad</label>
                            <select class="form-select" name="id_actividades" id="select_id_actividadesdocumentacion">
                                <?php if ($this->documentos['id_actividades'] == "999999999") { ?>
                                    <option value="<?php echo $this->documentos['id_actividades'] ?>" selected></option>
                                <?php } else { ?>

                                    <option value="<?php echo $this->documentos['id_actividades'] ?>" selected><?php echo $this->documentos['id_actividades'] ?></option>
                                <?php } ?>
                                <option value=""></option>
                                <?php
                                if (!empty($this->actividades[0])) {

                                    foreach ($this->actividades as $actividad) { ?>
                                        <option value="<?php echo $actividad['id_actividades'] ?>"><?php echo $actividad['nombre'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                        <br>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_documentacion','<?php echo $this->documentos['id_documentacion'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Documentacion'); enviaform(document.formenviar);">
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
    function renderadmin()
    {
        include 'header.php';
    ?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">

                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="editForm" enctype="multipart/form-data" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->documentos['id_documentacion'] ?></h1>
                        </div>

                        <label class="validado">Validado</label>
                        <select class="form-select" name="validado" id="select_validado">
                            <option value="<?php echo $this->documentos['validado'] ?>" id="<?php echo $this->documentos['validado'] ?>" class="<?php echo $this->documentos['validado'] ?>"><?php echo $this->documentos['validado'] ?></option>

                            <option value="Si" id="Si" class="Si">Si</option>
                            <option value="No" id="No" class="No">No</option>

                        </select>

                        <label class="archivo" for="archivo">Archivo</label>
                        <br>
                        <br>

                        <a href="<?php echo '/ECO/uploaded_files/' . $this->documentos['archivo']; ?>"><?php echo $this->documentos['archivo']; ?></a>
                        <br>
                        <?php
                        //Muestra estado de carga
                        if (isset($_SESSION['message']) && $_SESSION['message']) {
                            printf('<b>%s</b>', $_SESSION['message']);
                            unset($_SESSION['message']);
                        }
                        ?>
                        <input type="file" id="archivo" name="uploadedFile" class="form-control">

                        <br>
                        <br>

                        <label class="Selecciona">Selecciona</label>
                        <select name=selecionar onchange="mostrarSelect()">
                            <option value="Selecciona">Selecciona</option>
                            <option class="proyecto" name="proyecto" value="proyecto">Proyecto</option>
                            <option class="actividades" name="actividades" value="actividades">Actividades</option>

                        </select>
                        <div>
                            <br>
                            <label class="id_proyecto">Identificador del Proyecto</label>
                            <select class="form-select" name="id_proyecto" id="select_id_proyectodocumentacion">
                                <?php if ($this->documentos['id_proyecto'] == "999999999") { ?>
                                    <option value="<?php echo $this->documentos['id_proyecto'] ?>" selected></option>
                                <?php } else { ?>

                                    <option value="<?php echo $this->documentos['id_proyecto'] ?>" selected><?php echo $this->documentos['id_proyecto'] ?></option>
                                <?php } ?>
                                <option value=""></option>
                                <?php
                                if (!empty($this->todosproyectos)) {
                                    foreach ($this->todosproyectos as $proyecto) {
                                ?>
                                       <option value="<?php echo $proyect['id_proyecto'] ?>"><?php echo $proyecto['nombre'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <label class="id_actividades">Identificador de la Actividad</label>
                            <select class="form-select" name="id_actividades" id="select_id_actividadesdocumentacion">
                                <?php if ($this->documentos['id_actividades'] == "999999999") { ?>
                                    <option value="<?php echo $this->documentos['id_actividades'] ?>" selected></option>
                                <?php } else { ?>

                                    <option value="<?php echo $this->documentos['id_actividades'] ?>" selected><?php echo $this->documentos['id_actividades'] ?></option>
                                <?php } ?>
                                <option value=""></option>
                                <?php
                                if (!empty($this->todosactividades)) {
                                    foreach ($this->todosactividades as $actividad) { ?>
                                        <option value="<?php echo $actividad['id_actividades'] ?>"><?php echo $actividad['nombre'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                        <br>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_documentacion','<?php echo $this->documentos['id_documentacion'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Documentacion');  enviaformcorrecto(document.editForm, comprobar_documentacion()); ">
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

<script>
    function mostrarSelect() {
        //tomo el valor del select  elegido 
        var selecionar
        selecionar = document.editForm.selecionar[document.editForm.selecionar.selectedIndex].value
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