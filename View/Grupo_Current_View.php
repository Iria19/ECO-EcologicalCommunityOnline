<?php

//Vista ver grupo
class Grupo_Current
{

  var $grupo;
  var $listaproyecto;
  function __construct($grupo, $listaproyecto)
  {

    $this->grupo = $grupo;
    $this->listaproyecto = $listaproyecto['resource'];
    $this->es_admin = es_admin();
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
              <div class="col-lg-4 d-flex align-items-stretch currentgroupgrupo" data-aos="fade-right">
                <div class="content">
                  <h3>
                    <i class="bx grupofotoproy bx-group"></i>
                    <label class="nombre" for="nombre">Nombre</label>
                    <br>
                    <div class="titulocurrentta">
                      <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->grupo['nombre'] ?>" readonly>
                      <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->grupo['id_grupo'] ?>" readonly>
                    </div>
                  </h3>
                  <br>
                  <p>
                    <label class="descripcion" for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->grupo['descripcion'] ?>" readonly>
                  </p>
                  <br>
                  <p>
                    <label class="responsable_grupo" for="id_grupo">Responsable</label>
                    <input type="text" id="responsable_grupo" name="responsable_grupo" class="form-control" value="<?php echo $this->grupo['responsable_grupo'] ?>" readonly>
                  </p>
                  <div class="text-center botonesgrupoproyecto">
                    <form class="form-signup form-grupo-search" name="searchFormParticipantes" method="post">
                      <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->grupo['id_grupo']; ?>" readonly>
                      <a class="boton_eco participantes" type="button" onclick="insertacampo(document.searchFormParticipantes,'action','search');insertacampo(document.searchFormParticipantes,'controller','Usuario_Grupo'); enviaform(document.searchFormParticipantes);">
                        Participantes
                      </a>
                    </form>
                    <a class="more-btn volverbtn botonescurrentgr" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">
                      Volver
                    </a>
                  </div>
                </div>
              </div>

              <?php
              if (count($this->listaproyecto) != 5) { //no existe proyecto con id=id_grupo 
                if (($_SESSION['username'] == $this->grupo['responsable_grupo']) || $this->es_admin) { ?>
                  <!--Miro que sea o el responsable o admin-->
                  <!--Si lo es añado botón de añadir grupo-->
                  <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo','<?php echo $this->grupo['id_grupo'] ?>'); insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Proyecto'); enviaform(document.formenviar);">
                    <div class="icon"><i class="bx bx-plus-circle" data-aos="zoom-in" data-aos-delay="100"></i></div>
                  </a>
                <?php }
              } else {


                ?>
                <!--Muestro enlace al proyecto-->
                <div class=" d-flex align-items-stretch" data-aos="fade-right" data-aos-delay="100">
                  <div class="shadow-lg p-3 mb-5">
                    <i class="bx proyengrupo bx-receipt"></i>

                    <div class="row  contenidogrupoproyecto">
                      <div class=" d-flex align-items-stretch " data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box mt-4 mt-xl-0">
                          <h4 class="Proyecto">Proyecto</h4>
                          <!-- <small class="joincurrentgrouppproy">-->
                          <?php

                          echo ($this->listaproyecto['nombre']);
                          echo ($this->listaproyecto['responsable_proyecto']);
                          ?>
                          </small>

                          <form class="form-signup form-grupo-search" name="searchFormProyecto" method="post">
                            <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->grupo['id_grupo'] ?>">
                            <div class="mt-3">
                              <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormProyecto,'action','search');insertacampo(document.searchFormProyecto,'controller','Proyecto'); enviaformcorrecto(document.searchFormProyecto, comprobar_proyecto_buscar());">
                                Buscar
                              </a>
                            </div>
                          </form>

                        </div>

                      </div>

                    </div>
                  </div><!-- End .content-->
                </div>
              <?php } ?>
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