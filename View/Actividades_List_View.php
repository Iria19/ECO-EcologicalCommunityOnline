<?php

//lista de actividades
class Actividades_List
{

  var $Actividades;
  var $idresponsableactividad;

  function __construct($Actividades, $idresponsableactividad)
  {
    $this->es_authenticated = is_authenticated();
    if ($this->es_authenticated) {
      $this->es_admin = es_admin();
      $this->idresponsableactividad = $idresponsableactividad;
    }
    $this->Actividades = $Actividades;

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
                <h2 class="users-disclaimer text-success mt-4 actividades-pal grupomar grupomarti">Actividades</h2>
                <p class="ecoactiresp grupomar grupomarp">Realizar proyectos es más divertido en grupo, en ECO te damos la oportunidad de que al participar en un proyecto puedas llevar este acabo con un grupo de personas.</p>
              </div>
              <div class="p-3" style="display:inline-block; float: right;">
                <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                  <div class="input-group">
                    <div class="input-group-append">
                      <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Actividades'); enviaform(document.formenviar);">
                        <div class="icon"><i class="bx bx-plus-circle" data-aos="zoom-in" data-aos-delay="100"></i></div>
                      </a>
                      <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Actividades'); enviaform(document.formenviar);">
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
                        if ($this->Actividades != "") {

                          foreach ($this->Actividades as $Actividad) {
                        ?>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                              <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pic">
                                  <div class="icon"><i class="grupofoto bx bxl-dribbble"></i></div>
                                </div>
                                <div class="member-info">
                                  <p class="datosdescripciongrupo"><?php echo $Actividad['nombre'] ?></p>
                                  <p class="datosdescripciongrupo"><?php echo $Actividad['fecha'] ?></p>
                                  <p class="datosdescripciongrupo"><?php echo $Actividad['username'] ?></p>
                                  <div class="social">
                                    <?php

                                    if ($this->es_authenticated) {
                                      $responsableactividadaux = $this->idresponsableactividad[$Actividad['id_actividades'] - 1];

                                      $responsableactividad = $responsableactividadaux[$Actividad['id_actividades']];
                                      if (($this->es_admin) || ($_SESSION['username'] == $Actividad['username'] && $Actividad['validado'] == 'No') || ($_SESSION['username'] == $responsableactividad)) {
                                    ?>
                                        <a class="getstarted scrollto filter fondoverdebotones" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividad',<?php echo ($Actividad['id_actividad']); ?>);insertacampo(document.formenviar,'id_actividades','<?php echo $Actividad['id_actividades'] ?>');insertacampo(document.formenviar,'controller','Actividades');insertacampo(document.formenviar,'action','editForm');enviaform(document.formenviar);">
                                          <div class="icon"><i class="bx bx-pencil" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                        </a>
                                        <a class="getstarted scrollto filter fondoverdebotones " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_actividades','<?php echo $Actividad['id_actividades'] ?>');insertacampo(document.formenviar,'controller','Actividades');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                          <div class="icon"><i class="bx bx-trash" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                        </a>
                                    <?php  }
                                    }
                                    ?>
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