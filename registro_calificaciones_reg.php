<?php
$senticia ="UPDATE ".$_REQUEST['nasignatura']."_2019_".$_REQUEST['nsemestre']." SET ".$_REQUEST['campo']."='".$_REQUEST['nuevovalor']."' WHERE idAlumno=".$_REQUEST['id'].";";

require('ejecutar_sql.php');
?>