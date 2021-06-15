<?php
include './Controller/_Default_Controller.php';


//Controlador de grupo
class Grupo extends _Default
{

    function __construct()
    {
        parent::__construct();

        include './View/Message_View.php';
        include './Model/Grupo_Model.php';
    }

    function _default()
    {
        $this->showAll();
    }

    //Form añadir grupo
    function addForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //cojemos usuarios
        if ($feedback['ok']) {
            include './View/Grupo_Add_View.php'; //Incluyo la vista de añadir grupo pasandole usuarios
            new Grupo_Add($feedback['resource']); //Creo
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
        }
    }
    //Form buscar grupo
    function searchForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //cojemos usuarios
        if ($feedback['ok']) {
            include './View/Grupo_Search_View.php'; //Importo vista de search
            new Grupo_Search($feedback['resource']); //Creo
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
        }
    }

    //Ver grupo
    function currentForm()
    {

        $grupo = new Grupo_Model();
        $feedback = $grupo->Seek(); //busco grupo concreto
        if ($feedback['ok']) {
            include './Model/Proyecto_Model.php';
            $proyecto = new Proyecto_Model();
            $listaproyecto = $proyecto->seek_existe_grupoproy(); //miro proyecto
            include './View/Grupo_Current_View.php';
            new Grupo_Current($grupo->get_result(), $listaproyecto); //creo visa pasandole grupo y el proyecto
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll

        }
    }

    //Añadir grupo
    function add()
    {
        $grupo = new Grupo_Model(); //Llamo al model
        $feedback = $grupo->Add(); //Llamo al método añadir
        new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
    }

    //Form editar grupo
    function editForm()
    {
        $grupo = new Grupo_Model();
        $feedback = $grupo->Seek(); //cojo grupo concreto
        if ($feedback['ok']) {
            $usuario = new Usuario_Model();
            $feedback = $usuario->getAll(); //cojo usuarios
            if ($feedback['ok']) {
                include './View/Grupo_Edit_View.php';
                new Grupo_Edit($feedback['resource'], $grupo->get_result()); //creo vista pasandole grupo y usuarios
            } else {
                new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll

        }
    }

    //Editar grupo
    function edit()
    {
        $grupo = new Grupo_Model();
        $feedback = $grupo->Edit();
        new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
    }

    //Form eliminar grupo
    function deleteForm()
    {
        $grupo = new Grupo_Model();
        $feedback = $grupo->Seek(); //busco grupo
        if ($feedback['ok']) {
            include './View/Grupo_Delete_View.php';
            new Grupo_Delete($grupo->get_result()); //creo vista pasandole grupo
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll

        }
    }

    //Eliminar grupo
    function delete()
    {
        $grupo = new Grupo_Model();
        $grupo->Seek();
        $feedback = $grupo->Delete();
        new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll  
    }

    //Buscar grupo
    function search()
    {
        $grupo = new Grupo_Model();
        include './Model/Usuario_Grupo_Model.php';
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $grupo->Search(); //busco grupos
        $todosgrupos = array();
        if ($feedback['ok']) {
            for ($i = 0; $i < sizeof($feedback['resource']); $i++) { //recorro todos los grupos
                $idgrupo = $feedback['resource'][$i]['id_grupo'];
                $ecoinsgrupo = $usuariogrupo->totalEcoinsIndGrupo($idgrupo); //busco ecoins del grupo que tengo id
                if ($ecoinsgrupo['resource'][0]["SUM(ecoins)"] == NULL) { //si no tiene le pongo 0
                    $ecoinsgrupo['resource'][0]["SUM(ecoins)"] = 0;
                } else {
                    $ecoinsgrupo['resource'][0]["SUM(ecoins)"] = (int)$ecoinsgrupo['resource'][0]["SUM(ecoins)"];
                }
                array_push($todosgrupos, $ecoinsgrupo['resource'][0]);
            }
            //ordeno
            rsort($todosgrupos);
            include './View/Grupo_List_View.php';
            new Grupo_List($todosgrupos); //creo vista pasandole grupos ordenados
        } else {
            new Message($feedback['code'], 'Grupo', 'showAll');
        }
    }

    //Ver todos los grupos
    function showAll()
    {
        $grupo = new Grupo_Model();
        include './Model/Usuario_Grupo_Model.php';
        $usuariogrupo = new Usuario_Grupo_Model();
        $feedback = $grupo->Search(); //busco grupos
        $todosgrupos = array();
        if ($feedback['ok']) {
            for ($i = 0; $i < sizeof($feedback['resource']); $i++) { //recorro todos los grupos
                $idgrupo = $feedback['resource'][$i]['id_grupo'];
                $ecoinsgrupo = $usuariogrupo->totalEcoinsIndGrupo($idgrupo); //busco ecoins del grupo que tengo id
                if ($ecoinsgrupo['resource'][0]["SUM(ecoins)"] == NULL) {
                    $ecoinsgrupo['resource'][0]["SUM(ecoins)"] = 0; //si no tiene lo pongo 0
                } else {
                    $ecoinsgrupo['resource'][0]["SUM(ecoins)"] = (int)$ecoinsgrupo['resource'][0]["SUM(ecoins)"];
                }
                array_push($todosgrupos, $ecoinsgrupo['resource'][0]);
            }
            rsort($todosgrupos);
            include './View/Grupo_List_View.php';
            new Grupo_List($todosgrupos); //creo vista pasandole grupos ordenados
        } else {

            new Message($feedback['code'], 'Grupo', 'showAll'); //Mensaje de showAll
        }
    }
}
