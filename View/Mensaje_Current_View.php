<?php

//Vista de abrir mensaje
class Mensaje_Current
{

  var $mensaje;

  function __construct($mensaje)
  {
    $this->mensaje = $mensaje;
    $this->render();
  }

  function render()
  {
    include 'header.php';
?>

    <div class="row mensajecurrentdiv justify-content-center mt-0 ml-0 hero_register " id="hero">



      <div class="card card-body text-center " action="index.php">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
          <div class=" grupocurrent ">

            <div class="row joinear">
              <div class="mensajecurrentdiv align-items-stretch currentgroupgrupo" data-aos="fade-right">
                <div class="content mensajecurrentdiv">
                  <h3>
                    <br>

                    <label class="titulo" for="titulo">Titulo</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $this->mensaje['titulo'] ?>" readonly>

                    <br>
                    <label class="cuerpo" for="cuerpo">cuerpo</label>
                    <input type="text" id="cuerpo" name="cuerpo" class="form-control" value="<?php echo $this->mensaje['cuerpo'] ?>" readonly>
                    <br>
                    <br>
                    <div class="text-center botonesgrupoproyecto">
                      <a class="mb-0 m-2 volverbtnmensaje" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'receptor','<?php echo $_SESSION['username'] ?>'); insertacampo(document.formenviar,'action','Search'); insertacampo(document.formenviar,'controller','Mensaje');enviaform(document.formenviar);">
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