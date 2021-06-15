<?php

//Vista de ver detalles usuario
class Usuario_Current
{

    var $usuario;
    var $ecoinsusergrupo;
    var $ecouseractividad;
    var $ecoinsusuariototal;

    function __construct($usuario, $ecoinsusergrupo, $ecouseractividad, $ecoinsusuariototal)
    {
        $this->usuario = $usuario;
        $this->ecoinsusergrupo = $ecoinsusergrupo;
        $this->ecouseractividad = $ecouseractividad;
        $this->ecoinsusuariototal = $ecoinsusuariototal;

        $this->render();
    }
    function render()
    {
        include 'header.php';
?>

        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">


                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup" name="currentForm" method="post">
                        <div class="tituloflex">
                            <h1 class="h3 mb-4 font-weight-normal UserCurrent text-success">Información de </h1>
                            <h1 class="usuarionombrecolor"><?php echo $this->usuario['username'] ?></h1>
                        </div>

                        <label class="username" for="username">Nombre de usuario</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $this->usuario['username'] ?>" readonly>

                        <br>

                        <label class="nombre" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $this->usuario['nombre'] ?>" readonly>

                        <br>

                        <label class="apellidos" for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value=<?php echo $this->usuario['apellidos'] ?> readonly>

                        <br>

                        <label class="email" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $this->usuario['email'] ?>" readonly>

                        <br>
                        <label class="descripcion" for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $this->usuario['descripcion'] ?>" readonly>

                        <br>

                        <label class="telefono" for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $this->usuario['telefono'] ?>" readonly>

                        <br>

                        <label class="tipo" for="tipo">tipo</label>
                        <input type="text" id="tipo" name="tipo" class="form-control" value="<?php echo $this->usuario['tipo'] ?>" readonly>

                        <br>

                        <label class="DNI" for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" class="form-control" value="<?php echo $this->usuario['DNI'] ?>" readonly>
                        <br>
                        <label class="EcoinsGrupo" for="EcoinsGrupo">EcoinsGrupo</label>
                        <input type="text" class="form-control" value="<?php echo $this->ecoinsusergrupo; ?>" readonly>
                        <br>
                        <label class="EcoinsActividades" for="EcoinsActividades">EcoinsActividades</label>
                        <input type="text" class="form-control" value="<?php echo $this->ecouseractividad; ?>" readonly>
                        <br>
                        <label class="EcoinsTotales" for="EcoinsTotales">EcoinsTotales</label>
                        <input type="text" class="form-control" value="<?php echo $this->ecoinsusuariototal; ?>" readonly>
                        <br>
                        <a class="mb-0 m-2 volverbtn" type="button" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','ShowAll'); insertacampo(document.formenviar,'controller','Usuario');enviaform(document.formenviar);">
                            Volver
                        </a>

                    </form>
                </div>
            </div>
        </div>

<?php

        include 'footer.php';
    }
}

?>