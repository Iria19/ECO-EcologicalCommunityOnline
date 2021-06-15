<?php

//Vista editar actividad
class Actividad_Edit
{

    var $usuarios;
    var $actividad;
    var $grupos;

    function __construct($usuarios, $grupos, $actividad)
    {

        $this->usuarios = $usuarios;
        $this->actividad = $actividad;
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
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->actividad['nombre'] ?>:<?php echo $this->actividad['id_actividad'] ?></h1>
                        </div>
                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->actividad['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <!--Comprobaciones y las del final al enviar form-->

                        <br>
                        <label class="ecoins" for="ecoins">Ecoins</label>
                        <input type="number" id="ecoins" name="ecoins" class="form-control" value="<?php echo $this->actividad['ecoins'] ?>" onblur="if (esNoVacio('ecoins') && comprobarNumeros('ecoins'));">

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->actividad['descripcion'] ?>" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100));">
                        <br>
                        <label class="responsable_actividad">Responsable Actividad</label>
                        <div>
                            <select class="form-select" name="responsable_actividad" id="select_responsable" required>
                                <option value="<?php echo $this->actividad['responsable_actividad'] ?>" id="<?php echo $this->actividad['responsable_actividad'] ?>" name="<?php echo $this->actividad['responsable_actividad'] ?>" selected><?php echo $this->actividad['responsable_actividad'] ?></option>
                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) {
                                        echo "<option " .
                                            "value=" . `"` . $usuario['username'] . `"` . '>' .
                                            $usuario['username'] .
                                            "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <label class="tipo">Tipo</label>
                        <select name="tipo">
                            <option value="<?php echo $this->actividad['tipo'] ?>" id="<?php echo $this->actividad['tipo'] ?>" name="<?php echo $this->actividad['tipo'] ?>" selected><?php echo $this->actividad['tipo'] ?></option>
                            <option value="interior" id="interior" name="interior">Interior</option>
                            <option value="exterior" id="exterior" name="exterior">Exterior</option>
                        </select>
                        <br>
                        <label class="id_grupo">Identificar grupo</label>
                        <div>
                            <select class="form-select" name="id_grupo" id="select_grupo" required>
                                <option value="<?php echo $this->actividad['id_grupo'] ?>" id="<?php echo $this->actividad['id_grupo'] ?>" name="<?php echo $this->actividad['id_grupo'] ?>" selected><?php echo $this->actividad['id_grupo'] ?></option>
                                <option value=""></option>
                                <?php
                                if ($this->grupos != '') {
                                    foreach ($this->grupos as $grupo) {
                                        echo "<option " .
                                            "value=" . `"` . $grupo['id_grupo'] . `"` . '>' .
                                            $grupo['nombre'] .
                                            "</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <br>
                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividad');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'id_actividad','<?php echo $this->actividad['id_actividad'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Actividad'); enviaformcorrecto(document.editForm, comprobar_actividad());">
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