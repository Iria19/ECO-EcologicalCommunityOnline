<?php

class Usuario_Grupo_Search {
    var $usuarios;
    var $grupos;

    function __construct($usuarios,$grupos) {
        $this->grupos = $grupos;
        $this->usuarios = $usuarios;
        $this->render();
    }


    function render() {
        include 'header.php';
        
        ?>
        <div class="row justify-content-center mt-0 hero_register" id="hero">

            <div class="col-sm-6 mt-10">
 

                <div class="card card-body text-center " action="index.php">
                    <form class="form-signup form-grupo-search" name="searchFormUserGroup" method="post">
                        <h1 class="h3 mb-4 font-weight-normal buscarbtn text-success">Buscar</h1>

                        <div>
                        <h3><?php echo $this->grupos['nombre'] ?></h3>
                        <input type="hidden" id="id_grupo" name="id_grupo" class="form-control" value="<?php echo $this->grupos['id_grupo'] ?>" >
                        </div>
                        <br>
                        <br>

                        <div>
                        <label class="username" >Nombre de usuario</label>
                                <select class="form-select" name="username" id="select_username" >
                                            <option value=""></option>

                                            <?php
                                            if($this->usuarios!=''){
                                            foreach ($this->usuarios as $usuario) {?>
                                                <option value="<?php echo $usuario['username'] ?>"><?php echo $usuario['username'] ?></option>

                                        <?php } } ?>
                                </select>
                        </div>
                        <br>
                        


                        <label class="ecoins" for="nombre">Ecoins</label>
                        <input type="number" id="ecoins" name="ecoins" class="form-control" placeholder="ecoins" >

                        <br>   
                        <div>
                        <label class="tipo_participacion" >Tipo Participacion</label>
                                <select class="form-select" name="tipo_participacion" id="select_grupo" >
                                            <option value="" selected></option>

                                            <option value="participa" id="participa" name="participa" >Participa</option>
                                            <option value="sigue" id="sigue" name="sigue" >Sigue</option>

                                </select>
                        </div>
                        <br>  
                                                
                        <div class="mt-3">
                                <br>
                                <a class="boton_eco volverbtn" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_grupo',<?php echo($_POST['id_grupo']); ?>);insertacampo(document.formenviar,'controller','Usuario_Grupo');insertacampo(document.formenviar,'action','Showall');enviaform(document.formenviar);">
                                        Volver
                                </a>
                                <a class="boton_eco buscarbtn" type="button" onclick="insertacampo(document.searchFormUserGroup,'action','search');insertacampo(document.searchFormUserGroup,'controller','Usuario_Grupo'); enviaform(document.searchFormUserGroup);">
                                    Buscar
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