<?php

class Documentacion_List {
    
    var $documentacion;
    var $responsableproyecto;
    var $responsableactividad;

    function __construct($documentacion,$responsableproyecto,$responsableactividad) {
        $this->documentacion = $documentacion;
        if(!empty($responsableproyecto)){
            $this->responsableproyecto = $responsableproyecto;
        }else{
            $this->responsableproyecto='';
        }
        if(!empty($responsableactividad)){
            $this->responsableactividad = $responsableactividad;
        }else{
            $this->responsableactividad='';
        }
        $this->es_admin= es_admin();
        $this->render();
    }

    function render() {
        include 'header.php';
        ?>
        <div class="row justify-content-center mt-0 " id="hero">
            
        <section id="about" class="about">
        <div class="container usercontainer">

            <div class="row content">
            
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">

                      <h4 class="users-disclaimer text-success mt-4 documentacion">Documentos</h4>
                                    <div class="p-3" style="display:inline-block; float:right;">
                                        <form class="form-inline form-resource-search mb-0" name="formularilistar" method="post">
                                            <div class="input-group">
                                                <div class="input-group-append">               
                                                
                                                    <a class="getstarted scrollto filter" type="button" onclick = "crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $_SESSION['username'];?>'); insertacampo(document.formenviar,'action','addForm'); insertacampo(document.formenviar,'controller','Documentacion'); enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-file-blank" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                    </a>    
                                                                                    
                                                    <a class="getstarted scrollto filter" type="button" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','searchForm'); insertacampo(document.formenviar,'controller','Documentacion'); enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-file-find" data-aos="zoom-in" data-aos-delay="100"></i></div>
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
                                            <th scope="col" class="users-header-archivo archivo">archivo</th>
                                            <th scope="col" class="users-header-validado validado">validado</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($this->documentacion!=""){

                                             foreach ($this->documentacion as $documento) {
                                            ?>
                                            <tr>
                                                <td><?php echo $documento['username']?></td>
                                                <td><?php echo $documento['archivo']?></td>
                                                <td><?php echo $documento['validado']?></td>
                                                <td>
                                                <?php 
                                                if(is_array($this->responsableproyecto)&&$documento['id_proyecto']!='999999999'){
                                                    foreach($this->responsableproyecto as $responsable){
                                                        foreach ($responsable as $key => $value){
                                                            if((int)$documento['id_proyecto']==$key){
                                                                $responsableproyecto=$value;
                                                            }
                                                        }
                                                    }
                                                }else{
                                                    $responsableproyecto="";
                                                }

                                                if(is_array($this->responsableactividad)&&$documento['id_actividades']!='999999999'){
                                                    foreach($this->responsableactividad as $responsable){
                                                        foreach ($responsable as $key => $value){
                                                            if((int)$documento['id_actividades']==$key){
                                                                $responsableactividad=$value;
                                                            }
                                                        }
                                                    }
                                    
                                                }else{
                                                    $responsableactividad="";
                                                }
                                                if($this->es_admin ||($_SESSION['username']==$documento['username'] && $documento['validado']=='No') || ($_SESSION['username']==$responsableproyecto )|| ($_SESSION['username']==$responsableactividad )){ 
                                                     ?>

                                                    <a class="getstarted scrollto filter" type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'username','<?php echo $_SESSION['username'];?>');insertacampo(document.formenviar,'id_documentacion','<?php echo $documento['id_documentacion']?>');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','editForm');enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-pencil" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                    </a>
                                                    <?php }
                                                    if($this->es_admin ||($_SESSION['username']==$documento['username']) || ($_SESSION['username']==$responsableproyecto )|| ($_SESSION['username']==$responsableactividad )){ 
                                                    ?>     

                                                    <a class="getstarted scrollto filter " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_documentacion','<?php echo $documento['id_documentacion']?>');insertacampo(document.formenviar,'archivo','<?php echo $documento['archivo']?>');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','deleteForm');enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-trash" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                    </a>
                                                    <?php } ?>     

                                                    <a class="getstarted scrollto filter " type="button" onclick="crearform('formenviar','post');insertacampo(document.formenviar,'id_documentacion','<?php echo $documento['id_documentacion']?>');insertacampo(document.formenviar,'controller','Documentacion');insertacampo(document.formenviar,'action','currentForm');enviaform(document.formenviar);">
                                                        <div class="icon"><i class="bx bx-user-pin" data-aos="zoom-in" data-aos-delay="100"></i></div>
                                                    </a>
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