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
        <header>
          <?php include('banner_sitio.php'); ?>
        </header>

<?php
            echo "<div id=contendor_evento >";
          
 			$host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion fall贸: " . $conexion->connect_error);
            }

$sql ="SELECT dia,mes,codigoCurso,codigobloque,contenido,titulo FROM evento  WHERE  mes=".$_REQUEST['mes']." AND dia=".$_REQUEST['dia']."  and codigobloque='".$_REQUEST['codigobloque']."' ORDER BY codigobloque ASC;";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
        echo "<p>Fecha : ".$row['dia']."/ ";
        
         switch ( $row['mes']) {
        
        case 1 :
        		$nombre_curso='Enero';
        		break;
        case 2 :
        		$nombre_curso='Febrero';
        		break;
        case 3:
        		$nombre_curso='Marzo';
        		break;
        case 4 :
        		$nombre_curso='Abril';
        		break;
        case 5 :
        		$nombre_curso='Mayo';
        		break;
        case 6 :
        		$nombre_curso='Junio';
        		break;
        case 7 :
        		$nombre_curso='Julio';
        		break;
        case 8 :
                $nombre_curso='Agosto';
        		break;
        case 9 :
                $nombre_curso='Septiembre';
        		break;		
        case 10 :
                $nombre_curso='Octubre';
        		break;		
        case 11 :
                $nombre_curso='Noviembre';
        		break;
        case 12 :
                $nombre_curso='Diciembre';
        		break;
         }
        		
        echo "".$nombre_curso."/2018</p><br>";
        
         switch ( $row['codigoCurso']) {
        
        case '1B':
        		$nombre_curso='Primero B&aacutesico';
        		break;
        case '2B':
        		$nombre_curso='Segundo B&aacutesico';
        		break;
        case '3B':
        		$nombre_curso='Tercero B&aacutesico';
        		break;
        case '4B':
        		$nombre_curso='Cuarto B&aacutesico';
        		break;
        case '5B':
        		$nombre_curso='Quinto B&aacutesico';
        		break;
        case '6B':
        		$nombre_curso='Sexto B&aacutesico';
        		break;
        case '7B':
        		$nombre_curso='Septimo B&aacutesico';
        		break;
        case '8B':
        		$nombre_curso='Octavo B&aacutesico';
        		break;
        case 'PKA':
        		$nombre_curso='Pre Kinder A';
        		break;
        case 'PKB':
        		$nombre_curso='Pre Kinder B';
        		break;
        case 'KA':
        		$nombre_curso='Kinder A';
        		break;
        case 'KB':
        		$nombre_curso='Kinder B';
        		break;
         }
        echo "<p>Curso: ".$nombre_curso."</p><br>";
        
        switch ( $row['codigobloque']) {
        
        case '1P':
        		$nombre_curso='8:00 AM - 9:30 AM';
        		break;
        case '2P':
        		$nombre_curso='9:45 AM - 11:15 AM';
        		break;
        case '3P':
        		$nombre_curso='11:30 AM - 13:00 PM';
        		break;
        case '4P':
        		$nombre_curso='14:00 PM - 15:30 PM';
        		break;
        case '5P':
        		$nombre_curso='15:45 PM - 17:17 PM';
        		break;
        case '6P':
        		$nombre_curso='17:30 PM - 19:00 PM';
        		break;
        
         }
        echo "<p>Bloque: ".$nombre_curso."</p><br>";
        echo "<p>Titulo: ".$row['titulo']."</p><br>";
        echo "<p>Descripcion: ".$row['contenido']."</p><br>";
        echo "<br><br><a id='link_volver' href='mostrar_calendario.php'>Volver</a>";
    }
      
}


echo"</div></body></html>";

?>