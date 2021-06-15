<?php
include './Controller/_Default_Controller.php';

//Controlador de las actividades
class Actividad extends _Default
{

    function __construct()
    {
        parent::__construct();

        include './View/Message_View.php';
        include './Model/Actividad_Model.php';
    }

    //Formularios de añadir una actividad
    function addForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //cojo todos los usuarios
        if ($feedback['ok']) { //no da error
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->getAll(); //cojo todos los grupos
            if ($feedbackdos['ok']) { //no da error
                include './View/Actividad_Add_View.php'; //Incluyo la vista de añadir grupo
                new Actividad_Add($feedback['resource'], $feedbackdos['resource']); //Creo vista pasandole usuarios y grupos
            } else {
                new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
        }
    }

    //Funcion con formulario de buscar
    function searchForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //cojo todos usuarios
        if ($feedback['ok']) { //no da error
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->getAll(); //cojo todos grupos
            if ($feedbackdos['ok']) { //no da error
                include './View/Actividad_Search_View.php'; //Importo vista de search
                new Actividad_Search($feedback['resource'], $feedbackdos['resource']); //Creo vista pasandole usuarios y grupos
            } else {
                new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
        }
    }

    //Ver actividad
    function currentForm()
    {

        $actividad = new Actividad_Model();
        $feedback = $actividad->Seek(); //busco para esa actividad concreta sus datos

        if ($feedback['ok']) { //no da error
            include './View/Actividad_Current_View.php';
            new Actividad_Current($actividad->get_result()); //vista pasandole la actividad

        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll

        }
    }

    //Funcion añadir actividad
    function add()
    {
        $actividad = new Actividad_Model(); //Llamo al model
        $feedback = $actividad->Add(); //Llamo al método añadir
        new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
    }

    //Funcion edit form
    function editForm()
    {
        $actividad = new Actividad_Model();

        $feedback = $actividad->Seek(); //busco actividad en concreto
        if ($feedback['ok']) { //no da error
            $usuario = new Usuario_Model();
            $feedback = $usuario->getAll(); //todos usuarios
            if ($feedback['ok']) { //no da error
                include './Model/Grupo_Model.php';
                $grupo = new Grupo_Model();
                $feedbackdos = $grupo->getAll(); //todos grupos
                if ($feedbackdos['ok']) {
                    include './View/Actividad_Edit_View.php';
                    new Actividad_Edit($feedback['resource'], $feedbackdos['resource'], $actividad->get_result()); //vista pasandole actividad,usuarios y grupos
                } else {
                    new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
                }
            } else {
                new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll

        }
    }

    //Funcion editar actividad
    function edit()
    {
        $actividad = new Actividad_Model();
        $feedback = $actividad->Edit(); //edito

        new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll

    }

    //Funcion eliminar actividad form
    function deleteForm()
    {
        $actividad = new Actividad_Model();
        $feedback = $actividad->Seek(); //busco para actividad concreta
        if ($feedback['ok']) { //no da error
            include './View/Actividad_Delete_View.php';
            new Actividad_Delete($actividad->get_result()); //vista pasandole la actividad
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll

        }
    }
    //Funcion eliminar actividad
    function delete()
    {
        $actividad = new Actividad_Model();
        $actividad->Seek(); //busco actividad concreta
        $feedback = $actividad->Delete(); //elimino
        new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll


    }

    //Funcion buscar actividad
    function search()
    {
        $actividad = new Actividad_Model();
        $feedback = $actividad->Search(); //busco
        if ($feedback['ok']) { //no da error
            include './View/Actividad_List_View.php';
            new Actividad_List($actividad->get_result()); //vista pasandole las actividades
        } else {
            new Message($feedback['code'], 'Actividad', 'showAll');
        }
    }

    //Funcion mustrar todas actividades
    function showAll()
    {
        $actividad = new Actividad_Model();
        $feedback = $actividad->Search(); //busco
        if ($feedback['ok']) { //no da error
            include './View/Actividad_List_View.php';
            new Actividad_List($actividad->get_result()); //vista pasandole las actividades
        } else {

            new Message($feedback['code'], 'Actividad', 'showAll'); //Mensaje de showAll
        }
    }
}
