<?php
include './Controller/_Default_Controller.php';

//Controlador de proyecto
class Proyecto extends _Default{

    function __construct() {
            parent::__construct();      
        include './View/Message_View.php';
        include './Model/Proyecto_Model.php';
    }    

    //Form añadir proyecto
    function addForm() {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll();//cojo todos los usuarios
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->Seek();//cojo todos los grupos
            if ($feedbackdos['ok']) {
                include './View/Proyecto_Add_View.php';//Incluyo la vista de añadir grupo
                new Proyecto_Add($feedback['resource'],$feedbackdos['resource']);//Creo vista pasandole usuarios y grupos
            } else {
                new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
        }
    }

    //Buscar proyecto
    function searchForm() {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll();//cojo todos los usuarios
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->getAll();//cojo todos los grupos
            if ($feedbackdos['ok']) {
                include './View/Proyecto_Search_View.php';//Importo vista de search
                new Proyecto_Search($feedback['resource'],$feedbackdos['resource']);//Creo vista con usuarios y gripos
            } else {
                new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
        }
    }

    //Ver proyecto
    function currentForm() {

        $proyecto = new Proyecto_Model();
        $feedback = $proyecto->Seek();//cojo proyecto

        if ($feedback['ok']) {
                include './View/Proyecto_Current_View.php';
                new Proyecto_Current($proyecto->get_result());//creo vista pasandole el proyecto
            
        } else {
        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            
        }
    }
    
    //Añadir proyecto
    function add() {
        $proyecto = new Proyecto_Model();//Llamo al model
        $feedback = $proyecto->Add();//Llamo al método añadir
        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
    }

    //Form editar proyecto
    function editForm() {
        $proyecto = new Proyecto_Model();

        $feedback = $proyecto->Seek();//cojo proyecto
        if ($feedback['ok']) {
            $usuario = new Usuario_Model();
            $feedback = $usuario->getAll();//cojo todos los usuarios
            if ($feedback['ok']) {

            include './View/Proyecto_Edit_View.php';

            new Proyecto_Edit($feedback['resource'],$proyecto->get_result());//creo vista pasandole proyecto y todos los usuarios
            } else {
                new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            }
        } else {
        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            
        }
    }
    //funcion editar proyecto
    function edit() {
        $proyecto = new Proyecto_Model();
        $feedback = $proyecto->Edit();
         new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
        
    }

    //Form eliminar proyecto
    function deleteForm() {
        $proyecto = new Proyecto_Model();
        $feedback = $proyecto->Seek();//cojo proyecto
        if ($feedback['ok']) {
            include './View/Proyecto_Delete_View.php';
            new Proyecto_Delete($proyecto->get_result());//creo vista pasandole el proyecto
        } else {
        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            
        }
    }

    //Funcion eliminar proyecto
    function delete() {
        $proyecto = new Proyecto_Model();
        $proyecto->Seek();
        $feedback = $proyecto->Delete();
        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
            
        
    }

    //Funcion buscar proyecto
    function search() {
        $proyecto = new Proyecto_Model();
        $feedback = $proyecto->Search();//busco proyectos
        if ($feedback['ok']) {
            include './View/Proyecto_List_View.php';
            new Proyecto_List($proyecto->get_result());//creo vista pasandole los proyectos
        } else {
            new Message($feedback['code'], 'Proyecto', 'showAll');
        }
    }
    //Mostrar todos proyecto
    function showAll() {
        $proyecto = new Proyecto_Model();
        $feedback = $proyecto->Search();//busco proyectos
        if ($feedback['ok']) {
            include './View/Proyecto_List_View.php';
            new Proyecto_List($proyecto->get_result());//creo vista pasandole los proyectos
        } else {

        new Message($feedback['code'], 'Proyecto', 'showAll');//Mensaje de showAll
        }
    }
}

?>