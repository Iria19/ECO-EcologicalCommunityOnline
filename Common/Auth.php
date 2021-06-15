<!--En este fichero esta esta la función que comprueba si un usuario esta autenticado-->
<?php
//funcion autenticado
function is_authenticated(){
	if (!isset($_SESSION['username'])){	//No esta autenticado
		return false;
	}
	else{
		return true;
	}
} //fin del la función is_authenticated()

//funcion es admin
function es_admin() {

	if ($_SESSION['tipo']==='administrador'){	//No esta autenticado
		return true;
	}
	else{
		return false;
	}
}



?> 