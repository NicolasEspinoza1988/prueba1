<?php
session_start();
$host_db = "localhost";
$user_db = "csg39721_1";
$pass_db = "passUser";
$db_name = "csg39721_test";
$tbl_name = "permiso";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$user_val ="";
$user_val = str_replace(".","",$_POST['user']);
$user_val = str_replace("-","",$user_val);

//validar user y pass

$password = md5($_POST['pass']);
$sql = "SELECT user,pass,nick,permiso_calificaciones,permiso_calendario,permiso_asistencia,permiso_observaciones,permiso_informes FROM permiso WHERE user ='".$user_val."';";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
		        if($row['pass']==$password)
		        {
		        	$_SESSION['nick'] = $row['nick'];
		        	$_SESSION['permiso_calificaciones'] = $row['permiso_calificaciones'];
		        	$_SESSION['permiso_calendario'] = $row['permiso_calendario'];
		        	$_SESSION['permiso_asistencia'] = $row['permiso_asistencia'];
		        	$_SESSION['permiso_observaciones'] = $row['permiso_observaciones'];
		        	$_SESSION['permiso_informes'] = $row['permiso_informes'];
		        	header('Location: portada.php');
		            exit; 
		        }
		        else
		        {
		    		header('Location: datosincorrectos.php');
		        }

    }

}

mysqli_close($conexion);

?>