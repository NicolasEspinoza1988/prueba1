<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>:: Colegio Saint Germaine Intranet ::</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSSobservaciones.css">
        <script src="js/JSobservaciones.js"></script>
       </head>
    <body>
        <header>
            <?php
                include('banner_sitio.php');
            ?>
        </header>
			<form id="formObs" action="mostrar_observaciones.php" method="post" >
	            <input type="submit" name='volver' value="VOLVER">
	        </form> 
<?php

if (isset($_POST['actualizar']))
{

		if (isset($_POST['curso_select_obs']))
		{ 
    		$_SESSION['curso_select_obs'] = $_POST['curso_select_obs'];
		} 
		
		$host_db = "localhost";
		$user_db = "csg39721_1";
		$pass_db = "passUser";
		$db_name = "csg39721_test";

		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

		if ($conexion->connect_error) {
		 die("La conexion falló: " . $conexion->connect_error);
		}

	    $sql = "SELECT idAlumno,nombre,apellido1,apellido2,observacion1, observacion2 FROM alumno_2019  WHERE idCurso ='".$_SESSION['curso_select_obs']."' ORDER BY apellido1 ASC, apellido2 ASC;";
		$result = $conexion->query($sql);
			
		if ($result->num_rows > 0) 
		{
    		echo "<table id='myTable'><tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Observaci&oacute;n 1</th><th>Observaci&oacute;n 2</th></tr>";

		    while($row = $result->fetch_assoc())
		    {
	            echo  "<tr><th class='textopresentacion' >".utf8_encode($row['nombre'])."</th><th class='textopresentacion' >".utf8_encode($row['apellido1'])."</th><th  class='textopresentacion' >".utf8_encode($row['apellido2'])."</th><th><textarea id='".$row['idAlumno']."_1' name='1' rows='3' cols='25' onchange='sendToServer(this)' >".$row['observacion1']."</textarea></th><th><textarea id='".$row['idAlumno']."_2' name='2' rows='3' cols='25' onchange='sendToServer(this)' >".$row['observacion2']."</textarea></th></tr>";
		    }
		}
		
		echo "</table></body></html>";
		mysqli_close($conexion);
}

if (isset($_POST['volver']))
{
    header('Location: observaciones.php');
}

 ?>