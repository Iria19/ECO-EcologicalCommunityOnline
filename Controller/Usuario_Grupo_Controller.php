<?php
include './Controller/_Default_Controller.php';

//Controlador para usuario grupo
class Usuario_Grupo extends _Default{

    function __construct() {
        parent::__construct();      
        include './View/Message_View.php';
        include './Model/Usuario_Grupo_Model.php';
    }

    //Formulario de añadir un usuario a un grupo
    function addForm() {

            $usuario = new Usuario_Model();
            $feedback = $usuario->getAll();
            if ($feedback['ok']) {
                include './Model/Grupo_Model.php';
                $grupo = new Grupo_Model();
                $feedbackdos = $grupo->Seek();
                if ($feedbackdos['ok']) {
                    include './View/Usuario_Grupo_Add_View.php';//Incluyo la vista de añadir grupo
                    new Usuario_Grupo_Add($feedback['resource'],$feedbackdos['resource']);
                } else {
                    new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
                }
            } else {
                new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            }
       
    }

    //Formulario de buscar
    function searchForm() {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll();//todos los usuarios
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->Seek();//busco grupo
            if ($feedbackdos['ok']) {
                include './View/Usuario_Grupo_Search_View.php';//Incluyo la vista de añadir grupo
                new Usuario_Grupo_Search($feedback['resource'],$feedbackdos['resource']);//Creo vista con todos los usuarios y el grupo
            } else {
                new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
        }
    }


    //Añadir usuario al grupo
    function add() {
        $usuariogrupo = new Usuario_Grupo_Model();//Llamo al model
        $feedback = $usuariogrupo->Add();//Llamo al método añadir
        new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
    }


    //Formulario de editar
    function editForm() {

        $usuariogrupo = new Usuario_Grupo_Model();

        $feedback = $usuariogrupo->Seek();//usuario grupo
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
                $grupo = new Grupo_Model();
                $feedbackdos = $grupo->Seek();//grupo
                if ($feedbackdos['ok']) {
                   include './View/Usuario_Grupo_Edit_View.php';
                  new Usuario_Grupo_Edit($usuariogrupo->get_result(),$feedbackdos['resource']);//creo vista de usuariogrupo y grupo
            } else {
                new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            }
        } else {
        new Message($feedback['code'], 'Grupo', 'showAll');//Mensaje de showAll
            
        }
    }

    //Editar usuario grupo
    function edit() {
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $usuariogrupo->Edit();//edito

         new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
        
    }

    //Formulario de editar
    function deleteForm() {
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $usuariogrupo->Seek();//busco usuario grupo
        if ($feedback['ok']) {
            include './View/Usuario_Grupo_Delete_View.php';
            new Usuario_Grupo_Delete($usuariogrupo->get_result());//vista pasandole usuario grupo
        } else {
        new Message($feedback['code'], 'Grupo', 'showAll');//Mensaje de showAll
            
        }
    }

    //Elimino
    function delete() {
        $usuariogrupo = new Usuario_Grupo_Model();
        $usuariogrupo->Seek();//bucar
        $feedback = $usuariogrupo->Delete();//borrar
        new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            
        
    }

    //Buscar
    function search() {
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $usuariogrupo->Search();//usuarios
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->Seek();//grupo
            if ($feedbackdos['ok']) {//para el responsable
                $usuariogrupodos = new Usuario_Grupo_Model();
                $existe = $usuariogrupodos->existe_usuariogrupologeado();
                include './View/Usuario_Grupo_List_View.php';
                new Usuario_Grupo_List($feedback['resource'],$feedbackdos['resource'],$existe);//le paso los usuarios en el grupo,grupos y los usuarios 

            } else {
                new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Usuario_Grupo', 'showAll');
        }
    }

    //Ver todos
    function showAll() {
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $usuariogrupo->Search();
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model();
            $feedbackdos = $grupo->Seek();//grupos
            if ($feedbackdos['ok']) {//para el responsable busco responsables
                $usuariogrupodos = new Usuario_Grupo_Model();
                $existe = $usuariogrupodos->existe_usuariogrupologeado();//existe ya el usuario en ese grupo
                include './View/Usuario_Grupo_List_View.php';
                new Usuario_Grupo_List($feedback['resource'],$feedbackdos['resource'],$existe);//le paso los usuarios en el grupo,grupos y los usuarios 
            } else {
                new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Usuario_Grupo', 'showAll');//Mensaje de showAll
        }
    }
}

?>