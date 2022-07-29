<?php
$senticia ="UPDATE homologacion_calificaciones SET ".$_REQUEST['campo']."='".$_REQUEST['nuevovalor']."' WHERE idregistro=".$_REQUEST['id'].";";

require('ejecutar_sql.php');
?>