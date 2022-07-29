<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}
?>
<?php
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
        <link rel="stylesheet" type="text/css" href="css/CSSasistencia.css">
        <script src="js/JSasistencia.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>

           <form  action="mostrar_asistencia.php" method="post" >
	            <input type="submit" name='volver' value="VOLVER">
	        </form> 
<?php

if (isset($_POST['actualizar'])){

            $host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion falló: " . $conexion->connect_error);
            }

$sql ="SELECT idAlumno,nombre,apellido1, apellido2 FROM alumno_2019  WHERE idCurso ='".$_POST['select_curso']."' ORDER BY apellido1 ASC, apellido2 ASC;";
$result = $conexion->query($sql);

 switch ($_POST['select_curso']) {
        
        case '1B':
        		$nombre_curso='Primero B&aacute;sico';
        		break;
        case '2B':
        		$nombre_curso='Segundo B&aacute;sico';
        		break;
        case '3B':
        		$nombre_curso='Tercero B&aacute;sico';
        		break;
        case '4B':
        		$nombre_curso='Cuarto B&aacute;sico';
        		break;
        case '5B':
        		$nombre_curso='Quinto B&aacute;sico';
        		break;
        case '6B':
        		$nombre_curso='Sexto B&aacute;sico';
        		break;
        case '7B':
        		$nombre_curso='Septimo B&aacute;sico';
        		break;
        case '8B':
        		$nombre_curso='Octavo B&aacute;sico';
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

echo "<p> Curso: ".$nombre_curso."<p>"."<p> Mes: ".$_POST['select_mes']."<p>";
echo "<table id='tabla_inasistencia'>";


    switch ($_POST['select_mes']) {
        
              case 'enero':
            $dias_mes=31;
            $mes=1;
            $sabado=6;
            $domingo=7;
            echo "<tr><th></th><th></th><th></th><th class='lunes'>L</th><th class='martes'>M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'>L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'>L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'>L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'>L</th><th class='martes' >M</th><th class='miercoles' >X</th><th></tr>";
            break;
        case 'febrero':
            $dias_mes=28;
            $mes=2;
            $sabado=3;
            $domingo=4;
            echo "<tr><th></th><th></th><th></th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'>L</th><th class='martes'>M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th></tr>";
            break;
        case 'marzo':
            $dias_mes=31;
            $mes=3;
            $sabado=3;
            $domingo=4;
            echo "<tr><th></th><th></th><th></th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th>M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th></tr>";
            break;
        case 'abril':
            $dias_mes=30;
            $mes=4;
            $sabado=6;
            $domingo=7;
            echo "<tr><th></th><th></th><th></th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th></tr>";
            break;
        case 'mayo':
            $dias_mes=31;
            $mes=5;
            $sabado=4;
            $domingo=5;
            echo "<tr><th></th><th></th><th></th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th></tr>";
            break;
        case 'junio':
            $dias_mes=30;
            $mes=6;
            $sabado=1;
            $domingo=2;
            echo "<tr><th></th><th></th><th></th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes'  >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th></tr>";
            break;
            case 'julio':
            $dias_mes=31;
            $mes=7;
            $sabado=6;
            $domingo=7;
            echo "<tr><th></th><th></th><th></th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th></tr>";
            break;
        case 'agosto':
            $dias_mes=31;
            $mes=8;
            $sabado=3;
            $domingo=4;
            echo "<tr><th></th><th></th><th></th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th></tr>";
            break;
        case 'septiembre':
            $dias_mes=30;
            $mes=9;
            $sabado=7;
            $domingo=1;
            echo "<tr><th></th><th></th><th></th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th></tr>";
            break;
        case 'octubre':
            $dias_mes=31;
            $mes=10;
            $sabado=5;
            $domingo=6;
            echo "<tr><th></th><th></th><th></th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th></tr>";
            break;
        case 'noviembre':
            $dias_mes=30;
            $mes=11;
            $mes=10;
            $sabado=2;
            $domingo=3;
            echo "<tr><th></th><th></th><th></th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th></tr>";
            break;
        case 'diciembre':
            $dias_mes=31;
            $mes=12;
            $sabado=7;
            $domingo=1;
            echo "<tr><th></th><th></th><th></th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th><th class='miercoles' >X</th><th class='jueves' >J</th><th class='viernes' >V</th><th class='sabado' >S</th><th class='domingo' >D</th><th class='lunes' >L</th><th class='martes' >M</th></tr>";
            break;
  
    }

echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th>";
    for ($i = 1; $i <= $dias_mes; $i++) {
         echo "<th class='num_asist' >".$i."</th>";
    }
 echo "</tr>";

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
        echo "<tr><th>".utf8_encode($row['nombre'])."</th><th>".utf8_encode($row['apellido1'])."</th><th>".utf8_encode($row['apellido2'])."</th>";
        $tsabado=$sabado;
        $tdomingo=$domingo;

        for ($dia = 1; $dia <= $dias_mes; $dia++)
        {
             
             if($tsabado==$dia){

                echo "<th><input type='checkbox' id='".$row['idAlumno']."_".$dia."_".$mes."_".$_POST['select_curso']."' class='weekend' onchange='sendToServer(this)' ></th>";
                $tsabado+=7;
             }elseif($tdomingo==$dia){

                echo "<th><input type='checkbox' id='".$row['idAlumno']."_".$dia."_".$mes."_".$_POST['select_curso']."' class='weekend' onchange='sendToServer(this)' ></th>";
                $tdomingo+=7;
             }else{

                 echo "<th><input type='checkbox' id='".$row['idAlumno']."_".$dia."_".$mes."_".$_POST['select_curso']."' onchange='sendToServer(this)' ></th>";
             }

            
        }
        echo "</tr>";
    }

}
echo "</table><script >";

$sql ="SELECT idAlumno,dia,mes,idCurso FROM asistencia_2019  WHERE idCurso ='".$_POST['select_curso']."' and mes=".$mes.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
          echo "document.getElementById('".$row['idAlumno']."_".$row['dia']."_".$row['mes']."_".$row['idCurso']."').checked = true;";
    }
      
}
  echo "</script></body></html>";
}

if (isset($_POST['volver'])){
  header('Location: asistencia.php');
}

?>

