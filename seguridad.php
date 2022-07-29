<?php 

class Seguridad {

	private $usuario = null;
	private $permiso_calificaciones = false;
	private $permiso_calendario = false;
	private $permiso_asistencia = false;
	private $permiso_observaciones = false;
	private $permiso_informes = false;

    function  __construct()
	{
		session_start();
		if (isset($_SESSION['nick']))
		{
			$this->usuario = $_SESSION['nick'];
			$this->permiso_calificaciones=$_SESSION['permiso_calificaciones'];
        	$this->permiso_calendario=$_SESSION['permiso_calendario'];
    	    $this->permiso_asistencia=$_SESSION['permiso_asistencia'];
    	    $this->permiso_observaciones=$_SESSION['permiso_observaciones'];
    	    $this->permiso_informes=$_SESSION['permiso_informes'];
			
		}
	
	}
	
	public function getUsuario(){
		return $this->usuario;
	}

    public function acceso_calificaciones(){
		return $this->permiso_calificaciones;
	}
    
    public function acceso_calendario(){
		return $this->permiso_calendario;
	}
	
	public function acceso_asistencia(){
		return $this->permiso_asistencia;
	}
	
	public function acceso_observaciones(){
		return $this->permiso_observaciones;
	}
	
	public function acceso_informes(){
		return $this->permiso_informes;
	}
}

?>