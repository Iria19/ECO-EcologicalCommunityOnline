
<?php
include './Controller/_Default_Controller.php';

//Controlador de usuario
class Usuario extends _Default
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

    //Form añadir usuario
    function addForm()
    {
        include './View/Usuario_Add_View.php'; //Incluyo la vista de añadir usuario
        new Usuario_Add(); //Creo vista
    }

    //Form buscar usuario
    function searchForm()
    {
        include './View/Usuario_Search_View.php'; //Importo vista de search
        new Usuario_Search(); //vista
    }

    //Ver usuario
    function currentForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Seek(); //busco usuario concreto
        if ($feedback['ok']) { //no da error
            $usuariogrupo = new Usuario_Model();
            $ecoinsgrupo = $usuariogrupo->totalEcoinsGrupos($feedback['resource']['username']); //ecoins de usuario en grupo
            $usuarioactividades = new Usuario_Model();
            $ecoinsactividades = $usuarioactividades->totalEcoinsActividades($feedback['resource']['username']);   //ecoins de ese usuario en actividades
            $usuariototal = new Usuario_Model();
            $ecoinsusuariototal = $usuariototal->totaldeEcoins($feedback['resource']['username']);  //ecoins totales del usuario 
            include './View/Usuario_Current_View.php';
            new Usuario_Current($usuario->get_result(), $ecoinsgrupo, $ecoinsactividades, $ecoinsusuariototal);
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll
        }
    }

    //Funcion añadir usuario
    function add()
    {
        $usuario = new Usuario_Model(); //Llamo al model
        $feedback = $usuario->Add(); //Llamo al método añadir
        new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll
    }

    //Form editar usuario
    function EditForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Seek(); //busco usuario concreto
        if ($feedback['ok']) {
            include './View/Usuario_Edit_View.php';
            new Usuario_Edit($usuario->get_result());
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll

        }
    }
    //Funcion editar usuario
    function edit()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Edit(); //edito

        new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll

    }
    //Form editar usuario
    function deleteForm()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Seek(); //busco el usuario
        if ($feedback['ok']) {
            include './View/Usuario_Delete_View.php';
            new Usuario_Delete($usuario->get_result()); //a la vista le paso el usuario
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll

        }
    }

    //Eliminar usuario
    function delete()
    {
        $usuario = new Usuario_Model();
        $feed=$usuario->Seek(); //busco usuario
        $feedback = $usuario->Delete(); //lo elimino
        if ($feed['resource']['username'] == $_SESSION['username']) { //si el usuario eliminado es el mismo se cierra sesion
            session_destroy(); //cierro sesion
            new Message($feedback['code'], 'Login', 'formulariologin'); //login
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll');//Mensaje de showAll

        }
    }

    //Buscar usuario
    function search()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Search(); //busco usuarios
        if ($feedback['ok']) { //no da error
            $totalecoins = array();
            //recorro usuarios y creo array [username]=>[ecoinstotal]
            if ($usuario->get_result() != '') { //si no es vacio
                //para cada usuario cojo sus ecoins y la guardo en ['Ecoins'] y esto lo meto en array
                foreach ($usuario->get_result() as $Usuario) {
                    $ecoinsuser = $usuario->totaldeEcoins($Usuario['username']);
                    $Usuario['Ecoins'] = $ecoinsuser;
                    array_push($totalecoins, $Usuario);
                }

                //ordeno por ecoins     
                foreach ($totalecoins as $clave => $valor) {
                    $orden1[$clave] = $valor['Ecoins'];
                }
                array_multisort($orden1, SORT_DESC, $totalecoins);
            }
            include './View/Usuario_List_View.php';
            new Usuario_List($totalecoins);
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll');
        }
    }
    //Mostrar todos usuarios
    function showAll()
    {
        $usuario = new Usuario_Model();
        $feedback = $usuario->Search();
        if ($feedback['ok']) {
            $totalecoins = array();
            //recorro usuarios y creo array [username]=>[ecoinstotal]
            if ($usuario->get_result() != '') { //no vacio
                //para cada usuario cojo sus ecoins y la guardo en ['Ecoins'] y esto lo meto en array
                foreach ($usuario->get_result() as $Usuario) {
                    $ecoinsuser = $usuario->totaldeEcoins($Usuario['username']);
                    $Usuario['Ecoins'] = $ecoinsuser;
                    array_push($totalecoins, $Usuario);
                }
                //ordeno por ecoins     

                foreach ($totalecoins as $clave => $valor) {
                    $orden1[$clave] = $valor['Ecoins'];
                }
                array_multisort($orden1, SORT_DESC, $totalecoins);
            }
            include './View/Usuario_List_View.php';
            new Usuario_List($totalecoins);
        } else {
            new Message($feedback['code'], 'Usuario', 'showAll'); //Mensaje de showAll
        }
    }
}

?>