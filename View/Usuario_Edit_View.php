<?php
//Vista de editar usuario

class Usuario_Edit
{

    var $usuario;

    function __construct($usuario)
    {
        $this->usuario = $usuario;
        $this->es_admin = es_admin();

        if (($this->es_admin)) {
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
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->usuario['username'] ?></h1>
                        </div>

                        <label class="contrasenha" for="contrasenha">Contraseña</label>
                        <input type="password" id="contrasenha" name="contrasenha" class="form-control" value="<?php echo $this->usuario['contrasenha'] ?>" onblur="if (esNoVacio('contrasenha') && comprobarLongitudMinima('contrasenha', 3)&& comprobarLongitudMaxima('contrasenha', 100));">

                        <br>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->usuario['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <!--Comprobaciones y las del final al enviar form-->
                        <br>

                        <label class="apellidos" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value=<?php echo $this->usuario['apellidos'] ?> onblur="if esNoVacio('apellidos') && comprobarLetrasEspacios('apellidos',60) && comprobarLongitudMinima('apellidos', 3) && comprobarLongitudMaxima('apellidos', 200));">

                        <br>

                        <label class="email" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $this->usuario['email'] ?>" onblur="if (esNoVacio('email') && comprobarEmail('email',100));">

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->usuario['descripcion'] ?>" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100));">

                        <br>

                        <label class="telefono" for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $this->usuario['telefono'] ?>" onblur="if ( comprobarTelefono('telefono',9));">

                        <br>
                        <input type="text" id="tipo" name="tipo" class="form-control" value="<?php echo $this->usuario['tipo'] ?>">

                        <label class="DNI" for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" class="form-control" value="<?php echo $this->usuario['DNI'] ?>" onblur="if (comprobarDNI('DNI') );">


                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'username','<?php echo $this->usuario['username'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Usuario'); enviaformcorrecto(document.editForm, comprobar_usuario());">
                                Editar
                            </a>
                        </div>
                    </form>
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
                    <form class="form-signup" name="editForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal editarbtn text-success">Editar </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->usuario['username'] ?></h1>
                        </div>

                        <label class="contrasenha" for="contrasenha">Contraseña</label>
                        <input type="password" id="contrasenha" name="contrasenha" class="form-control" value="<?php echo $this->usuario['contrasenha'] ?>" onblur="if (esNoVacio('contrasenha') && comprobarLongitudMinima('contrasenha', 3)&& comprobarLongitudMaxima('contrasenha', 100));">

                        <br>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->usuario['nombre'] ?>" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">
                        <!--Comprobaciones y las del final al enviar form-->
                        <br>

                        <label class="apellidos" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value=<?php echo $this->usuario['apellidos'] ?> onblur="if esNoVacio('apellidos') && comprobarLetrasEspacios('apellidos',60) && comprobarLongitudMinima('apellidos', 3) && comprobarLongitudMaxima('apellidos', 200));">

                        <br>

                        <label class="email" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $this->usuario['email'] ?>" onblur="if (esNoVacio('email') && comprobarEmail('email',100));">

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->usuario['descripcion'] ?>" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 100));">

                        <br>

                        <label class="telefono" for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $this->usuario['telefono'] ?>" onblur="if ( comprobarTelefono('telefono',9));">

                        <br>
                        <label class="tipo" for="tipo">Tipo</label>
                        <select name="tipo">
                            <option value="estandar" id="estandar" name="estandar" selected>Estandar</option>
                            <option value="administrador" id="administrador" name="administrador">Administrador</option>
                        </select>
                        <br>
                        <label class="DNI" for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" class="form-control" value="<?php echo $this->usuario['DNI'] ?>" onblur="if (comprobarDNI('DNI') );">


                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco editarbtn" type="button" onclick="insertacampo(document.editForm,'username','<?php echo $this->usuario['username'] ?>'); insertacampo(document.editForm,'action','edit'); insertacampo(document.editForm,'controller','Usuario'); enviaformcorrecto(document.editForm, comprobar_usuario());">
                                Editar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php

        include 'footer.php';
    }
}

?>