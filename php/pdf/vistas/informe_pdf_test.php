<!DOCTYPE html>
<?php
            session_start();
            $idcurso=$_SESSION['curso_select'];
            $host_db = "localhost";
            $user_db = "csg39721_1";
            $pass_db = "passUser";
            $db_name = "csg39721_test";
        
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
             die("La conexion falló: " . $conexion->connect_error);
            }

$sql ="SELECT idAlumno,apellido1,apellido2 FROM alumno_2022 WHERE idCurso ='".$idcurso."' ORDER BY apellido1 ASC, apellido2 ASC;";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{
     echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=euc-jp'><title>:: Colegio Saint Germaine Intranet ::</title><meta name='viewport' content='width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1'><link rel='stylesheet' type='text/css' href='css/fontello.css'><link rel='stylesheet' type='text/css' href='css/CSSinforme.css'></head>";
    echo "<!-- IMPORTANTE: El contenido de la etiqueta style debe estar entre comentarios de HTML -->";
    echo "<style>";
    echo "<!--";
    echo "body{background:white;}";
    echo ".contenedor{width: 98%;margin:auto;text-align:center;}";
    echo "section{width: 100%;}";
    echo "#informe_sec{background: rgba(147,206,222,1);background: -moz-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(0,0,255,1) 100%);background: -webkit-gradient(left top, right top, color-stop(0%, rgba(147,206,222,1)), color-stop(41%, rgba(117,189,209,1)), color-stop(100%, rgba(0,0,255,1)));background: -webkit-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(0,0,255,1) 100%);background: -o-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(0,0,255,1) 100%);background: -ms-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(0,0,255,1) 100%);background: linear-gradient(to right, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(0,0,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#0000ff', GradientType=1 );
        color: #fff;}";
    echo ".txt_prom > P {text-align:left;margin-left:130px;font-size:15px;font-weight: bold;}";
    echo "#encabezado2{margin-top:15px;margin-left:40px;background-size: 10px 10px;background-repeat:no-repeat;  background-origin: content-box;font-size:10px;text-align:center;margin-bottom:20px;}";
    echo "p{margin:2px;padding:3px;font-size:13px;}";
    echo "h1,h2 {text-align:center;}";
    echo "table{display: table;margin-bottom: 20px;margin-top: 30px;}"; 
    echo "table > tr > td{width:20px;height:20px;padding:10px;margin 10px;text-align:center;}";
    echo ".celda{display: table-cell;border: solid;width:40px;height:40px;}";
    echo ".encabezado{display: table-row;font-weight:bold;text-align:center;margin:10px;padding:2px;text-align:center;         height:10px;vertical-align:text-bottom;} ";
    echo ".firma{display:inline;}";
    echo ".firma > div{text-align:center;display:inline;}";
    echo "#sn_informe_cont > p:nth-child(n){margin:3px;}";
    echo "-->";
    echo "</style><body>";
     
    while($row = $result->fetch_assoc())
    {
            echo "<!-- page define la hoja con los márgenes señalados -->";
            echo "<page>";
            
                 echo "<img  src='../../img/logo.PNG' style='height:100px;width:100px;display:inline-block;margin-left:50px;margin-top:20px'><img  src='../../img/test2.png' style='height:120px;width:230px;display:inline-block;margin-right:100px;text-align:right;margin-left:150px'><h1 style='margin-top:40px'>INFORME DE NOTAS</h1>"; 
                $conexion2 = new mysqli($host_db, $user_db, $pass_db, $db_name);
    
                if ($conexion2->connect_error) {
                 die("La conexion falló: " . $conexion2->connect_error);
                }
                
                $idalumno = $row['idAlumno'];
                
                $sql_temp ="SELECT  idAlumno,nombre,apellido1,apellido2,idCurso FROM alumno_2022 WHERE  idAlumno = ".$idalumno.";";
                $result_temp = $conexion2->query($sql_temp);
                
                if ($result_temp->num_rows > 0) 
                 {
         
                    while($row1 = $result_temp->fetch_assoc())
                    { 
                        echo "<p class='txt_fecha' style='text-transform: capitalize;margin-left:30px;font-size:18px' >NOMBRE: ".utf8_encode(ucfirst($row1['nombre']))." ".utf8_encode(ucfirst($row1['apellido1']))." ".utf8_encode(ucfirst($row1['apellido2']))."</p>";
                    switch ($row1['idCurso']) {
            
                            case '1B':
                            		$nombre_curso='Primer Año Básico';
                            		break;
                            case '2B':
                            		$nombre_curso='Segundo Año Básico';
                            		break;
                            case '3B':
                            		$nombre_curso='Tercer Año Básico';
                            		break;
                            case '4B':
                            		$nombre_curso='Cuarto Año Básico';
                            		break;
                            case '5B':
                            		$nombre_curso='Quinto Año Básico';
                            		break;
                            case '6B':
                            		$nombre_curso='Sexto Año Básico';
                            		break;
                            case '7B':
                            		$nombre_curso='Séptimo Año Básico';
                            		break;
                            case '8B':
                            		$nombre_curso='Octavo Año Básico';
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
          
                    echo "<p style='margin-left:30px;font-size:18px' >CURSO: ".$nombre_curso."</p>";
                    echo "<p style='margin-left:30px;font-size:18px' >PRIMER SEMESTRE 2022</p>";
    
            }//END WHILE INTERNO
            }// END IF INTERNO
                
           $contadorprom = 0;
    $num_asignaturas=0;
    echo "<table id='notas' style='margin:auto;border:1;border-collapse:collapse'>";
    echo "<tr style='border:1' ><td style='text-align:center;margin-left:7px;border:1' >Asignatura</td><td style='border:1' >N1</td><td style='border:1' >N2</td><td style='border:1' >N3</td><td style='border:1' >N4</td><td style='border:1' >N5</td><td style='border:1'>N6</td><td style='border:1'>N7</td><td style='border:1'>N8</td><td style='border:1' >N9</td><td style='border:1' >N10</td><td style='border:1'>PROM</td></tr>";
    
    
     $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM lenguaje_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>LENGUAJE Y COMUNICACION</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM matematica_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>MATEMATICAS</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM ciencias_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>CIENCIAS NATURALES</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM tecnologia_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>TECNOLOGIA</td>";
           echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM musica_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>MUSICA</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM fisica_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>EDUCACION FISICA Y SALUD</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM historia_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>HISTORIA Y GEOGRAFIA Y CIENCIAS SOCIALES</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM artes_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>ARTES VISUALES</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];$num_asignaturas=$num_asignaturas+1;}
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM ingles_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>INGLES</td>";
                    echo "<td style='border:1'>".($row['n1'] > 0 ? number_format((round($row['n1'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n2'] > 0 ? number_format((round($row['n2'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n3'] > 0 ? number_format((round($row['n3'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n4'] > 0 ? number_format((round($row['n4'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n5'] > 0 ? number_format((round($row['n5'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n6'] > 0 ? number_format((round($row['n6'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n7'] > 0 ? number_format((round($row['n7'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n8'] > 0 ? number_format((round($row['n8'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n9'] > 0 ? number_format((round($row['n9'])/10),1) : '')."</td>";
        echo "<td style='border:1'>".($row['n10'] > 0 ? number_format((round($row['n10'])/10),1) : '')."</td>";
        echo "<td style='border:1;text-align:center'>".($row['prom'] > 0 ? number_format((round($row['prom'])/10),1) : '')."</td></tr>";
            if ($row['prom'] > 0) {$contadorprom = $contadorprom + $row['prom'];
                                    $num_asignaturas=$num_asignaturas+1;
            }
        }
    
          
    }
    
    $sql_temp ="SELECT  n1, n2 , n3 , n4 , n5 , n6 , n7 , n8 , n9 , n10 , prom FROM religion_2022_p1 WHERE idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
    
         
        while($row = $result_temp->fetch_assoc())
        {
        
            echo "<tr style='border:1'><td style='border:1'>RELIGIÓN</td>";
            echo "<td style='border:1'>".($row['n1'] != '' ? $row['n1'] : '')."</td>";
            echo "<td style='border:1'>".($row['n2'] != '' ? $row['n2'] : '')."</td>";
            echo "<td style='border:1'>".($row['n3'] != '' ? $row['n3'] : '')."</td>";
            echo "<td style='border:1'>".($row['n4'] != '' ? $row['n4'] : '')."</td>";
            echo "<td style='border:1'>".($row['n5'] != '' ? $row['n5'] : '')."</td>";
            echo "<td style='border:1'>".($row['n6'] != '' ? $row['n6'] : '')."</td>";
            echo "<td style='border:1'>".($row['n7'] != '' ? $row['n7'] : '')."</td>";
            echo "<td style='border:1'>".($row['n8']!= '' ? $row['n8'] : '')."</td>";
            echo "<td style='border:1'>".($row['n9'] != '' ? $row['n9'] : '')."</td>";
            echo "<td style='border:1'>".($row['n10'] != '' ? $row['n10'] : '')."</td>";
            echo "<td style='border:1;text-align:center'>".($row['prom'] != 'Na' ? $row['prom'] : '')."</td></tr>";
        }
    
          
    }
    
    if ($contadorprom>0){$contadorprom=round($contadorprom/$num_asignaturas,1);}
    
    echo "</table>";
  
   echo "<div class='txt_prom' style='margin-left:478px'><p> PROMEDIO SEMESTRAL ".number_format(($contadorprom/10),1)." </p></div>";
    //echo "<p>".$_SESSION['nick']."</p></body></html>";
    
    $dias_inasistencia=0;
    $dias_atraso=0;
    $feriados=2;
    
    $sql_temp ="SELECT  idAlumno FROM asistencia_2022 WHERE  idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    if ($result_temp->num_rows > 0) { $dias_inasistencia=$result_temp->num_rows;}
    
    $sql_temp ="SELECT  idAlumno FROM atraso_2022 WHERE  idAlumno = ".$idalumno.";";
    $result_temp = $conexion2->query($sql_temp);
    if ($result_temp->num_rows > 0) { $dias_atraso=$result_temp->num_rows;}
    
    $fecha1 = "1-3-2022";
    $fecha2 = date("d-m-Y",strtotime('today UTC'));
    $contador_dias=0;
    for($i=$fecha1;strtotime($i)<=strtotime($fecha2);$i = date("d-m-Y", strtotime($i."+ 1 days"))){
       $temp= date("w",strtotime($i));
        if(($temp!=0) and ($temp!=6))
       { 
           $contador_dias+=1;
           //echo $i."<br />"; 
       }
    }
    
    //echo $contador_dias." dias transcurridos<br />"; 
    $dias_trabajados=$contador_dias-$dias_inasistencia-$feriados;
    $prom_asistencia = 100-(($dias_inasistencia*100)/$contador_dias);
    $prom_atraso = ($dias_atraso*100)/$contador_dias;
    
    echo "<br><br><p style='margin-left:30px;font-size:18px' ><strong>INFORME DE ASISTENCIA :</strong></p><table style='border:none;margin-left:30px'><tr><td>Días Trabajados: ".$dias_trabajados."</td><td></td>      <td></td></tr><tr><td>Días Inasistentes : ".$dias_inasistencia."</td><td></td><td>      % Asistencia : ".round($prom_asistencia,2)." %</td></tr><tr style='margin-right:20px' ><td style='margin-right:20px' >Días Atrasados : ".$dias_atraso."</td><td></td><td style='margin-right:20px' >     % Atrasos: ".round($prom_atraso,2)." %</td></tr></table>";
    
    echo "<br><br><br>";
    $tobs='S2';
    $obs=($tobs='S1')? 'observacion1':'observacion2';
    
    //cambie 5-7-2018
   // $sql_temp ="SELECT  ".$obs." FROM alumno_2018 WHERE  idAlumno = ".$idalumno.";";
    
        $sql_temp ="SELECT observacion1 FROM alumno_2022 WHERE  idAlumno = ".$idalumno.";";
    
    $result_temp = $conexion2->query($sql_temp);
    
    
    if ($result_temp->num_rows > 0) 
    {
         
        while($row = $result_temp->fetch_assoc())
        {
             //cambie 5-7-2018
            //$obs=($tobs='S1')? $row['observacion1']:$row['observacion2'];
            $obs=$row['observacion1'];
            echo "<p style='margin-left:30px;font-size:18px' ><strong>OBSERVACIONES :</strong></p><p style='display:inline;font-size:12;margin-left:45px;margin-right:45px'>".$obs."</p>";
        }
          
    }
    
    
    echo "<br><br><br><br><br><br>";
    
    switch ( $_SESSION['curso_select']) {
            
             case '1B':
        		$nombre_curso='Jenniffer Camila Muñoz Parra';
        		break;
        case '2B':
        		$nombre_curso='Miriam del Pilar Torres González';
        		break;
        case '3B':
        		$nombre_curso='Camila Javiera Suarez Garrido';
        		break;
        case '4B':
        		$nombre_curso='María Soledad Salazar Cáceres';
        		break;
        case '5B':
        		$nombre_curso='Katherine Cecilia Muñoz Palma';
        		break;
        case '6B':
        		$nombre_curso='Alejandro Antonio Arévalo Rivera';
        		break;
        case '7B':
        		$nombre_curso='Francisca Javiera Paz Godoy';
        		break;
        case '8B':
        		$nombre_curso='Daniela Paz Garrido Parra';
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
    echo "<table id='firma' style='border:none;text-align:center;margin:auto'><tr><td></td><td>____________________________</td><td style='width:100px'></td><td>__________________________</td><td></td></tr><tr><td></td><td>".$nombre_curso."</td><td></td><td>Claudia Garrido Parra</td><td></td></tr><tr><td></td><td>Profesor Jefe</td><td></td><td>Director</td><td></td></tr></table>";
    
    setlocale(LC_TIME,"es_ES");
    setlocale(LC_ALL,"es_ES");
    
    echo "<br><br><br><br><br><p class='txt_fecha'>".utf8_encode(strftime("%A  %d de %B  del  %Y"))."</p>";
        echo "<!-- Fin del cuerpo de la hoja -->";
    echo "</page>"; 

    } // END WHILE PRINCIPAL



    echo "</body></html>";
}//END IF PRINCIPAL

?>
