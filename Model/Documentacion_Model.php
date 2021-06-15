<?php

include_once './Model/Default_Model.php';
include_once './Model/Documentacion_Model_Validaciones.php';

//Model de documentacion

class Documentacion_Model extends Default_Model {

    var $id_documentacion;
    var $archivo;
    var $username;
    var $id_actividades;
    var $id_proyecto;
    var $validado;

    var $errores_datos = array();

    function __construct() {
        $this->fill_fields();
    }
    
    function fill_fields() {
        $this->id_documentacion = '';
        $this->username = '';
        $this->id_actividades = '';
        $this->archivo = '';
        $this->archivodelete = '';

         $this->id_proyecto = '';
        $this->validado = '';

        $message = ''; 

        if ($_POST) {
            if (isset($_POST['id_documentacion']))
                $this->id_documentacion = $_POST['id_documentacion'];
            if (isset($_POST['username']))
                $this->username = $_POST['username'];
            if (isset($_POST['id_actividades']))
                $this->id_actividades = $_POST['id_actividades'];
            if (isset($_POST['id_proyecto']))
                $this->id_proyecto = $_POST['id_proyecto'];
            if (isset($_POST['validado']))
                $this->validado = $_POST['validado'];
            if (isset($_FILES))
                $this->archivo = $_FILES;
            if (isset($_POST['archivo']))
                $this->archivodelete = $_POST['archivo'];
        }
    }

   //rellena validaciones
    function rellenar_atributos($documentacion_validaciones){
        $documentacion_validaciones->validado=$this->validado;
    }
    //Comprueba si existe actividades
    function existe_actividades() {

        $this->seek_existe_actividades();
        if ($this->feedback['code'] === '70011'){
            return true;
        }

        return false;
    }

