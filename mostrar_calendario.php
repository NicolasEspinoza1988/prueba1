<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>:: Colegio Saint Germaine Intranet ::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSScalendario.css">
        <script src="js/JScalendario.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>

        <form  id='form_mtr_cale' action="mostrar_calendario.php" method="post" >
	        <input type="submit" name='volver' value="VOLVER">
	    </form> 
<?php

if (isset($_POST['volver'])){
  header('Location: calendario.php');
}

if (!isset($_POST['actualizar'])){
  $_POST ['actualizar']=$_SESSION['actualizar'];
  $_POST['select_mes']=$_SESSION['select_mes'];
}

//if (isset($_POST['actualizar'])){

 $_SESSION['actualizar']=$_POST['actualizar'];
 $_SESSION['select_mes']=$_POST['select_mes'];

echo "<p class='nombre-mes'> ". $_SESSION['select_mes']."<p>";
echo "<div class='tabla'>";
  
    switch ( $_POST['select_mes']) {
        
        case 'enero':
        		$dias_mes=31;
        		$num_mes=1;
     			break;

        case 'febrero':
               $dias_mes=28;
               $num_mes=2;
  			   break;

        case 'marzo':
        	  $dias_mes=31;
              $num_mes=3;
  			 break;
            
        case 'abril':
            $dias_mes=30;
            $num_mes=4;
            include 'abril.php';
  			break;

        case 'mayo':
            $dias_mes=31;
            $num_mes=5;
            include 'mayo.php';
  			break;
            
        case 'junio':
            $dias_mes=30;
            $num_mes=6;
            include 'junio.php';
  			break;
         
        case 'julio':
            $dias_mes=31;
            $num_mes=7;
            include 'julio.php';
  			break;
            
        case 'agosto':
            $dias_mes=31;
            $num_mes=8;
            include 'agosto.php';
  			break;
            
        case 'septiembre':
        	$dias_mes=30;
            $num_mes=9;
            include 'septiembre.php';
  			break;
            
        case 'octubre':
       		$dias_mes=31;
            $num_mes=10;
            include 'octubre.php';
  			break;
            
        case 'noviembre':
        	$dias_mes=30;
            $num_mes=11;
            include 'noviembre.php';
  			break;
         
        case 'diciembre':
            $dias_mes=31;
            $num_mes=12;
            include 'diciembre.php';
  			break;
    }
    
            echo "<script>";
            $host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion fallo: " . $conexion->connect_error);
            }

            $sql ="SELECT dia,codigoCurso,codigobloque,mes FROM evento  WHERE  mes=".$num_mes."  ORDER BY codigobloque ASC;";
            $result = $conexion->query($sql);


            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    echo "var createA = document.createElement('a');";
        
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
         
              switch ( $row['codigobloque']) {
            
                    case '1P':
                    		$nombre_bloque='8:00 - 9:30';
                    		break;
                    case '2P':
                    		$nombre_bloque='9:45 - 11:15';
                    		break;
                    case '3P':
                    		$nombre_bloque='11:30 - 13:00';
                    		break;
                    case '4P':
                    		$nombre_bloque='14:00 - 15:30';
                    		break;
                    case '5P':
                    		$nombre_bloque='15:45 - 17:15';
                    		break;
                    case '6P':
                    		$nombre_bloque='17:30 - 19:00';
                    		break;
                    
             }
             
             
            echo "createA.innerHTML = '".$nombre_bloque."<br>".$nombre_curso."';";
            echo "createA.setAttribute('href', 'ver_evento.php?mes=".$row['mes']."&dia=".$row['dia']."&codigobloque=".$row['codigobloque']."');";
    
            echo "createA.setAttribute('class', 'linkregistro');";
            
            echo "var temp = document.createElement('div');";
            echo "temp.appendChild(createA);";
            echo "document.getElementById('".$row['dia']."').appendChild(temp);";
            
    }
      
}

echo "</script>
</body>
</html>";

//}

?>
