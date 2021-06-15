<?php

//dashboard-menu
class Dashboard
{

  function __construct()
  {
    $this->render();
  }

  function render()
  {
    include 'header.php';

?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Ecological Community Online</h1>
        <h2 class="intro-pal">Sistema web de comunidad de desarrollo sostenible</h2>
        <a href="#about" class="btn-get-started scrollto about-eco">SOBRE ECO</a>
      </div>
    </section><!-- End Hero -->

    <main id="main">

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">

          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <h2 class="que-eco">¿QUÉ ES ECO?</h2>
              <h3 class="que-es-eco-resp">ECO es una página web creada con la inteción de promover el desarrollo sostenible a un mayor número de personas.</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
              <p class="eco-explicacion">
                El desarrollo sostenible promueve que las personas satisfagan sus necesidades del ahora sin comprometer la capacidad de las futuras generaciones de satisfacer las suyas. Esto nos proporciona:
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i>
                  <div class="eco-uno">Un mayor bienestar social </div>
                </li>
                <li><i class="ri-check-double-line"></i>
                  <div class="eco-dos">La protección del medio ambiente</div>
                </li>
                <li><i class="ri-check-double-line"></i>
                  <div class="eco-tres">Un futuro mejor tanto para la generación actual como las futuras</div>
                </li>
              </ul>
              <p class="font-italic eco-frase">
                Hasta las pequeñas acciones son importantes.
              </p>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">

          <div class="text-center" data-aos="zoom-in">
            <h3 class="calltoaction">Llamada a la Acción</h3>
            <p class="ecoRazon"> Cada vez el desarrollo sostenible toma más relavancia en nuestras vidas, esto se debe a que cada vez la humanidad es más consciente de las consecuencias negativas que esta teniendo la globalización y las consecuencias que conlleva. Puedes mirar las actividades que proponemos para ayudar al medio ambiente: </p>
            <a class="cta-btn actividades-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Actividades</a>
          </div>

        </div>
      </section><!-- End Cta Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container">

          <div class="row">
            <div class="col-lg-4">
              <div class="section-title" data-aos="fade-right">
                <h2 class="ecoutilidad">¿Qué puedes hacer en ECO?</h2>
                <p class="ecoutilidadresp">En eco puedes realizar multiples acciones que permiten aportar tu granito de arena para que el mundo sea mejor.</p>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-md-6 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a class="actividades-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Actividades</a></h4>
                    <p class="ecoactiresp">Existen actividades que que ECO te propone que realices para ayudar al medio ambiente. Como por ejemplo tener tu propio huerto.¡¿No suena divertido?!</p>
                  </div>
                </div>

                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a class="proyecto-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'action','showAll');insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">Proyectos</a></h4>
                    <p class="ecoproyresp">Además de las actividades propuestas por ECO también puedes participar en proyectos.</p>
                  </div>
                </div>

                <div class="col-md-6 d-flex align-items-stretch mt-4">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">

                    <div class="icon"><i class="bx bx-group"></i></div>
                    <h4><a class="grupo-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Grupo');enviaform(document.formenviar);">Grupos</a></h4>
                    <p class="ecogruporesp">Realizar proyectos es más divertido en grupo, en ECO te damos la oportunidad de que al participar en un proyecto puedas llevar este acabo con un grupo de personas.</p>
                  </div>
                </div>

                <div class="col-md-6 d-flex align-items-stretch mt-4">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon"><i class="bx bx-message"></i></div>
                    <h4><a class="usuarios-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">Usuarios</a></h4>

                    <p class="ecousuarioresp">ECO te permite relacionarte con otros usuarios y compartir ideas para futuros proyectos y actividades.</p>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </section><!-- End Services Section -->

    </main><!-- End #main -->
<?php

    include 'footer.php';
  }
}

?>