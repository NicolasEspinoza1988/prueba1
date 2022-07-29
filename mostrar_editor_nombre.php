<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030"> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSScalificaciones.css">
        <script src="js/JScalificaciones.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>

         	
			<form id="formCalificaciones" action="mostrar_editor_nombre.php" method="post" >
	            <input type="submit" name='volver' value="VOLVER">
	        </form> 


<?php

if (isset($_POST['actualizar'])){

			if (isset($_POST['asig_select'])){ 

			$_SESSION['asig_select'] = $_POST['asig_select'];
			$_SESSION['curso_select'] = $_POST['curso_select'];
			$_SESSION['sem_select'] = $_POST['sem_select'];

			 }
			 
			 	 switch ($_SESSION['curso_select']) {
        
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
         
         $nombre_aisgnatura = 'error';
         switch ($_SESSION['asig_select'])
         {
            case 'lenguaje' : $nombre_aisgnatura='Lenguaje & Comunicaci&oacute;n';break;
            case 'matematica' : $nombre_aisgnatura='Matem&aacute;ticas';break;
            case 'ingles' : $nombre_aisgnatura='Ingl&eacute;s';break;
            case 'historia' : $nombre_aisgnatura='Historia & geograf&iacute;a';break;
            case 'ciencias' : $nombre_aisgnatura='Ciencias Naturales';break;
            case 'tecnologia' : $nombre_aisgnatura='Tecnolog&iacute;a';break;
            case 'artes' : $nombre_aisgnatura='Artes Visuales';break;
            case 'musica' : $nombre_aisgnatura='M&uacute;sica';break;
            case 'fisica' : $nombre_aisgnatura='Educaci&oacute;n F&iacute;sica & Salud';break;
            case 'religion' : $nombre_aisgnatura='Religi&oacute;n';break;
             
         }
         
          $nombre_semestre='';
         switch($_SESSION['sem_select'])
         {
             case 'p1': $nombre_semestre='Primer Semestre';break;
             case 'p2': $nombre_semestre='Segundo Semestre';break;
         }
         
			echo "<p>".utf8_decode($nombre_curso)."<p>".$nombre_aisgnatura."<p>".$nombre_semestre;
			
			$host_db = "localhost";
			$user_db = "csg39721_1";
			$pass_db = "passUser";
			$db_name = "csg39721_test";
			
			$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

			if ($conexion->connect_error) {
			 die("La conexion falló: " . $conexion->connect_error);
			}
		
			$sql = "SELECT idregistro,idcurso,idasignatura,n1,n2,n3,n4,n5,n6,n7,n8,n9,n10 FROM homologacion_calificaciones WHERE idcurso='".$_SESSION['curso_select']."' AND idasignatura='".$_SESSION['asig_select']."' AND semestre='".$_SESSION['sem_select']."' ;";
			
			$result = $conexion->query($sql);


           echo "<table id='tabla_homologacion' ><tr><th>Codigo</th><th>Nombre</th></tr>";
           
           	if ($result->num_rows > 0) 
			{
			   while($row = $result->fetch_assoc())
			    {
			        echo "<tr><th>N1</th><th><input type='text'  id='".$row['idregistro']."_n1' onchange='actualizar_nombre(this)'  name='".$_SESSION['asig_select']."' value='".utf8_decode($row['n1'])."'></th></tr>";
			        echo "<tr><th>N2</th><th><input type='text'    id='".$row['idregistro']."_n2' onchange='actualizar_nombre(this)' onchange=''  name='".$_SESSION['asig_select']."' value='".utf8_decode($row['n2'])."'></th></tr>";
			        echo "<tr><th>N3</th><th><input type='text'   id='".$row['idregistro']."_n3' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n3']."'></th></tr>";
			        echo "<tr><th>N4</th><th><input type='text'    id='".$row['idregistro']."_n4' onchange='actualizar_nombre(this)' onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n4']."'></th></tr>";
			        echo "<tr><th>N5</th><th><input type='text'   id='".$row['idregistro']."_n5' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n5']."'></th></tr>";
			        echo "<tr><th>N6</th><th><input type='text'   id='".$row['idregistro']."_n6' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n6']."'></th></tr>";
			        echo "<tr><th>N7</th><th><input type='text'   id='".$row['idregistro']."_n7' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n7']."'></th></tr>";
			        echo "<tr><th>N8</th><th><input type='text'   id='".$row['idregistro']."_n8' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n8']."'></th></tr>";
			        echo "<tr><th>N9</th><th><input type='text'   id='".$row['idregistro']."_n9' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n9']."'></th></tr>";
			        echo "<tr><th>N10</th><th><input type='text'   id='".$row['idregistro']."_n10' onchange='actualizar_nombre(this)'  onchange=''  name='".$_SESSION['asig_select']."' value='".$row['n10']."'></th></tr>";
			    }
			}
           echo "</table>";
           
			mysqli_close($conexion);
			echo "</body></html>";
}

if (isset($_POST['volver'])){
  header('Location: nombrarCalificaciones.php');
}

 ?>