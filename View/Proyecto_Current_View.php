<?php
//vista de ver proyecto
class Proyecto_Current
{

  var $proyecto;

  function __construct($proyecto)
  {
    $this->proyecto = $proyecto;

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
          <div class=" grupocurrent ">

            <div class="row joinear currentactividadcurrent">
              <div class=" align-items-stretch currentgroupgrupo currentactividadcurrent" data-aos="fade-right">
                <div class="content">
                  <h3>
                    <i class="bx grupofotoproy bx-group"></i>
                    <label class="nombre" for="nombre">Nombre</label>
                    <br>
                    <div class="titulocurrentta">
                      <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->proyecto['nombre'] ?>" readonly>
                      <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->proyecto['id_grupo'] ?>" readonly>
                    </div>
                  </h3>
                  <br>
                  <p>
                    <label class="descripcion" for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->proyecto['descripcion'] ?>" readonly>
                  </p>
                  <br>
                  <p>
                    <label class="responsable_proyecto" for="responsable_proyecto">Responsable Proyecto</label>
                    <input type="text" id="responsable_proyecto" name="responsable_proyecto" class="form-control" value="<?php echo $this->proyecto['responsable_proyecto'] ?>" readonly>
                  </p>
                  <br>
                  <div class="text-center botonesgrupoproyecto">
                    <a class="more-btn volverbtn botonescurrentgr" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">
                      Volver
                    </a>
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