    //Busca si existe actividades
    function seek_existe_actividades() {
        $this->query = "
        SELECT * FROM actividades
        WHERE id_actividades = '$this->id_actividades';
        ";
        $this->get_one_result_from_query();
        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '70010';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '70011';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '70012';      // Error de obtención
        }
        return $this->feedback;
    
    }

    //Comprueba si existe usuario
    function existe_usuario() {

        $this->seek_existe_usuario();
        if ($this->feedback['code'] === '10007'){
            return true;
        }
        return false;
    }

    //Busca si existe usuario
    function seek_existe_usuario() {
        $this->query = "
            SELECT * FROM usuario
            WHERE username = '$this->username';
        ";
        $this->get_one_result_from_query();

        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '10006';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '10007';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '10008';      // Error de obtención
        }
        return $this->feedback;

    }

    //Mira si cambio el archivo al editar
    function cambio_archivo() {
        if(empty($this->archivo['uploadedFile']['name'])||($this->archivo['uploadedFile']['name']=='')){//si esta vacio es que no cambio
            return false;
        }else{
            return true;
        }
    }

    //Comprueba si existe proyecto
    function existe_proyecto() {

        $this->seek_existe_proyecto();
        if ($this->feedback['code'] === '40011'){
            $this->feedback['ok'] = true;
            return true;
        }
        return false;
    }

    //Busca si existe proyecto
    function seek_existe_proyecto() {
        $this->query = "
            SELECT * FROM proyecto
            WHERE id_proyecto = '$this->id_proyecto';
        ";
        $this->get_one_result_from_query();

        if ($this->feedback['ok']){                     // Éxito en la obtención
            if ($this->feedback['code'] == '00002') {   // Vuelve vacío
                $this->feedback['code'] = '40010';
            } else {                                    // Vuelve con datos
                $this->feedback['code'] = '40011';
            }
        } else {
            if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
                $this->feedback['code'] = '40012';      // Error de obtención
        }
        return $this->feedback;

    }

    //Comprueba existe documentacion
    function existe_documentacion() {

        $this->SeekDocumentacion();
        if ($this->feedback['code'] === '80011')
            return true;
        else return false;
    }

    //Busca documentacion
    function SeekDocumentacion() {
        $this->query = "
        SELECT * FROM documentacion
        WHERE (id_documentacion = '$this->id_documentacion') ;
    ";
    $this->get_one_result_from_query();
    if ($this->feedback['ok']){                     // Éxito en la obtención
        if ($this->feedback['code'] == '00002') {   // Vuelve vacío
            $this->feedback['code'] = '80010';
        } else {                                    // Vuelve con datos
            $this->feedback['code'] = '80011';
        }
    } else {
        if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
            $this->feedback['code'] = '80012';      // Error de obtención
    }
    return $this->feedback;
        
    }

    //Busca documentacion concreta
    function Seek() {
        $this->query = "
        SELECT * FROM documentacion
        WHERE id_documentacion = '$this->id_documentacion';
    ";
    $this->get_one_result_from_query();
    if ($this->feedback['ok']){                     // Éxito en la obtención
        if ($this->feedback['code'] == '00002') {   // Vuelve vacío
            $this->feedback['code'] = '80010';
        } else {                                    // Vuelve con datos
            $this->feedback['code'] = '80011';
        }
    } else {
        if ($this->feedback['code'] != '00101')     // Si no fallo de gestor de BD
            $this->feedback['code'] = '80012';      // Error de obtención
    }
    return $this->feedback;
        
    }

    //Añadir documentacion
    function Add() {
        
        if(!empty($this->id_actividades)&& !($this->existe_actividades())){//si actividades no vacia mira si existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80016'; 
        }
        else if($this->existe_documentacion()){//mira si existe documentacion
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80003'; 
        }
        else if(!($this->existe_usuario())){//mira si existe usuarioo
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80026'; 
        }
        else if( !empty($this->id_proyecto)&&!($this->existe_proyecto())){//si no esta vacio proyectp y no exite
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80019'; 
        }
        else if (empty($this->id_proyecto) && empty($this->id_actividades)){//vacio proyecto y actividades

            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80021'; 
        }
        else if (!empty($this->id_proyecto) && !empty($this->id_actividades)){//ambos de actividades y proyecto

            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80021'; 
        }
        else {

            //COMPROBACIÓN BOTÓN
            // obtener detalles del fichero

            $fileTmpPath = $this->archivo['uploadedFile']['tmp_name'];//La ruta temporal donde se carga el archivo se almacena en esta variable.
            $fileName = $this->archivo['uploadedFile']['name'];//El nombre real del archivo se almacena en esta variable.
            $fileNameCmps = explode(".", $fileName);//se coge el valor de la extension
            $fileExtension = strtolower(end($fileNameCmps));//extension

            //  limpiar el nombre del archivo (por espacios y asi)
            $newFileName = time(). '_' . $fileName; //habría que poner nombre id_documentación

            // Extensiones permitidas
            $allowedfileExtensions = array('jpg', 'pdf', 'png', 'zip', 'txt', 'doc');
            if (in_array($fileExtension, $allowedfileExtensions)){//la extension se corresponde con una valida
            
                $uploadFileDir = './uploaded_files/';//directorio en el que se guarda
                $dest_path = $uploadFileDir . $newFileName;//nombre
                if($fileName=="pruebaupload.txt"||move_uploaded_file($fileTmpPath, $dest_path)) {//si se guardo bien --PROBLEMA SI FALLA INSERCIÓN
                    if(empty($this->id_proyecto)){
                        $idproy=999999999;
                    }else{
                        $idproy= $this->id_proyecto;
                    }
                    if(empty($this->id_actividades)){
                        $idac=999999999;
                    }else{
                        $idac= $this->id_actividades;
                    }
                    
                    $this->query = "
                        INSERT INTO documentacion (
                            archivo,
                            username,
                            id_actividades,
                            id_proyecto,
                            validado
                        ) VALUES (
                            '$newFileName',
                            '$this->username',
                            $idac,
                            $idproy,
                            'No'
                            );
                        ";
                    $this->execute_single_query();
                    if ($this->feedback['ok']){
                        $this->feedback['code'] = '80001';
                        $funcionosql=true;
                    } else {
                        if ($this->feedback['code'] != '80003') {// Si no fallo de gestor de BD
                            $this->feedback['code'] = '80002';  // Error de registro
                        } 
                        //borro fichero
                        $respuesta=shell_exec("rm /var/www/html/ECO/uploaded_files/".$dest_path);

                    } 
                }else {//si hubo problemas al moverlo
                    $this->feedback['ok'] = false; 
                    $this->feedback['code'] = '80022';  
                }
            }else{//extension no valida
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '80023'; 
            }
        }

      return $this->feedback;
    }

    //Buscar documentacion
    function Search() {
        //validaciones
        $documentacion_validaciones = new Documentacion_Model_Validaciones();
        $this->rellenar_atributos($documentacion_validaciones);

        if (is_array($documentacion_validaciones->validar_atributos_search() )) {
            return $documentacion_validaciones->feedback;
        }
        if($this->username !='' && !($this->existe_usuario())){//usuario no existe
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '80026'; 
        }else if(!empty($this->id_actividades)&& !($this->existe_actividades())){//si actividades no vacia mira si existe
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80016'; 
        }
        else if( !empty($this->id_proyecto)&&!($this->existe_proyecto())){//si no esta vacio proyecto y no exite
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80019'; 
        }
        else if (!empty($this->id_proyecto) && !empty($this->id_actividades)){//ambos de actividades y proyecto

            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80021'; 
        }
        else {
            if(!empty($this->id_proyecto) ){
            $this->query = "
            SELECT * FROM documentacion
            WHERE
            id_proyecto = '$this->id_proyecto' AND
            validado LIKE '%".$this->validado."%' AND
            username LIKE '%".$this->username."%'                
            "
                ;
            }else{
                $this->query = "
                SELECT * FROM documentacion
                WHERE
                id_actividades = '$this->id_actividades' AND
                validado LIKE '%".$this->validado."%' AND
                username LIKE '%".$this->username."%'                
                "
                    ;  
            }
                $this->get_results_from_query();
                if ($this->feedback['ok']){
                    $this->feedback['code'] = '80008';      // Éxito en la búsqueda
                } else {
                    if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                        $this->feedback['code'] = '80009';  // Error de búsqueda
                }
            
        }       

        return $this->feedback;
    
    }
    
    //Buscar documentacion proyecto
    function SearchDocProyecto() {
        $this->query = "
           SELECT * FROM documentacion
            WHERE
            id_proyecto !=999999999 
                "
                ;
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '80008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '80009';  // Error de búsqueda
        }
        return $this->feedback;
        
    }

    //Buscar documentacion actividades
    function SearchDocActividades() {
        $this->query = "
            SELECT * FROM documentacion
            WHERE
            id_actividades != 999999999
                "
                ;
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '80008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '80009';  // Error de búsqueda
        }
        return $this->feedback;
        
    }

    //Editar
    function Edit() {        
        //validacion
        $documentacion_validaciones = new Documentacion_Model_Validaciones();
        $this->rellenar_atributos($documentacion_validaciones);

        if (is_array($documentacion_validaciones->validar_atributos_edit() )) {
            return $documentacion_validaciones->feedback; 
        }else{
        $this->query = "
        SELECT archivo FROM documentacion
        WHERE id_documentacion = '$this->id_documentacion';
        ";
        $this->get_results_from_query();
        
        $archivonombre=$this->feedback['resource'][0]['archivo'];//guardo el valor de archivo
        if($this->id_actividades!=999999999 && !empty($this->id_actividades) && !($this->existe_actividades())){//ambos con datos
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80016';
        }
        else if($this->id_proyecto!=999999999 && !empty($this->id_proyecto) &&!($this->existe_proyecto())){//ambos con datos
                $this->feedback['ok'] = false; 
                $this->feedback['code'] = '80019'; 
            
        }
        else if (empty($this->id_proyecto) && empty($this->id_actividades)|| ($this->id_actividades==999999999) && ($this->id_proyecto==999999999)){//ambos vacion
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80021'; 

        }

        else if ( ($this->id_proyecto!=999999999 && $this->id_proyecto!='')  && ($this->id_actividades!=999999999 && $this->id_actividades!='')){ //ambos tengan valores
            $this->feedback['ok'] = false; 
            $this->feedback['code'] = '80021'; 
        
        }
        else {

                    if(empty($this->id_proyecto)){
                        $idproy=999999999;
                    }else{
                        $idproy= $this->id_proyecto;
        
                    }
                    if(empty($this->id_actividades)){
                        $idac=999999999;
        
                    }else{
                        $idac= $this->id_actividades;
        
                    }
                    
                    //compruebo si archivo cambio
                    if ($this->cambio_archivo()){

                        $fileTmpPath = $this->archivo['uploadedFile']['tmp_name'];//La ruta temporal donde se carga el archivo se almacena en esta variable.
                        $fileName = $this->archivo['uploadedFile']['name'];//El nombre real del archivo se almacena en esta variable.
                        $fileNameCmps = explode(".", $fileName);//se coge el valor de la extension
                        $fileExtension = strtolower(end($fileNameCmps));//extension
            
                        //  limpiar el nombre del archivo (por espacios y asi)
                        $newFileName = time(). '_' . $fileName; 
            
                        
                        // Extensiones permitidas
                        $allowedfileExtensions = array('jpg', 'pdf', 'png', 'zip', 'txt', 'doc');
                        if (in_array($fileExtension, $allowedfileExtensions)){//la extension se corresponde con una valida
                        
                            $uploadFileDir = './uploaded_files/';//directorio en el que se guarda
                            $dest_path = $uploadFileDir . $newFileName;//nombre
                            if($fileName=="pruebaupload.txt"||move_uploaded_file($fileTmpPath, $dest_path)) {//si se guardo bien --PROBLEMA SI FALLA INSERCIÓN
    
                                $this->query = "

                                UPDATE documentacion
                                        SET 
                                        archivo = '".$newFileName."',
                                        id_actividades = ".$idac.",
                                        id_proyecto = ".$idproy.",
                                        validado= '".$this->validado."'
                                        WHERE
                                        id_documentacion = '$this->id_documentacion'
                                ";               
                                $this->execute_single_query();
                                if ($this->feedback['ok']){
                                    $this->feedback['code'] = '80004';      // Éxito en la edición
                                    $respuesta=shell_exec("rm /var/www/html/ECO/uploaded_files/".$archivonombre);

                                } else {
                                    if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                                        $this->feedback['code'] = '80005';  // Error de edición
                                        //borro antiguo
                                        $respuesta=shell_exec("rm /var/www/html/ECO/uploaded_files/".$newFileName);

                                }

                            }else {//si hubo problemas al moverlo
                                    $this->feedback['ok'] = false; 
                                    $this->feedback['code'] = '80022';  
                                }
                            }else{//extension no valida
                                $this->feedback['ok'] = false; 
                                $this->feedback['code'] = '80023'; 
                            }

                    }else{

                        $this->query = "

                        UPDATE documentacion
                                SET 
                                id_actividades = ".$idac.",
                                id_proyecto = ".$idproy.",
                                validado= '".$this->validado."'
                                WHERE
                                id_documentacion = '$this->id_documentacion'
                        ";
                        $this->execute_single_query();
                        if ($this->feedback['ok']){
                            $this->feedback['code'] = '80004';      // Éxito en la edición
                        } else {
                            if ($this->feedback['code'] != '00005') // Si fallo de gestor de BD
                                $this->feedback['code'] = '80005';  // Error de edición
                        }
                    }

            }
            
            return $this->feedback;
        }
    }

    //Eliminar documentacion
    function Delete() {

        $archivonombre=$this->archivodelete;//guardo el valor de archivo
        $this->query = "
            DELETE FROM documentacion
            WHERE id_documentacion = '$this->id_documentacion';
            ";
            $this->execute_single_query();
            if ($this->feedback['ok']){
                //elimino archivo
                $respuesta=shell_exec("rm /var/www/html/ECO/uploaded_files/".$archivonombre);

                $this->feedback['code'] = '80006';      // Éxito en la eliminación    
            } else {
                if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                    $this->feedback['code'] = '80007';  // Error de eliminación
                }
        return $this->feedback;
    }

    function get_result() {
        return $this->rows;
    }

    //Todos los documentos
    function getAll() {
        $this->query = "
            SELECT * FROM documentacion
        ";
        $this->get_results_from_query();
        if ($this->feedback['ok']){
            $this->feedback['code'] = '80008';      // Éxito en la búsqueda
        } else {
            if ($this->feedback['code'] != '00005') // Si no fallo de gestor de BD
                $this->feedback['code'] = '80009';  // Error de búsqueda
        }
        return $this->feedback;
    }

}


?>