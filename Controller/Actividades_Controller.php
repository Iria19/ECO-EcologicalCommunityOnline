<?php
include './Controller/_Default_Controller.php';

//Controlador de actividades
class Actividades extends _Default
{

    function __construct()
    {
        parent::__construct();

        include './View/Message_View.php';
        include './Model/Actividades_Model.php';
    }

    //Form añadir actividades
    function addForm()
    {
        include './Model/Actividad_Model.php';
        $actividad = new Actividad_Model();
        $feedback = $actividad->getAll(); //cojo actividad
        if ($feedback['ok']) {
            include './View/Actividades_Add_View.php'; //Incluyo la vista de añadir grupo
            new Actividades_Add($feedback['resource']); //Creo vista con lista de actividad
        } else {
            new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
        }
    }

    //Form buscar actividades
    function searchForm()
    {
        include './Model/Actividad_Model.php';
        $actividad = new Actividad_Model();
        $feedback = $actividad->getAll(); //cojo toda actividad
        if ($feedback['ok']) {
            include './View/Actividades_Search_View.php'; //Importo vista de search
            new Actividades_Search($feedback['resource']); //Creo vista pasandole lista actividad
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
        }
    }

    //Funcion editar actividades
    function add()
    {
        $actividades = new Actividades_Model(); //Llamo al model
        $feedback = $actividades->Add(); //Llamo al método añadir
        new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
    }

    //Form editar actividades
    function editForm()
    {
        $actividades = new Actividades_Model();
        $feedback = $actividades->Seek(); //busco actividades
        if ($feedback['ok']) {
            include './Model/Actividad_Model.php';
            $actividad = new Actividad_Model();
            $feedback = $actividad->Seek(); //busco actividad
            if ($feedback['ok']) {
                include './View/Actividades_Edit_View.php';
                new Actividades_Edit($actividades->get_result(), $feedback['resource']); //vista con actividad y actividades
            } else {
                new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll

        }
    }

    //Funcion editar actividades
    function edit()
    {
        $actividades = new Actividades_Model();
        $feedback = $actividades->Edit();
        new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
    }

    //Form eliminar actividades
    function deleteForm()
    {
        $actividades = new Actividades_Model();
        $feedback = $actividades->Seek(); //busco actividad
        if ($feedback['ok']) {
            include './View/Actividades_Delete_View.php';
            new Actividades_Delete($actividades->get_result()); //paso a la vista actividad
        } else {
            new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll  
        }
    }

    //Eliminar actividades
    function delete()
    {
        $actividades = new Actividades_Model();
        $actividades->Seek();
        $feedback = $actividades->Delete();
        new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll


    }

    //Buscar actividades
    function search()
    {
        include './Model/Actividad_Model.php';
        $actividades = new Actividades_Model();
        $feedback = $actividades->Search(); //busco actividades
        if ($feedback['ok']) {
            //actividad
            $idresponsableactividad = array();
            //responsables
            if ($feedback['resource'] != '') {
                foreach ($feedback['resource'] as $activ) {
                    //actividad
                    $idactividades = $activ['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsable actividad
                    if (!empty($arrayresponsableactividad)) {
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Actividades_List_View.php';
            new Actividades_List($actividades->get_result(), $idresponsableactividad); //paso actividades y responsables
        } else {

            new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
        }
    }

    //Ver todas las actividades
    function showAll()
    {
        include './Model/Actividad_Model.php';
        $actividades = new Actividades_Model();
        $feedback = $actividades->Search();
        if ($feedback['ok']) {
            //actividad
            $idresponsableactividad = array();
            //responsables
            if ($feedback['resource'] != '') {

                foreach ($feedback['resource'] as $activ) {
                    //actividad
                    $idactividades = $activ['id_actividades'];
                    $actividad = new Actividad_Model();
                    $arrayresponsableactividad = $actividad->ResponsableActividad($idactividades); //responsable actividad
                    if (!empty($arrayresponsableactividad)) { //no vacio
                        array_push($idresponsableactividad, $arrayresponsableactividad);
                    }
                }
            }
            include './View/Actividades_List_View.php';
            new Actividades_List($actividades->get_result(), $idresponsableactividad); //paso actividades y responsables
        } else {

            new Message($feedback['code'], 'Actividades', 'showAll'); //Mensaje de showAll
        }
    }
}
