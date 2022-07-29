<?php
$senticia ="DELETE FROM asistencia_2019 WHERE idAlumno=".$_REQUEST['idalumno']." AND dia=".$_REQUEST['dia']." AND mes=".$_REQUEST['mes']." AND idCurso='".$_REQUEST['curso']."';";

require('ejecutar_sql.php');
?>