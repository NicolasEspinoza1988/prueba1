<?php 

class Persistencia{

	private $host_db = 'localhost';
	private $user_db = 'csg39721_1';
	private $pass_db = 'passUser';
	private $db_name = 'csg39721_test';
	private $conexion;

    function  __construct()
	{
	//	session_start();
	
	}
	
	public function ejecutar($sentencia){
	
		$this->conexion = new mysqli($this->host_db, $this->user_db, $this->pass_db, $this->db_name);

		if (($this->conexion)->connect_error) {
			 die("La conexion fall贸: ".($this->conexion)->connect_error);
		}
		
		if (($this->conexion)->query($sentencia) === TRUE) {
    		echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . ($this->conexion)->error;
		}
		
		mysqli_close($this->conexion);
	}
	
}

?>