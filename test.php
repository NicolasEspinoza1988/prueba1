<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp"> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSSinforme.css">
        
    </head>
    <body>
       
       <div id='encabezado' ><h1>COLEGIO SAINT GERMAINE</h1>
        <p>RBD: 9358 - 0</p>
        <p>VICUNA MACKENNA 8103 ANDALUCIA - LA FLORIDA</p>
       <p> Fono: 2821711</p></div>
       <br>
       
       <h1>INFORME DE NOTAS</h1>
       <?php

            $host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion falló: " . $conexion->connect_error);
            }

$sql ="SELECT  idAlumno,nombre,apellido1,apellido2,idCurso FROM alumno_2018 WHERE  idAlumno = ".$_POST['alumno_select'].";";
$result = $conexion->query($sql);

$idalumno;
$contadorprom=0;
if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
       echo "<p class='txt_fecha' >NOMBRE: ".$row['nombre']." ".$row['apellido1']." ".$row['apellido2']."</p>";
       	 switch ($row['idCurso']) {
        
        case '1B':
        		$nombre_curso='Primero Basico';
        		break;
        case '2B':
        		$nombre_curso='Segundo Basico';
        		break;
        case '3B':
        		$nombre_curso='Tercero Basico';
        		break;
        case '4B':
        		$nombre_curso='Cuarto Basico';
        		break;
        case '5B':
        		$nombre_curso='Quinto Basico';
        		break;
        case '6B':
        		$nombre_curso='Sexto Basico';
        		break;
        case '7B':
        		$nombre_curso='Septimo Basico';
        		break;
        case '8B':
        		$nombre_curso='Octavo Basico';
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
      echo "<p>CURSO: ".$nombre_curso."</p>";
      echo "<p>PRIMER SEMESTRE</p>";
      
      $idalumno=$row['idAlumno'];
      
    }
    
   
      
}
?>

       
       </div>
    
    <?php
    echo "<div class='tabla'>";
    echo "<div class='encabezado'><div class='celda'><p>Asignatura</p></div><div class='celda'><p>N1</p></div><div class='celda'><p>N1</p></div><div class='celda'><p>N3</p></div><div class='celda'><p>N4</p></div><div class='celda'><p>N5</p></div><div class='celda'><p>N6</p></div><div class='celda'><p>N7</p></div><div class='celda'><p>N8</p></div><div class='celda'><p>N9</p></div><div class='celda'><p>N10</p></div><div class='celda'><p>PROM</p></div></div>";


            $host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion falló: " . $conexion->connect_error);
            }

$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM lenguaje_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>LENGUAJE</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
    }
      
}


$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM matematica_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>MATEMATICA</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
      
    }
      
}


$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM ciencias_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>CIENCIAS NATURALES</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}

$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM tecnologia_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>TECNOLOGIA</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}

$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM musica_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>MUSICA</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}



$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM fisica_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>FISICA</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}


$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM historia_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>HISTORIA Y GEOGRAFIA</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}




$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM artes_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>ARTES VISUALES</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}


$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM ingles_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>INGLES</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div>";
        $contadorprom = $contadorprom + $row['prom'];
      
    }
      
}


$sql ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM religion_2018 WHERE idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
    
       
        echo "<div class='fila'><div class='celda' ><p>RELIGION</p></div>";
        echo "<div class='celda' ><p>".$row['n1']."</p></div>";
        echo "<div class='celda' ><p>".$row['n2']."</p></div>";
        echo "<div class='celda' ><p>".$row['n3']."</p></div>";
        echo "<div class='celda' ><p>".$row['n4']."</p></div>";
        echo "<div class='celda' ><p>".$row['n5']."</p></div>";
        echo "<div class='celda' ><p>".$row['n6']."</p></div>";
        echo "<div class='celda' ><p>".$row['n7']."</p></div>";
        echo "<div class='celda' ><p>".$row['n8']."</p></div>";
        echo "<div class='celda' ><p>".$row['n9']."</p></div>";
        echo "<div class='celda' ><p>".$row['n10']."</p></div>";
        echo "<div class='celda' ><p>".$row['prom']."</p></div></div></div>";
    }
      
}

$contadorprom=$contadorprom/10;
echo "<div class='txt_prom' ><p> PROMEDIO SEMESTRAL ".$contadorprom." </p></div>";
?>



<H2>INFORME DE ASISTENCIA :</H2>
<div class='tabla'>
<div class='fila'><div class='celda' ><p>Dias Trabajados: 220</p></div><div class='celda' ><p>Días Inasistentes : 4</p></div><div class='celda' ><p>%Asistencia : 87 %</p></div></div>
<div class='fila'><div class='celda' ><p></p></div><div class='celda' ><p>Días Atrasados : 0</p></div><div class='celda' ><p>% Atrasos 0 %</p></div></div>
</div>



<?php

$obs=($_POST['semestre_select']='S1')? 'observacion1':'observacion2';


$sql ="SELECT  ".$obs." FROM alumno_2018 WHERE  idAlumno = ".$idalumno.";";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
     
    while($row = $result->fetch_assoc())
    {
        $obs=($_POST['semestre_select']='S1')? $row['observacion1']:$row['observacion2'];
        echo "<p>OBSERVACIONES : ".$obs."</p>";
    }
      
}


echo "<br><br><br><br><br><br>";
switch ($_POST['curso_select']) {
        
        case '1B':
        		$nombre_curso='Camila Muñoz Parra';
        		break;
        case '2B':
        		$nombre_curso='Mila Flores Ruiz';
        		break;
        case '3B':
        		$nombre_curso='María Soledad Salazar Cáceres';
        		break;
        case '4B':
        		$nombre_curso='Katherine Muñoz Palma';
        		break;
        case '5B':
        		$nombre_curso='Alejandro Antonio Arévalo Rivera';
        		break;
        case '6B':
        		$nombre_curso='Paola Stockle Quinchavil';
        		break;
        case '7B':
        		$nombre_curso='Daniela Garrido Parra';
        		break;
        case '8B':
        		$nombre_curso='Oscar López Aros';
        		break;
        case 'PKA':
        		$nombre_curso='Pre Kinder A';
        		break;
        case 'PKB':
        		$nombre_curso='Pre Kinder B';
        		break;
        case 'KA':
        		$nombre_curso='Verónica Prado Matus';
        		break;
        case 'KB':
        		$nombre_curso='Gloria Caballería Galdames';
        		break;
         }
echo "<div class='firma'><p>___________________________________</p><p>".$nombre_curso."</p><p>Profesor Jefe</p></div>";
echo "<div class='firma'><p>___________________________________</p><p>CLAUDIA GARRIDO PARRA</p><p>DIRECTOR</p></div>";
setlocale(LC_TIME,"es_ES");
setlocale(LC_ALL,"es_ES");
echo "<br><br><p class='txt_fecha'>".strftime("%A  %d de %B  del  %Y")."</p></body></html>";
?>