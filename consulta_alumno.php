<?php
			$curso=$_GET['curso'];
			$host_db = "localhost";
			$user_db = "csg39721_1";
			$pass_db = "passUser";
			$db_name = "csg39721_test";
			//$tbl_name = $_SESSION['asig_select']."_table";

			$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

			if ($conexion->connect_error) {
			 die("La conexion fall贸: " . $conexion->connect_error);
			}

			$sql = "SELECT idAlumno,nombre,apellido1,apellido2 FROM alumno_2019 WHERE idCurso='".$curso."' ORDER BY apellido1 ASC, apellido2 ASC;";
			$result = $conexion->query($sql);


			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc())
			    {
			    	echo "<option value='".$row['idAlumno']."' >". utf8_encode($row['nombre'])." ".utf8_encode($row['apellido1'])." ".utf8_encode($row['apellido2'])."</option>";
			    }
			}

?>