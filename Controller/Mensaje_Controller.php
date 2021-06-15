<?php
include './Controller/_Default_Controller.php';

class Mensaje extends _Default
{
    function __construct()
    {
        parent::__construct();
        include './View/Message_View.php';
    }

    function _default()
    {
        $this->showAll();
    }
    //Form añadir mensaje
    function addForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //usuarios
        if ($feedback['ok']) {
            include './Model/Grupo_Model.php';
            $grupo = new Grupo_Model(); //grupos
            $feedbackdos = $grupo->GruposesResponsable(); //grupos es responsable
            if ($feedbackdos['ok']) {
                include './Model/Actividad_Model.php';
                $actividad = new Actividad_Model();
                $feedbacktres = $actividad->ActividadResponsable(); //actividades es responsable
                if ($feedbacktres['ok']) {
                    include './View/Mensaje_Add_View.php'; //Incluyo la vista de añadir grupo
                    new Mensaje_Add($feedback['resource'], $feedbackdos['resource'], $feedbacktres['resource']); //Creo vista pasando usuarios,grupos es responsable usuario, actividades es responsable
                } else {
                    new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
                }
            } else {
                new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
            }
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
        }
    }

    //Ver mensaje
    function currentForm()
    {
        $mensaje = new Mensaje_Model();
        $feedback = $mensaje->Seek(); //busco mensaje concreto
        if ($feedback['ok']) {
            //cambiar leido a Si 
            $mensaje->MensajeLeido();
            include './View/Mensaje_Current_View.php';
            new Mensaje_Current($mensaje->get_result()); //creo vista pasandole mensaje
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll

        }
    }

    //Ver mensaje si es admin
    function currentFormAdmin()
    {
        $mensaje = new Mensaje_Model();
        $feedback = $mensaje->Seek(); //busco mensaje concreto
        if ($feedback['ok']) {
            include './View/Mensaje_Current_View.php';
            new Mensaje_Current($mensaje->get_result()); //creo vista pasandole mensaje
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll

        }
    }
    //Añadir mensaje
    function add()
    {
        $mensaje = new Mensaje_Model(); //Llamo al model
        if (!empty($_POST['id_grupo']) || !empty($_POST['id_actividad'])) { //id grupo y id actividad no vacio
            if (!empty($_POST['id_grupo'])) { //grupo no vacio
                include './Model/Usuario_Grupo_Model.php';
                $usuariogrupo = new Usuario_Grupo_Model();
                $feedbackgrupo = $usuariogrupo->Searchusuarios(); //busco usuarios grupo
                $usernamesarray = array();
                if ($feedbackgrupo['ok']) {
                    if ($feedbackgrupo['resource'] != '') { //si hay usuarios
                        //para cada usuario le envio un mensaje
                        for ($i = 0; $i < sizeof($feedbackgrupo['resource']); $i++) {
                            $user = $feedbackgrupo['resource'][$i]['username'];
                            array_push($usernamesarray, $user);
                        }
                        foreach ($usernamesarray as $usernameindividual) {
                            $feedbackgrupo = $mensaje->AddAdmin($usernameindividual);
                        }
                    }
                    new Message($feedbackgrupo['code'], 'Mensaje', 'showAll');
                }
            } else if (!empty($_POST['id_actividad'])) { //actividad no vacia
                include './Model/Actividades_Model.php';
                $usuarioactividades = new Actividades_Model();
                $feedbackactividad = $usuarioactividades->Searchusuariosactividades(); //busco usuarios realizases actividades de esa actividad
                $usernamesarrayactividades = array();
                if ($feedbackactividad['ok']) {
                    if ($feedbackgrupo['resource'] != '') { //hay usuarios que realizaron actividad
                        //envio mensaje a todos usuarios
                        for ($i = 0; $i < sizeof($feedbackactividad['resource']); $i++) {
                            $userActividad = $feedbackactividad['resource'][$i]['username'];
                            array_push($usernamesarrayactividades, $userActividad);
                        }
                        foreach ($usernamesarrayactividades as $usernameindividual) {
                            $feedbackactividad = $mensaje->AddAdmin($usernameindividual);
                        }
                    }
                    new Message($feedbackactividad['code'], 'Mensaje', 'showAll');
                }
            }
        } else {

            if ($_POST['receptor'] == 'todos') { //mensaje a todos los usuarios
                $usuario = new Usuario_Model();
                $feedback = $usuario->getAll();
                $usernamesarray = array();
                if ($feedback['ok']) {
                    for ($i = 0; $i < sizeof($feedback['resource']); $i++) {
                        $user = $feedback['resource'][$i]['username'];
                        array_push($usernamesarray, $user);
                    }

                    foreach ($usernamesarray as $usernameindividual) {
                        $feedback = $mensaje->AddAdmin($usernameindividual);
                    }
                    new Message($feedback['code'], 'Mensaje', 'showAll');
                }
            } else { //mensaje uno a uno
                $feedback = $mensaje->Add(); //Llamo al método añadir
                new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
            }
        }
    }

    //Form de buscar mensaje
    function searchForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->getAll(); //todos los usuarios
        if ($feedback['ok']) {
            include './View/Mensaje_Search_View.php'; //Importo vista de search
            new Mensaje_Search($feedback['resource']); //Creo vista pasandole usuarios
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
        }
    }

    //funcion buscar mensaje
    function search()
    {
        $mensaje = new Mensaje_Model();
        $feedback = $mensaje->Search(); //busco
        if ($feedback['ok']) {
            include './View/Mensaje_List_View.php';
            new Mensaje_List($mensaje->get_result()); //busco mensajes
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll');
        }
    }

    //Form eliminar mensaje
    function deleteForm()
    {
        $mensaje = new Mensaje_Model();
        $feedback = $mensaje->Seek(); //busco mensaje concreto
        if ($feedback['ok']) {
            include './View/Mensaje_Delete_View.php';
            new Mensaje_Delete($mensaje->get_result()); //muestro mensaje
        } else {
            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll

        }
    }

    //Eliminar mensaje
    function delete()
    {
        $mensaje = new Mensaje_Model();
        $mensaje->Seek();
        $feedback = $mensaje->Delete(); //elimino
        new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll    
    }

    //Ver todos mensajes
    function showAll()
    {
        $mensaje = new Mensaje_Model();
        $feedback = $mensaje->Search(); //busco mensajes

        if ($feedback['ok']) {
            include './View/Mensaje_List_View.php';
            new Mensaje_List($mensaje->get_result()); //muestro mensajes
        } else {

            new Message($feedback['code'], 'Mensaje', 'showAll'); //Mensaje de showAll
        }
    }
}
