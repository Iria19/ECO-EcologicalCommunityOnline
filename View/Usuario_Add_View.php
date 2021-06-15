<?php

//Vista añadir usuario
class Usuario_Add
{

    function __construct()
    {
        $this->render();
    }

    function render()
    {
        include 'header.php';
?>

        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="addForm" method="post">
                        <h1 class="h3 mb-4 font-weight-normal UserAddPal text-success">Añadir Usuario</h1>

                        <label class="username" for="username">Nombre de usuario</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Login de usuario" onblur="if (esNoVacio('username') && comprobarLetrasNumeros('username',30) && comprobarLongitudMinima('username', 3) && comprobarLongitudMaxima('username', 30));">

                        <br>

                        <label class="contrasenha" for="contrasenha">Contraseña</label>
                        <input type="password" id="contrasenha" name="contrasenha" class="form-control" placeholder="Contraseña" onblur="if (esNoVacio('contrasenha') && comprobarLongitudMinima('contrasenha', 3) && comprobarLongitudMaxima('contrasenha', 100));">

                        <br>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (esNoVacio('nombre') && comprobarLetrasEspacios('nombre',60)&& comprobarLongitudMinima('nombre', 2)  && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <label class="apellidos" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" onblur="if (esNoVacio('apellidos') && comprobarLetrasEspacios('apellidos',60) && comprobarLongitudMinima('apellidos', 3) && comprobarLongitudMaxima('apellidos', 200));">

                        <br>

                        <label class="email" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" onblur="if (esNoVacio('email') && comprobarEmail('email',100));">

                        <br>

                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" onblur="if (comprobarLongitudMaxima('descripcion', 255) && comprobarLetrasEspaciosNumerosCaracteresEspecialesvacio('descripcion', 255) );">

                        <br>

                        <label class="telefono" for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" onblur="if (comprobarTelefono('telefono',9));">

                        <br>

                        <label class="tipo" for="tipo">Tipo</label>
                        <br>
                        <select name="tipo">
                            <option value="estandar" id="estandar" name="estandar" selected>Estandar</option>
                            <option value="administrador" id="administrador" name="administrador">Administrador</option>
                        </select>
                        <br>

                        <label class="DNI" for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" class="form-control" placeholder="DNI" onblur="if (comprobarDNI('DNI') );">

                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                            Volver
                        </a>
                        <a class="boton_eco UserAddPal" type="button" onclick=" insertacampo(document.addForm,'action','Add'); insertacampo(document.addForm,'controller','Usuario'); enviaformcorrecto(document.addForm, comprobar_registro()); ">
                            Añadir Usuario
                        </a>

                    </form>
                </div>
            </div>
        </div>

        <script>
            var input_username = document.getElementById("username");
            input_username.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_nombre = document.getElementById("nombre");
            input_nombre.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_apellidos = document.getElementById("apellidos");
            input_apellidos.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_contrasenha = document.getElementById("Add");
            input_contrasenha.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_email = document.getElementById("email");
            input_email.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_descripcion = document.getElementById("descripcion");
            input_descripcion.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_telefono = document.getElementById("telefono");
            input_telefono.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_tipo = document.getElementById("tipo");
            input_tipo.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
            var input_DNI = document.getElementById("DNI");
            input_DNI.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.addForm, 'action', 'Add');
                    insertacampo(document.addForm, 'controller', 'Usuario');
                    enviaformcorrecto(document.addForm, comprobar_registro());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>