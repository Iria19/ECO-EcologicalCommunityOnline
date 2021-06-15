<?php

//Vista de enviar mensaje
class Mensaje_Add
{
    var $usuarios;
    var $grupos;
    var $actividades;

    function __construct($usuarios, $grupos, $actividades)
    {
        $this->usuarios = $usuarios;
        $this->grupos = $grupos;
        $this->actividades = $actividades;
        $this->es_admin = es_admin();
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
                        <h1 class="h3 mb-4 font-weight-normal enviarmensaje text-success">Enviar Mensaje</h1>

                        <label class="titulo" for="titulo">Titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo" onblur="if (esNoVacio('titulo') && comprobarLetrasEspacios('titulo',60)&& comprobarLongitudMinima('titulo', 2)  && comprobarLongitudMaxima('titulo', 20));">

                        <br>

                        <label class="cuerpo" for="cuerpo">cuerpo</label>
                        <input type="text" id="cuerpo" name="cuerpo" class="form-control" placeholder="cuerpo" onblur="if (comprobarLongitudMaxima('cuerpo', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('cuerpo', 255) );">
                        <input type="hidden" id="leido" name="leido" class="form-control" value="No" readonly>
                        <input type="hidden" id="emisor" name="emisor" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>

                        <br>
                        <div>
                            <label class="receptor">Receptor</label>
                            <select class="form-select" name="receptor" id="select_responsablemensaje">
                                <?php if ($this->es_admin) { ?>
                                    <option value="todos" class="todos">Todos</option>
                                <?php } ?>
                                <?php
                                if ($this->usuarios) {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username']; ?>"><?php echo $usuario['username']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <?php if (!empty($this->grupos)) { ?>

                            <div>
                                <label class="id_grupo">Identificador grupo</label>
                                <select class="form-select" name="id_grupo" id="select_grupomensaje" onchange="mostrarSelect()">

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
                        <?php } ?>
                        <?php if (!empty($this->actividades)) { ?>

                            <div>
                                <label class="id_actividad">Identificador actividad</label>
                                <select class="form-select" name="id_actividad" id="select_actividadmensaje" onchange="mostrarSelect()">

                                    <option value="" selected></option>
                                    <?php
                                    if ($this->actividades != '') {
                                        foreach ($this->actividades as $actividad) {
                                    ?>
                                            <option value="<?php echo $actividad['id_actividad'] ?>"><?php echo $actividad['nombre'] ?></option>

                                    <?php }
                                    } ?>
                                </select>
                            </div>

                            <br>
                        <?php } ?>
                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'receptor','<?php echo $_SESSION['username'] ?>'); insertacampo(document.formenviar,'action','Search'); insertacampo(document.formenviar,'controller','Mensaje');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco enviarmensaje" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Mensaje'); enviaformcorrecto(document.addForm, comprobar_mensaje()); ">
                            Enviar Mensaje
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
        //tomo el valor del select de grupo

        var select_grupomensaje
        select_grupomensaje = document.addForm.select_grupomensaje[document.addForm.select_grupomensaje.selectedIndex].value

        //tomo el valor del select de actividad     
        var select_actividadmensaje
        select_actividadmensaje = document.addForm.select_actividadmensaje[document.addForm.select_actividadmensaje.selectedIndex].value
        //miro a ver si el pais está definido 
        if (select_grupomensaje != "") {
            document.getElementById('select_actividadmensaje').style.display = 'none';
            document.getElementById('select_responsablemensaje').style.display = 'none';

        } else if (select_actividadmensaje != "") {
            document.getElementById('select_grupomensaje').style.display = 'none';
            document.getElementById('select_responsablemensaje').style.display = 'none';


        } else {
            document.getElementById('select_actividadmensaje').style.display = 'block';
            document.getElementById('select_grupomensaje').style.display = 'block';
            document.getElementById('select_responsablemensaje').style.display = 'block';


        }
    }
</script>