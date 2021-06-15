<?php

//lista actividad
class Actividad_List
{

  var $Actividad;

  function __construct($Actividad)
  {
    $this->Actividad = $Actividad;
    $this->es_admin = es_admin();

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
                <h2 class="users-disclaimer text-success mt-4 Actividad grupomar grupomarti">Actividad</h2>
              </div>
              <div class="p-3" style="display:inline-block; float: right;">
                <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                  <div class="input-group">
                    <div class="input-group-append">
                      <?php if ($this->es_admin) { ?>

                        <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Actividad'); enviaform(document.formenviar);">
                          <div class="icon"><i class="bx bx-plus-circle" data-aos="zoom-in" data-aos-delay="100"></i></div>
                        </a>
                      <?php } ?>
                      <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Actividad'); enviaform(document.formenviar);">
                        <div class="icon"><i class="bx bx-search" data-aos="zoom-in" data-aos-delay="100"></i></div>
                      </a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- ======= Section ======= -->
              <section id="team" class="team">
                <div class="container containergrupo currentactivitycontent">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="row">
                        <?php
                        if ($this->Actividad != "") {

                          foreach ($this->Actividad as $Acti) {
                        ?>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                              <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pic">
                                  <div class="icon"><i class="actividadfoto bx bxl-dribbble"></i></div>
                                </div>
                                <div class="member-info">
                                  <h4><?php echo $Acti['nombre'] ?></h4>
                                  <p class="datosdescripciongrupo"><?php echo $Acti['descripcion'] ?></p>
                                  <div class="social">
                                    <?php if (($this->es_admin) || ($Acti['responsable_actividad'] == $_SESSION['username'])) { ?>

                                      <a class="getstarted scrollto filter fondoverdebotones" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividad','<?php echo $Acti['id_actividad'] ?>');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','editForm');enviaform(document.formenviar);">
                                        <div class="icon"><i class="bx bx-pencil" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                      </a>
                                      <a class="getstarted scrollto filter fondoverdebotones " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividad','<?php echo $Acti['id_actividad'] ?>');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                        <div class="icon"><i class="bx bx-trash" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                      </a>
                                    <?php
                                    }

                                    ?>
                                    <a class="getstarted scrollto filter fondoverdebotones" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividad','<?php echo $Acti['id_actividad'] ?>');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
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