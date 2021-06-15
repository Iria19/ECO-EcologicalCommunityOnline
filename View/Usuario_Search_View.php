<?php
//Vista de buscar usuario
class Usuario_Search
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
                    <form class="form-signup" name="searchFormUsuario" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <label class="username" for="username">Nombre de usuario</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Login de usuario" onblur="if (comprobarLetrasNumerosvacio('username',30)  && comprobarLongitudMaxima('username', 30));">

                        <br>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" onblur="if (comprobarLetrasEspaciosvacio('nombre',60) && comprobarLongitudMaxima('nombre', 20));">

                        <br>

                        <label class="apellidos" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" onblur="if (comprobarLetrasEspaciosvacio('apellidos',60)  && comprobarLongitudMaxima('apellidos', 200));">

                        <br>

                        <label class="email" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" onblur="if (comprobaremailbuscarvacio('email',100));">

                        <br>

                        <label class="telefono" for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" onblur="if (comprobarTelefonobuscar('telefono',9));">

                        <br>

                        <label class="DNI" for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" class="form-control" placeholder="DNI" onblur="if (comprobarLetrasNumerosvacioDNI('DNI') );">

                        <br>

                        <div class="mt-3">
                            <br>
                            <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                                Volver
                            </a>
                            <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormUsuario,'action','search');insertacampo(document.searchFormUsuario,'controller','Usuario'); enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());">
                                Buscar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            var input_login = document.getElementById("username");
            input_login.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });
            var input_pass = document.getElementById("nombre");
            input_pass.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });
            var input_login = document.getElementById("apellidos");
            input_login.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });

            var input_login = document.getElementById("email");
            input_login.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });

            var input_pass = document.getElementById("telefono");
            input_pass.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });

            var input_pass = document.getElementById("DNI");
            input_pass.addEventListener("keydown", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    insertacampo(document.searchFormUsuario, 'action', 'search');
                    insertacampo(document.searchFormUsuario, 'controller', 'Usuario');
                    enviaformcorrecto(document.searchFormUsuario, comprobar_usuario_buscar());
                }
            });
        </script>
<?php

        include 'footer.php';
    }
}

?>