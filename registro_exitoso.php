<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030"> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSScalendario.css">
        <script src="js/JScalendario.js"></script>
    </head>
    <body>
      <p id='txt_aregado'>Evento agregado</p>
      <a id='link_calendario' href='mostrar_calendario.php'>Volver</a>	
	</body>
</html>