<?php
//Vista buscar mensaje
class Mensaje_Search
{
    var $usuarios;

    function __construct($usuarios)
    {
        $this->usuarios = $usuarios;
        $this->es_admin = es_admin();
        if ($this->es_admin) {
            $this->renderadmin();
        } else {
            $this->render();
        }
    }


    function render()
    {
        include 'header.php';

?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup form-grupo-search" name="searchFormUno" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="titulo" for="titulo">Titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo">


                        <input type="hidden" id="receptor" name="receptor" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>

                        <label class="leido">Leido</label>

                        <select name="leido">
                            <option value="" selected></option>
                            <option value="Si" id="Si" name="Si">Si</option>
                            <option value="No" id="No" name="No">No</option>
                        </select>
                        <br>

                        <div>
                            <label class="emisor">Emisor</label>
                            <select class="form-select" name="emisor" id="select_emisor">
                                <option value="" selected></option>

                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>


                    </form>
                    <div class="mt-3">
                        <br>

                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'receptor','<?php echo $_SESSION['username'] ?>'); insertacampo(document.formenviar,'action','Search'); insertacampo(document.formenviar,'controller','Mensaje');enviaform(document.formenviar);">
                            Volver
                        </a>

                        <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormUno,'action','search');insertacampo(document.searchFormUno,'controller','Mensaje'); enviaformcorrecto(document.searchFormUno, comprobar_mensaje_buscar());">
                            Buscar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php

        include 'footer.php';
    }


    function renderadmin()
    {
        include 'header.php';

    ?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup form-grupo-search" name="searchFormUno" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="titulo" for="titulo">Titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo">

                        <div>
                            <label class="receptor">Receptor</label>
                            <select class="form-select" name="receptor" id="select_receptor">
                                <option value="" selected></option>

                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div>
                            <label class="emisor">Emisor</label>
                            <select class="form-select" name="emisor" id="select_emisor">
                                <option value="" selected></option>

                                <?php
                                if ($this->usuarios != '') {
                                    foreach ($this->usuarios as $usuario) { ?>
                                        <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <br>
                        <label class="leido">Leido</label>

                        <select name="leido">
                            <option value="" selected></option>
                            <option value="Si" id="Si" name="Si">Si</option>
                            <option value="No" id="No" name="No">No</option>
                        </select>
                        <br>




                    </form>
                    <div class="mt-3">
                        <br>

                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'receptor','<?php echo $_SESSION['username'] ?>'); insertacampo(document.formenviar,'action','Search'); insertacampo(document.formenviar,'controller','Mensaje');enviaform(document.formenviar);">
                            Volver
                        </a>

                        <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormUno,'action','search');insertacampo(document.searchFormUno,'controller','Mensaje'); enviaformcorrecto(document.searchFormUno, comprobar_mensaje_buscar());">
                            Buscar
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php

        include 'footer.php';
    }
}

?>