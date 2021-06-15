<?php

//ver documentacion
class Documentacion_Current
{

  var $documentacion;

  function __construct($documentacion)
  {
    $this->documentacion = $documentacion;

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

            <div class="row joinear">
              <div class="divdocucontent align-items-stretch currentgroupgrupo" data-aos="fade-right">
                <div class="content divdocucontent">
                  <h3>
                    <i class="bx grupofotoproy bx-group"></i>
                    <br>
                    <div class="titulocurrentta">
                      <input type="text" id="username" name="username" class="form-control" value="<?php echo $this->documentacion['username'] ?>" readonly>
                    </div>
                  </h3>
                  <br>
                  <p>
                    <label class="archivo" for="archivo">Archivo</label>
                    <br>
                    <a class="direcciondocu" href="<?php echo '/ECO/uploaded_files/' . $this->documentacion['archivo']; ?>"><?php echo $this->documentacion['archivo']; ?></a>
                  </p>
                  <br>
                  <p>
                    <label class="id_proyecto" for="id_proyecto">Identificador de proyecto</label>
                    <input type="text" id="id_proyecto" name="id_proyecto" class="form-control" value="<?php echo $this->documentacion['id_proyecto'] ?>" readonly>
                  </p>
                  <br>
                  <p>
                    <label class="id_actividades" for="id_actividades">Identificador de la actividad</label>
                    <input type="text" id="id_actividades" name="responsable_proyecto" class="form-control" value="<?php echo $this->documentacion['id_actividades'] ?>" readonly>
                  </p>
                  <br>
                  <div class="text-center botonesgrupoproyecto">
                    <a class="more-btn volverbtn botonescurrentgr" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Documentacion');enviaform(document.formenviar);">
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