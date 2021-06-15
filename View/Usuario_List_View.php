<?php
//Vista con la lista de usuarios
class Usuario_List
{

    var $Usuarios;

    function __construct($Usuarios)
    {
        $this->Usuarios = $Usuarios;
        $this->es_admin = es_admin();
        $this->es_authenticated = is_authenticated();

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

                            <h4 class="users-disclaimer text-success mt-4 usuariosregistrados">Usuarios registrados</h4>
                            <div class="p-3" style="display:inline-block; float: right;">
                                <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                                    <div class="input-group">
                                        <div class="input-group-append">

                                            <?php
                                            if ($this->es_authenticated) {
                                                if ($this->es_admin) {
                                            ?>
                                                    <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Usuario'); enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-user-plus" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                    </a>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Usuario'); enviaform(document.formenviar);">
                                                <div class="icon"><i class="bx bx-search" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="p-3 pt-0">
                                <table class="table table-striped p-5">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="users-header-username username">Nombre del Usuario</th>
                                            <th scope="col" class="users-header-nombre nombre">Nombre</th>
                                            <th scope="col" class="users-header-apellidos apellidos">Apellidos</th>
                                            <th scope="col" class="users-header-ecoins Ecoins">Ecoins</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($this->Usuarios != "") {

                                            foreach ($this->Usuarios as $Usuario) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $Usuario['username'] ?></td>
                                                    <td><?php echo $Usuario['nombre'] ?></td>
                                                    <td><?php echo $Usuario['apellidos'] ?></td>
                                                    <td><?php echo $Usuario['Ecoins'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($this->es_authenticated) {
                                                            if (($_SESSION['username'] == $Usuario['username']) || $this->es_admin) {
                                                        ?>
                                                                <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $Usuario['username'] ?>');insertacampo(document.formenviar,'controller','Usuario');insertacampo(document.formenviar,'action','editForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-pencil" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                                <a class="getstarted scrollto filter " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $Usuario['username'] ?>');insertacampo(document.formenviar,'controller','Usuario');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-trash" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                                <a class="getstarted scrollto filter " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $Usuario['username'] ?>');insertacampo(document.formenviar,'controller','Usuario');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
                                                                    <div class="icon"><i class="bx bx-user-pin" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                                </a>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
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