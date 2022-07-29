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
		<a class="btn-volver" href='observaciones.php' > Volver</a>
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
    		echo "<div id='myTable_ob'><div class='row-header'><div class='cell-t'>Nombre</div><div class='cell-t'>Apellido Paterno</div><div class='cell-t'>Apellido Materno</div><div class='cell-t'>Observaci&oacute;n Primer Semestre</div><div class='cell-t'>Observaci&oacute;n Segundo Semestre</div></div>";

		    while($row = $result->fetch_assoc())
		    {
		        echo "<span class='mobil_name'> Nombre : ".utf8_encode($row['nombre'])." ".utf8_encode($row['apellido1'])." ".utf8_encode($row['apellido2'])."</span>";
	            echo  "<div class='row-t'><div class='cell-t'><span class='indicador'>Nombre:  </span>".utf8_encode($row['nombre'])."</div><div class='cell-t'><span class='indicador'>Apellido Paterno: </span>".utf8_encode($row['apellido1'])."</div><div class='cell-t'><span class='indicador'>Apellido Materno: </span>".utf8_encode($row['apellido2'])."</div><div class='cell-t'><span class='indicador'>Observaci&oacute;n Primer Semestre : </span><textarea title='Tama&ntilde;o manejable desde la esquina derecha inferior' id='".$row['idAlumno']."_1' name='1' rows='3' cols='25' onchange='sendToServer(this)' >".$row['observacion1']."</textarea></div><div class='cell-t'><span class='indicador'>Observaci&oacute;n Segundo Semestre : </span><textarea title='Tama&ntilde;o manejable desde la esquina derecha inferior' id='".$row['idAlumno']."_2' name='2' rows='3' cols='25' onchange='sendToServer(this)' >".$row['observacion2']."</textarea></div></div>";
		    }
		}
		
		echo "</div></body></html>";
		mysqli_close($conexion);
}


 ?>