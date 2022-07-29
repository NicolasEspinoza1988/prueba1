<?php
$senticia ="INSERT INTO evento (dia,mes,codigobloque,codigocurso,titulo ,contenido) VALUES (".$_REQUEST['ndia'].",".$_REQUEST['nmes'].",'".$_REQUEST['periodo_select']."','".$_REQUEST['cale_select']."','".$_REQUEST['ntitulo']."','".$_REQUEST['ncontenido']."');";

$host_db = "localhost";
$user_db = "csg39721_1";
$pass_db = "passUser";
$db_name = "csg39721_test";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
}

if ($conexion->query($senticia) === TRUE) {
   header('Location: registro_exitoso.php');
} else {
    echo "Error updating record: " . $conexion->error;
}

mysqli_close($conexion);

?>