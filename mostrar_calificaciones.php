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
            <?php include('banner_sitio.php'); ?>
        </header>
		<form id="formCalificaciones" action="mostrar_calificaciones.php" method="post" >
	        <input type="submit" name='volver' value="VOLVER">
	    </form> 
<?php

if (isset($_POST['actualizar']))
{
    if (isset($_POST['asig_select']))
    { 
    	$_SESSION['asig_select'] = $_POST['asig_select'];
		$_SESSION['curso_select'] = $_POST['curso_select'];
		$_SESSION['semestre_select'] = $_POST['semestre_select'];
    }
			
	switch ($_SESSION['curso_select']) 
	{
        
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
    switch($_SESSION['semestre_select'])
    {
        case 'p1': $nombre_semestre='Primer Semestre';break;
        case 'p2': $nombre_semestre='Segundo Semestre';break;
    }
         
    echo "<p>".utf8_decode($nombre_curso).""."<p>".$nombre_aisgnatura."<p>".$nombre_semestre;
			
	$host_db = "localhost";
	$user_db = "csg39721_1";
	$pass_db = "passUser";
	$db_name = "csg39721_test";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) 
	{
	    die("La conexion falló: " . $conexion->connect_error);
	}

    $sql = "SELECT A.idAlumno,A.nombre,A.apellido1,A.apellido2, L.n1, L.n2 , L.n3 , L.n4 , L.n5 , L.n6 , L.n7 , L.n8 , L.n9 , L.n10 , L.prom FROM alumno_2019 A, ".$_SESSION['asig_select']."_2019_".$_SESSION['semestre_select']." L WHERE A.idCurso ='".$_SESSION['curso_select']."' and  A.idAlumno = L.idAlumno ORDER BY A.apellido1 ASC, A.apellido2 ASC;";
	$result = $conexion->query($sql);
	
	if ($result->num_rows > 0) 
	{   
	    echo "<table id='myTable'><tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>N1</th><th>N2</th><th>N3</th><th>N4</th><th>N5</th><th>N6</th><th>N7</th><th>N8</th><th>N9</th><th>N10</th><th>Prom</th></tr>";
	    $index_tab=1;
		while($row = $result->fetch_assoc())
		{
		    switch ($_SESSION['asig_select']) 
		    {
                case 'religion':
                    
                        echo    "<tr><th>".utf8_encode($row['nombre']).
                                "</th><th>".utf8_encode($row['apellido1']).
                                "</th><th>".utf8_encode($row['apellido2']).
                                "</th><th><select tabindex='".$index_tab."' id='".$row['idAlumno']."_n1' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".$row['n1']."' ><option value=''>--</option><option value='MB' ".(($row['n1']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n1']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n1']=='S')?'selected':'')."  >S</option><option value='I' ".(($row['n1']=='I')?'selected':'')."  >I</option></select></th><th><select tabindex='".($index_tab+1)."' id='".$row['idAlumno']."_n2' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n2']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n2']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n2']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n2']=='I')?'selected':'')." >I</option></select ></th><th><select tabindex='".($index_tab+2)."' id='".$row['idAlumno']."_n3' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option  value='MB' ".(($row['n3']=='MB')?'selected':'')." >MB</option><option  value='B' ".(($row['n3']=='B')?'selected':'')." >B</option><option  value='S' ".(($row['n3']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n3']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+3)."' id='".$row['idAlumno']."_n4' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'    ><option value=''>--</option><option value='MB' ".(($row['n4']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n4']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n4']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n4']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+4)."' id='".$row['idAlumno']."_n5' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n5']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n5']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n5']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n5']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+5)."' id='".$row['idAlumno']."_n6' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n6']=='MB')?'selected':'')." >MB</option><option  value='B' ".(($row['n6']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n6']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n6']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+6)."' id='".$row['idAlumno']."_n7' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option  value='MB' ".(($row['n7']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n7']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n7']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n7']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+7)."'  id='".$row['idAlumno']."_n8' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n8']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n8']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n8']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n8']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+8)."' id='".$row['idAlumno']."_n9' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n9']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n9']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n9']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n9']=='I')?'selected':'')." >I</option></select></th><th><select tabindex='".($index_tab+9)."' id='".$row['idAlumno']."_n10' onchange='actualizar_nota_religion(this)'  name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'   ><option value=''>--</option><option value='MB' ".(($row['n10']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['n10']=='B')?'selected':'')." >B</option><option value='S' ".(($row['n10']=='S')?'selected':'')." >S</option><option value='I' ".(($row['n10']=='I')?'selected':'')." >I</option></select></th><th><select id='".$row['idAlumno']."_prom' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'  disabled ><option value=''>--</option><option value='MB' ".(($row['prom']=='MB')?'selected':'')." >MB</option><option value='B' ".(($row['prom']=='B')?'selected':'')." >B</option><option value='S' ".(($row['prom']=='S')?'selected':'')." >S</option><option value='I' ".(($row['prom']=='I')?'selected':'')." >I</option></select></th></tr>";
                		break;
                default:
                            			
					echo "<tr><th>".utf8_encode($row['nombre'])."</th><th>".utf8_encode($row['apellido1'])."</th><th>".utf8_encode($row['apellido2'])."</th>".
                    "<th><input type='text'  tabindex='".$index_tab."'     id='".$row['idAlumno']."_n1'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n1'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+1)."' id='".$row['idAlumno']."_n2'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n2'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+2)."' id='".$row['idAlumno']."_n3'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n3'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+3)."' id='".$row['idAlumno']."_n4'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n4'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+4)."' id='".$row['idAlumno']."_n5'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n5'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+5)."' id='".$row['idAlumno']."_n6'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n6'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+6)."' id='".$row['idAlumno']."_n7'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n7'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+7)."' id='".$row['idAlumno']."_n8'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n8'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+8)."' id='".$row['idAlumno']."_n9'  size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n9'])."'></th>".
                    "<th><input type='text'  tabindex='".($index_tab+9)."' id='".$row['idAlumno']."_n10' size='2' onchange='senToServer(this)' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."' value='".round($row['n10'])."'></th>".
                    "<th><input type='text'  id='".$row['idAlumno']."_prom' size='2' name='".$_SESSION['asig_select']."_".$_SESSION['semestre_select']."'  onchange='actualizarProm(this)'  value='".number_format((round($row['prom'])/10),1)."' disabled></th></tr>";
                        break;
            }
             					
		}
			 
		echo "</table>";
	}
	
	$sql = "SELECT idcurso,idasignatura,n1,n2,n3,n4,n5,n6,n7,n8,n9,n10 FROM homologacion_calificaciones WHERE idcurso='".$_SESSION['curso_select']."' AND idasignatura='".$_SESSION['asig_select']."' AND semestre='".$_SESSION['semestre_select']."' ;";
	$result = $conexion->query($sql);

    echo "<table id='tabla_homologacion' ><tr><th>Codigo</th><th>Nombre</th></tr>";
       
    if ($result->num_rows > 0) 
	{
	    while($row = $result->fetch_assoc())
		{
		    echo "<tr><th id='n1'>N1</th><th>".utf8_encode($row['n1'])."</th></tr>"; 
			echo "<tr><th>N2</th><th>".utf8_encode($row['n2'])."</th></tr>";
			echo "<tr><th>N3</th><th>".utf8_encode($row['n3'])."</th></tr>";
			echo "<tr><th>N4</th><th>".utf8_encode($row['n4'])."</th></tr>";
			echo "<tr><th>N5</th><th>".utf8_encode($row['n5'])."</th></tr>";
			echo "<tr><th>N6</th><th>".utf8_encode($row['n6'])."</th></tr>";
			echo "<tr><th>N7</th><th>".utf8_encode($row['n7'])."</th></tr>";
			echo "<tr><th>N8</th><th>".utf8_encode($row['n8'])."</th></tr>";
			echo "<tr><th>N9</th><th>".utf8_encode($row['n9'])."</th></tr>";
			echo "<tr><th>N10</th><th>".utf8_encode($row['n10'])."</th></tr>";
		}
	}
    
    echo "</table>";
           
	mysqli_close($conexion);
	echo "</body></html>";
}


if (isset($_POST['volver']))
{
  header('Location: calificaciones.php');
}

?>