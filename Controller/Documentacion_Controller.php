<?php
include './Controller/_Default_Controller.php';

//Controlador de documentacion
class Documentacion extends _Default
{

    function __construct()
    {
        parent::__construct();

        include './View/Message_View.php';
        include './Model/Documentacion_Model.php';
    }

    //Añadir documentacion form
    function addForm()
    {
        include './Model/Actividades_Model.php';
        $actividades = new Actividades_Model();
        $feedback = $actividades->getAllUser(); //cojo actividades del usuario
        if ($feedback['ok']) {
            include './Model/Proyecto_Model.php';
            $proyecto = new Proyecto_Model();
            $proyectos = $proyecto->getAllUsers(); //cojo proyectos del usuario
            include './View/Documentacion_Add_View.php'; //Incluyo la vista de añadir documentacion
            new Documentacion_Add($feedback['resource'], $proyectos); //Creo vista pasandole actividades y proyectos del usuario
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
        }
    }

    //Buscar documentacion form
    function searchForm()
    {
        include './Model/Actividades_Model.php';
        $actividades = new Actividades_Model();
        $feedback = $actividades->getAll(); //cojo todas actividades
        if ($feedback['ok']) {
            include './Model/Proyecto_Model.php';
            $proyecto = new Proyecto_Model();
            $feedbackdos = $proyecto->getAll(); //cojo todos proyectos
            if ($feedbackdos['ok']) {
                $usuario = new Usuario_Model();
                $feedbacktres = $usuario->getAll(); //cojo todos usuarios
                if ($feedbacktres['ok']) {
                    include './View/Documentacion_Search_View.php'; //Importo vista de search
                    new Documentacion_Search($feedback['resource'], $feedbackdos['resource'], $feedbacktres['resource']); //Creo vista pasandoles usuarios,proyectos y actividades
                } else {
                    new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
                }
            } else {
                new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
        }
    }

    //Ver documentacion
    function currentForm()
    {

        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->Seek(); //busco documento
        if ($feedback['ok']) {
            include './View/Documentacion_Current_View.php';
            new Documentacion_Current($documentacion->get_result()); //creo vista pasandole documento
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll

        }
    }

    //Añadir documentacion
    function add()
    {
        $documentacion = new Documentacion_Model(); //Llamo al model
        $feedback = $documentacion->Add(); //Llamo al método añadir
        new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
    }

    //Editar documentacion form
    function editForm()
    {
        $documentacion = new Documentacion_Model();

        $feedback = $documentacion->Seek(); //busco documento
        if ($feedback['ok']) {
            include './Model/Actividades_Model.php';
            $actividades = new Actividades_Model();
            $feedback = $actividades->getAllUser(); //cojo actividades del usuario
            if ($feedback['ok']) {

                $actividadesdos = new Actividades_Model();
                $feedbackactiadmin = $actividadesdos->getAll(); //cojo actividades del usuario
                if ($feedbackactiadmin['ok']) {
                    include './Model/Proyecto_Model.php';
                    $proyectos = new Proyecto_Model();
                    $proyectos = $proyectos->getAllUsers(); //busco proyectos
                    
                    $proyectosdos = new Proyecto_Model();
                    $feedbackaproyadmin = $proyectosdos->getAll(); //busco proyectos
                    if ($feedbackaproyadmin['ok']) {

                        include './View/Documentacion_Edit_View.php';
                        new Documentacion_Edit($feedback['resource'], $proyectos, $documentacion->get_result(),$feedbackactiadmin['resource'],$feedbackaproyadmin['resource']); //creo vista pasandole documento,proyectos y actividades
                        
                    } else {
                        new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
                    }
                } else {
                    new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
                }
                
            } else {
                new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll

        }
    }

    //Editar documentacion
    function edit()
    {
        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->Edit();
        new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll    
    }

    //Eliminar documentacion form
    function deleteForm()
    {
        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->Seek(); //busco documento
        if ($feedback['ok']) {
            include './View/Documentacion_Delete_View.php';
            new Documentacion_Delete($documentacion->get_result()); //creo vista pasandole documento
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll

        }
    }

    //Eliminar documentacion
    function delete()
    {
        $documentacion = new Documentacion_Model();
        $documentacion->Seek();
        $feedback = $documentacion->Delete();
        new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll   
    }

    //Buscar documentacion
    function search()
    {
        include './Model/Proyecto_Model.php';
        include './Model/Actividad_Model.php';
        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->Search();

        if ($feedback['ok']) {
            //cojo responsables
            //proyecto
            $idproyectoresponsable = array();
            $idresponsableproyecto = array();
            //actividad
            $idresponsableactividad = array();
            if ($feedback['resource'] != '') {
                foreach ($feedback['resource'] as $documentos) {
                    //proyecto
                    $idproyecto = $documentos['id_proyecto'];
                    $proyecto = new Proyecto_Model();
                    $arrayresponsable = $proyecto->ResponsableProyecto($idproyecto); //responsable proyecto
                    if (!empty($arrayresponsable['resource'])) { //si no esta vacio
                        $responsable = ($arrayresponsable['resource'][0]['responsable_proyecto']);
                        $id = ($arrayresponsable['resource'][0]['id_proyecto']);
                        $idresponsableproyecto = array($id => $responsable);
                        array_push($idproyectoresponsable, $idresponsableproyecto);
                    }
                    //actividad
                    $idactividades = $documentos['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsables actividad
                    if (!empty($arrayresponsableactividad)) {
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Documentacion_List_View.php';
            new Documentacion_List($documentacion->get_result(), $idproyectoresponsable, $idresponsableactividad); //paso documenacion,responsabla proyecto y actividad
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll');
        }
    }

    //Ver documentacion proyecto
    function searchProyecto()
    {
        include './Model/Proyecto_Model.php';
        include './Model/Actividad_Model.php';

        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->SearchDocProyecto(); //busco de proyectos
        if ($feedback['ok']) {
            //cojo responsables
            //proyecto
            $idproyectoresponsable = array();
            $idresponsableproyecto = array();
            //actividad
            $idresponsableactividad = array();
            if ($feedback['resource'] != '') {

                foreach ($feedback['resource'] as $documentos) {
                    //proyecto
                    $idproyecto = $documentos['id_proyecto'];
                    $proyecto = new Proyecto_Model();
                    $arrayresponsable = $proyecto->ResponsableProyecto($idproyecto); //responsables proyecto
                    if (!empty($arrayresponsable['resource'])) {
                        $responsable = ($arrayresponsable['resource'][0]['responsable_proyecto']);
                        $id = ($arrayresponsable['resource'][0]['id_proyecto']);
                        $idresponsableproyecto = array($id => $responsable);
                        array_push($idproyectoresponsable, $idresponsableproyecto);
                    }
                    //actividad
                    $idactividades = $documentos['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsables actividad
                    if (!empty($arrayresponsableactividad)) {
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Documentacion_List_View.php';
            new Documentacion_List($documentacion->get_result(), $idproyectoresponsable, $idresponsableactividad); //paso documenacion,responsabla proyecto y actividad
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll');
        }
    }

    //Ver documentacion actividad
    function searchActividad()
    {
        include './Model/Proyecto_Model.php';
        include './Model/Actividad_Model.php';

        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->SearchDocActividades(); //busco de actividades

        if ($feedback['ok']) {
            //responsables
            //proyecto
            $idproyectoresponsable = array();
            $idresponsableproyecto = array();
            //actividad
            $idresponsableactividad = array();
            if ($feedback['resource'] != '') {

                foreach ($feedback['resource'] as $documentos) {
                    //proyecto
                    $idproyecto = $documentos['id_proyecto'];
                    $proyecto = new Proyecto_Model();
                    $arrayresponsable = $proyecto->ResponsableProyecto($idproyecto); //responsable proyecto
                    if (!empty($arrayresponsable['resource'])) {
                        $responsable = ($arrayresponsable['resource'][0]['responsable_proyecto']);
                        $id = ($arrayresponsable['resource'][0]['id_proyecto']);
                        $idresponsableproyecto = array($id => $responsable);
                        array_push($idproyectoresponsable, $idresponsableproyecto);
                    }
                    //actividad
                    $idactividades = $documentos['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsable actividad
                    if (!empty($arrayresponsableactividad)) {
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Documentacion_List_View.php';
            new Documentacion_List($documentacion->get_result(), $idproyectoresponsable, $idresponsableactividad); //paso documenacion,responsabla proyecto y actividad
        } else {
            new Message($feedback['code'], 'Documentacion', 'showAll');
        }
    }

    //Ver toda documentacion
    function showAll()
    {
        include './Model/Proyecto_Model.php';
        include './Model/Actividad_Model.php';

        $documentacion = new Documentacion_Model();
        $feedback = $documentacion->Search(); //busco

        if ($feedback['ok']) {
            //responsables
            //proyecto
            $idproyectoresponsable = array();
            $idresponsableproyecto = array();
            //actividad
            $idresponsableactividad = array();
            if ($feedback['resource'] != '') {

                foreach ($feedback['resource'] as $documentos) {
                    //proyecto
                    $idproyecto = $documentos['id_proyecto'];
                    $proyecto = new Proyecto_Model();
                    $arrayresponsable = $proyecto->ResponsableProyecto($idproyecto); //responsable proyecto
                    if (!empty($arrayresponsable['resource'])) {
                        $responsable = ($arrayresponsable['resource'][0]['responsable_proyecto']);
                        $id = ($arrayresponsable['resource'][0]['id_proyecto']);
                        $idresponsableproyecto = array($id => $responsable);
                        array_push($idproyectoresponsable, $idresponsableproyecto);
                    }
                    //actividad
                    $idactividades = $documentos['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsable actividad

                    if (!empty($arrayresponsableactividad)) {
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Documentacion_List_View.php';
            new Documentacion_List($documentacion->get_result(), $idproyectoresponsable, $idresponsableactividad); //paso documenacion,responsabla proyecto y actividad
        } else {

            new Message($feedback['code'], 'Documentacion', 'showAll'); //Mensaje de showAll
        }
    }
}
