<?php
   include 'includes.php'; 

class Login_View {

    function __construct() {
        $this->render();
    }

    function render() {
        include 'header.php';
        ?> 

            <div class="row justify-content-center mt-0 " id="hero">
                <div class="col-sm-6" >
                    <div class="card card-body text-center mt-10"  action="index.php">
                        <form class="form-signin " name="formulariologin" method="post">
                            
                            <h1 class="h3 mb-4 font-weight-normal login-header text-success">Iniciar sesión</h1>

                        
                            <label class="username" for="username" maxlength= '15' class="sr-only">Nombre de usuario</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario"  onblur="if (esNoVacio('username') || comprobarLetrasNumeros('username',30) || comprobarLongitudMinima('username', 3) || comprobarLongitudMaxima('username', 30));">

                            <br>

                            <label class="contrasenha" for="contrasenha" class="sr-only">Contraseña</label>
                            <input type="password" id="contrasenha" name="contrasenha" class="form-control" placeholder="Contraseña"  onblur="if (esNoVacio('contrasenha') || comprobarLongitudMaxima('contrasenha', 100));">
                            
                            <a class="boton_eco" type="button" onclick="insertacampo(document.formulariologin,'action','login');
                             insertacampo(document.formulariologin,'controller','Login');enviaformcorrecto(document.formulariologin, comprobar_login());">
                            <div class="login-header"> Iniciar sesión</div>
                            </a>

                            <br>
                            <div class="mt-3">
                               <a class="text-accent register-link" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formregistrar'); insertacampo(document.formenviar,'controller','Registro'); enviaform(document.formenviar);">
                                 <div class="register-header">   Registro </div>
                               </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        <script>
        var input_username = document.getElementById("username");
        input_username.addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                insertacampo(document.formulariologin,'action','login');
                insertacampo(document.formulariologin,'controller','Login'); 
                enviaformcorrecto(document.formulariologin, comprobar_login());
            }
        });
        var input_contrasenha = document.getElementById("contrasenha");
        input_contrasenha.addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                insertacampo(document.formulariologin,'action','login');
                insertacampo(document.formulariologin,'controller','Login'); 
                enviaformcorrecto(document.formulariologin, comprobar_login());
            }
        });
        </script>
        <?php

        include 'footer.php';
    }

}

?>