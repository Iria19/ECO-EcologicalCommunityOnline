<?php

//vista actividad ver
class Actividad_Current
{

  var $actividad;

  function __construct($actividad)
  {

    $this->actividad = $actividad;
    $this->render();
  }

  function render()
  {
    include 'header.php';
?>

    <div class="row justify-content-center mt-0 ml-0 hero_register " id="hero">



      <div class="card card-body text-center " action="index.php">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
          <div class=" grupocurrent currentactividadcurrent ">
            <div class="row joinear currentactividadcurrent">
              <div class=" align-items-stretch currentgroupgrupo currentactividadcurrent" data-aos="fade-right">
                <div class="content">
                  <h3>
                    <i class="bx grupofotopoy bxl-dribbble "></i>
                    <label class="nombre" for="nombre">Nombre</label>
                    <br>
                    <div class="titulocurrentt">
                      <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->actividad['nombre'] ?>" readonly>:
                      <input type="text" id="id_actividad" name="id_actividad" class="form-control" value="<?php echo $this->actividad['id_actividad'] ?>" readonly>
                  </h3>
                  <div class="currentarg">
                    <p>
                      <label class="descripcion" for="descripcion">Descripcion</label>
                      <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->actividad['descripcion'] ?>" readonly>
                    </p>
                    <br>
                    <p>
                      <label class="ecoins" for="ecoins">Ecoins</label>
                      <input type="text" id="ecoins" name="ecoins" class="form-control" value="<?php echo $this->actividad['ecoins'] ?>" readonly>
                    </p>
                    <br>
                    <p>
                      <label class="responsable_actividad" for="responsable_actividad">Responsable Actividad</label>
                      <input type="text" id="responsable_actividad" name="responsable_actividad" class="form-control" value="<?php echo $this->actividad['responsable_actividad'] ?>" readonly>
                    </p>
                    <br>
                    <p>
                      <label class="tipo" for="tipo">Tipo</label>
                      <input type="text" id="tipo" name="tipo" class="form-control" value="<?php echo $this->actividad['tipo'] ?>" readonly>
                    </p>
                    <p>
                      <?php
                      if ($this->actividad['id_grupo'] != '999999999') { ?>
                        <label class="id_grupo" for="id_grupo">Identificador de grupo</label>
                        <input type="text" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->actividad['id_grupo'] ?>" readonly>
                      <?php } ?>
                    </p>
                  </div>
                  <div class="text-center botonesgrupoproyecto">
                    <a class="more-btn volverbtn botonescurrentgr" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Actividad');enviaform(document.formenviar);">
                      Volver
                    </a>
                </div>
              </div>
            </div>
            </div>
          </div>

      </div>
      </section><!-- End Why Us Section -->
    </div>
    </div>

<?php

    include 'footer.php';
  }
}

?>