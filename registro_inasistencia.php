<?php
$senticia ="INSERT INTO asistencia_2019 (idAlumno,dia,mes,idCurso) VALUES (".$_REQUEST['idalumno'].",".$_REQUEST['dia'].",".$_REQUEST['mes'].",'".$_REQUEST['curso']."');";

require('ejecutar_sql.php');
?>