<?php
$host_db = "localhost";
$user_db = "csg39721_1";
$pass_db = "passUser";
$db_name = "csg39721_test";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
	 die("La conexion fall贸: " . $conexion->connect_error);
}

if ($conexion->query($senticia) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conexion->error;
}
mysqli_close($conexion);
?>