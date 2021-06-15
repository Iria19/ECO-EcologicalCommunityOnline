<?php

include_once './Config/config.php';
//model por defacto
abstract class Default_Model {

    private static $db_host = host;
    private static $db_user = user;
    private static $db_pass = pass;
    private static $db_name = database;
    private static $db_test = test_database;

    private $conn;

    protected $query;
    protected $rows = array();

	public $ok = true;
	public $code = '00000';
	public $resource = '';
    public $feedback = array();

    abstract protected function fill_fields();
	abstract protected function Add();
    abstract protected function Edit();
	abstract protected function Delete();
	abstract protected function Search();
	abstract protected function Seek();
    
    //Conexion
    function connection() {
        if (isset($_SESSION['test']) && $_SESSION['test'] === true){
            $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass) or die('Usuario y contraseña de la BD no es correcto en testing');
            
            if (!$this->conn->select_db(self::$db_test)){
				$fileSQL = file_get_contents('./Config/ecoBD_Test.sql');
                $this->conn->multi_query($fileSQL);
                while ($this->conn->more_results()) {
                    $this->conn->next_result();
                }
            }
            return($this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_test) or die('fallo conexion'));
        } else {
            $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass) or die('Usuario y contraseña de la BD no es correcto en producción'); 
			if (!$this->conn->select_db(self::$db_name)){
				$fileSQL = file_get_contents('./Config/ecoBD.sql');
                $this->conn->multi_query($fileSQL);
                while ($this->conn->more_results()) {
                    $this->conn->next_result();
                }
			}
			return($this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name) or die('fallo conexion'));
       }
    }

    //Borrar bd test
    function borra_db_test(){
        $conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_test) or die('fallo conexion');
        $query  = 'DROP DATABASE ecoBD_Test';
        if ($conn->query($query) === TRUE) {
            echo "La base de datos ecoBD_Test fue eliminada con éxito\n";
        } else {
            echo 'Error al eliminar la base de datos ';
        }
        $conn->close();
    }

    //Cerrar conexion
    private function close_connection() {//Cierro conexión
        $this->conn->close();
    }

    //Construir respuesta
    protected function construct_response() {//Constructor de la respuesta
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }

    //Ejecutar una query
    protected function execute_single_query() {

        if (!$this->connection()) {                 // Error de conexión
            $this->ok = false;
            $this->code = '00004';
        } else {
            if ($this->conn->query($this->query)) { // Éxito de SQL
                $this->ok = true;
                $this->code = '00001';
            } else {                                // Error de SQL
                $this->ok = false;
                $this->code = '00005';
            }
            $this->close_connection();
        }
        $this->construct_response();
    }
    protected function execute_simple_query() {
        
        if (!$this->connection()) {                 // Error de conexión
            $this->ok = false;
            $this->code = '00004';
        } else {
            $result = $this->conn->query($this->query);

            if ($result) {
                
                $this->ok = true;
                if ($result->num_rows == 0) {       // El recordset vuelve vacío
                    $this->code = '00002';
                } else {                            // El recordset vuelve con datos
                    $this->resource=$result;
                    $this->code = '00003';
                }
            } else {                                // Error de SQL
                $this->ok = false;
                $this->code = '00005';
            }
            $this->close_connection();//cierro la conexion
        }
        $this->construct_response();//llamo al constructor de la respuesta SQL
    }

    //Obtener resultado query
    protected function get_results_from_query() {
        $this->ok="";
        $this->rows="";
        $this->code="";
        $this->resource="";

        if (!$this->connection()) {                 // Error de conexión
            $this->ok = false;
            $this->code = '00004';
        } else {
            $result = $this->conn->query($this->query);
            if ($result) {
                $this->ok = true;
                if ($result->num_rows == 0) {       // El recordset vuelve vacío
                    $this->code = '00002';
                } else {                            // El recordset vuelve con datos
                    for($i=0; $i<$result->num_rows; $i++){//recorro array
                        $this->rows[] = $result->fetch_assoc();
                        
                    }
                    $result->close();
                    $this->code = '00003';
                }
            } else {                                // Error de SQL
                $this->ok = false;
               
                $this->code = '00005';
            }
            $this->close_connection();//cierro conexion
        }
        $this->resource=$this->rows;
        $this->construct_response();//llamo al constructor de la respuesta SQL
    }

    //Obtener un resultado query
    protected function get_one_result_from_query() {
        if (!$this->connection()) {                 // Error de conexión
            $this->ok = false;
            $this->code = '00004';
        } else {
            $result = $this->conn->query($this->query);
            if ($result) {
                $this->ok = true;
                if ($result->num_rows == 0) {       // El recordset vuelve vacío
                    $this->code = '00002';
                } else {                            // El recordset vuelve con datos
                    $this->rows = $result->fetch_assoc();
                    $this->resource=$this->rows;
                    $this->code = '00003';
                }
            } else {                                // Error de SQL
                $this->ok = false;
                $this->code = '00005';
            }
            $this->close_connection();//cierro la conexion
        }
        $this->construct_response();//llamo al constructor de la respuesta SQL
    }


}

?>