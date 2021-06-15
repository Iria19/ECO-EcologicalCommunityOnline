<html>
<?php
include 'includes.php';

?>

<body onload="setLang()">
  <!-- Modal -->
  <div id="myModal" class="modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-contenido">
      <div>
        <div id="avisomodal">
          <img src="./View/img/aviso.png" name="aviso" width="45" /><strong>Error</strong>
          </a>
        </div>
        <div>
          <span id="mensajeError1"></span>
          <span id="mensajeError2"></span>
        </div>
        <a type="button" id="btncerrarmodal" class="btn btn-success cerrar-boton" data-bs-dismiss="modal" onclick="cerrarModal()">
          Cerrar
        </a>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light" href="#hero"><span><a onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','_Default');insertacampo(document.formenviar,'action','dashboard');enviaform(document.formenviar);">ECO</a></span></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li class="dropdown "><a onclick="crearform('formenviar','post');insertacampo(document.formenviar,'action','showAll');insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);"><span class="proyecto-pal">Proyecto</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a class="nav-link scrollto proyecto-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'action','showAll');insertacampo(document.formenviar,'controller','Proyecto');enviaform(document.formenviar);">Proyectos</a></li>

                <li><a class="documentacion" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','searchProyecto');enviaform(document.formenviar);">Documentacion</a></li>

              </ul>
            </li>
            <li><a class="nav-link scrollto grupo-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Grupo');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Grupos</a></li>

            <li class="dropdown "><a onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','showAll');enviaform(document.formenviar);"><span class="actividades-pal">Actividades</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a class="Actividad" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Actividad');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Actividad</a></li>
                <li><a class="actividadesusu" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Actividades');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Actividades Realizadas Por Usuarios</a></li>
                <li><a class="documentacion" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','searchActividad');enviaform(document.formenviar);">Documentacion</a></li>

              </ul>
            </li>


            <li>
              <a class="nav-link scrollto usuarios-pal" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Usuario');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">Usuarios</a>
            </li>
            <li class="dropdown"><a href="#"><span class="idioma-pal">Idioma</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <a class="btn btn-link" type="button" onclick="setLang('ES')">ES</a>
                  <a class="btn btn-link" type="button" onclick="setLang('EN')">EN</a>
                </div>
              </ul>
            </li>

            <?php
            if (is_authenticated() === true) {
            ?>
              <li class="nav-item">
                <a class="nav-link" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $_SESSION['username'] ?>'); insertacampo(document.formenviar,'action','editForm'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                  <b><?php echo $_SESSION['username'] ?></b>
                </a>
              </li>
              <li class="nav-item">
                <?php
                if (es_admin() === true) { ?>
              <li class="nav-item">

                <form class="form-signup form-grupo-search" name="searchFormMensajesAdmin" method="post">
                  <a class="mb-0 m-2" type="button" onclick="insertacampo(document.searchFormMensajesAdmin,'action','search');insertacampo(document.searchFormMensajesAdmin,'controller','Mensaje'); enviaformcorrecto(document.searchFormMensajesAdmin, comprobar_mensaje_header());">
                    <div class="icon"><i class="bx bxs-message-alt-detail "></i></div>
                    <p class="avisomensajeadmin">(admin)</p>

                  </a>

                </form>

              </li>


            <?php } ?>
            <li class="nav-item">
              </a>
            </li>
            <form class="form-signup form-grupo-search" name="searchForm" method="post">
              <input type="hidden" id="receptor" name="receptor" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
              <a class="mb-0 m-2" type="button" onclick="insertacampo(document.searchForm,'action','search');insertacampo(document.searchForm,'controller','Mensaje'); enviaformcorrecto(document.searchForm, comprobar_mensaje_header());">
                <div class="icon"><i class="bx bx-message"></i></div>
                <b><?php echo $_SESSION['Notificaciones'] ?></b>

              </a>
            </form>
            </li>

            <li class="nav-item">
              <a class="getstarted scrollto salir-pal" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','logout'); insertacampo(document.formenviar,'controller','Login');enviaform(document.formenviar);">
                Salir
              </a>
            </li>
          <?php
            } else {
          ?>
            <a class="getstarted scrollto login-header" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Login');insertacampo(document.formenviar,'action','formulariologin');enviaform(document.formenviar);"> Iniciar sesión</a>

          <?php
            }
          ?>

          </ul>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->