<?php
$senticia ="UPDATE alumno_2019 SET observacion".$_REQUEST['numobs']."='".$_REQUEST['nvalor']."' WHERE idAlumno=".$_REQUEST['idalumno'].";";

require('ejecutar_sql.php');
?>