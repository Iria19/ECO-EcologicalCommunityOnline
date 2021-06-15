<?php

//Vista todos los mensajes 
class Mensaje_List
{

    var $mensaje;

    function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
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

                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">

                            <h4 class="users-disclaimer text-success mt-4 mensajes">Mensajes</h4>
                            <div class="p-3" style="display:inline-block; float: right;">
                                <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                                    <div class="input-group">
                                        <div class="input-group-append">

                                            <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'responsable_actividad','<?php echo $_SESSION['username'] ?>');insertacampo(document.formenviar,'responsable_grupo','<?php echo $_SESSION['username'] ?>');insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Mensaje'); enviaform(document.formenviar);">
                                                <div class="icon"><i class="bx bx-message-add" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                            </a>
                                            <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Mensaje'); enviaform(document.formenviar);">
                                                <div class="icon"><i class="bx bx-search" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="p-3 pt-0">
                                <table class="table p-5">

                                    <tbody>
                                        <?php
                                        if ($this->mensaje != "") {
                                            foreach ($this->mensaje as $mensa) {
                                                if ($this->es_admin || $mensa['receptor'] == $_SESSION['username']) {
                                                    if ($mensa['leido'] == 'No') {
                                        ?>

                                                        <tr class="colorNoleido">
                                                        <?php
                                                    } else { ?>
                                                        <tr class="colorleido">
                                                        <?php } ?>
                                                        <td><?php echo $mensa['emisor'] ?></td>
                                                        <td><?php echo $mensa['titulo'] ?></td>
                                                        <td>
                                                            <?php if ($mensa['leido'] == 'No') {
                                                                if ($mensa['receptor'] == $_SESSION['username']) {
                                                            ?>
                                                                <a class="getstarted scrollto filter checkmensajeleido" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_mensaje','<?php echo $mensa['id_mensaje'] ?>');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-message-check" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                            <?php }
                                                            } else { ?>
                                                                <a class="getstarted scrollto filter " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'id_mensaje','<?php echo $mensa['id_mensaje'] ?>');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-message-check" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                            <?php
                                                            } ?>
                                                            <?php
                                                        }
                                                        if ($this->es_admin) {
                                                            if ($mensa['leido'] == 'No') {
                                                                if ($mensa['receptor'] != $_SESSION['username']) {
                                                            ?>    
                                                                    <a class="getstarted scrollto filter checkmensajeleido" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_mensaje','<?php echo $mensa['id_mensaje'] ?>');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'action','currentFormAdmin');enviaform(document.formenviar);">
                                                                        <div class="icon"><i class="bx bx-message-check" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                    </a>
                                                                <?php } ?>
                                                                <a class="getstarted scrollto filter  " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_mensaje','<?php echo $mensa['id_mensaje'] ?>');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-trash trashmessage" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                            <?php } else {  ?>

                                                                <a class="getstarted scrollto filter  " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_mensaje','<?php echo $mensa['id_mensaje'] ?>');insertacampo(document.formenviar,'controller','Mensaje');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-trash trashmessageleido" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                                

                                                        <?php }
                                                        } ?>
                                                        </td>
                                                        </tr>
                                                <?php
                                            }
                                        }
                                                ?>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section><!-- End About Section -->


<?php
        include 'footer.php';
    }
}

?>