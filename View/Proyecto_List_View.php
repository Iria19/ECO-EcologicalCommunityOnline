<?php

//Vista de lista de proyectos
class Proyecto_List
{

  var $Proyectos;

  function __construct($Proyectos)
  {
    $this->Proyectos = $Proyectos;
    $this->es_authenticated = is_authenticated();
    if ($this->es_authenticated) {
      $this->es_admin = es_admin();
    }
    $this->render();
  }

  function render()
  {
    include 'header.php';
?>

    <div class="row justify-content-center mt-0 " id="hero">
      <section id="about" class="about">
        <div class="container usercontainer">

          <div class="row content">

            <div class="col-lg-6 fondogrupo" data-aos="fade-right" data-aos-delay="100">


              <div class="section-title" data-aos="fade-right">
                <h2 class="users-disclaimer text-success mt-4 proyecto-pal grupomar grupomarti">Proyecto</h2>
                <p class="ecoproyresp grupomar grupomarp">Además de las actividades propuestas por ECO también puedes participar en proyectos.</p>
              </div>
              <div class="p-3" style="display:inline-block; float: right;">
                <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                  <div class="input-group">
                    <div class="input-group-append">

                      <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Proyecto'); enviaform(document.formenviar);">
                        <div class="icon"><i class="bx bx-search" data-aos="zoom-in" data-aos-delay="100"></i></div>
                      </a>
                    </div>
                  </div>
                </form>
              </div>


              <!-- ======= Team Section ======= -->
              <section id="team" class="team">
                <div class="container containergrupo">

                  <div class="row">

                    <div class="col-lg-8">
                      <div class="row">
                        <?php
                        if ($this->Proyectos != "") {

                          foreach ($this->Proyectos as $Proyecto) {
                        ?>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                              <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pic">
                                  <div class="icon"><i class="filefoto bx bx-file"></i></div>
                                </div>
                                <div class="member-info">
                                  <h4><?php echo $Proyecto['nombre'] ?></h4>
                                  <p class="datosdescripciongrupo"><?php echo $Proyecto['responsable_proyecto'] ?></p>
                                  <div class="social">
                                    <?php

                                    if ($this->es_authenticated) {
                                      if (($this->es_admin) || ($Proyecto['responsable_proyecto'] == $_SESSION['username'])) { ?>

                                        <a class="getstarted scrollto filter fondoverdebotones" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_proyecto','<?php echo $Proyecto['id_proyecto'] ?>');insertacampo(document.formenviar,'controller','Proyecto');insertacampo(document.formenviar,'action','editForm');enviaform(document.formenviar);">
                                          <div class="icon"><i class="bx bx-pencil" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                        </a>
                                        <a class="getstarted scrollto filter fondoverdebotones " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_proyecto','<?php echo $Proyecto['id_proyecto'] ?>');insertacampo(document.formenviar,'controller','Proyecto');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                          <div class="icon"><i class="bx bx-trash" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                        </a>
                                    <?php }
                                    } ?>

                                    <a class="getstarted scrollto filter fondoverdebotones" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_proyecto','<?php echo $Proyecto['id_proyecto'] ?>');insertacampo(document.formenviar,'controller','Proyecto');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
                                      <div class="icon"><i class="bx bx-user-pin" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                    </a>

                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php
                          }
                        }
                        ?>

                      </div>

                    </div>
                  </div>

                </div>
              </section><!-- End Team Section -->




            </div>
      </section><!-- End About Section -->
    </div>

<?php
    include 'footer.php';
  }
}

?>