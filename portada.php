<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
    <head> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSSportada.css">
    </head>
    <body>
        <header>
            <a class="logo_user" href="portada.php"><img class ="flotante"src="img/logoPNG.png" alt="Logo SGS La Florida" height="42" width="200"></a>
            <a class="name_user"><?php echo "Bienvenid@ ".ucfirst($_SESSION['nick']); ?></a>  
        </header>
        <main >
            <div class="contenedor" id="">
               <?php
               
               if($seguridad->acceso_calificaciones()){
                   echo "<p>Sección Calificaciones</p>";
                   echo "<ul><li><a href='calificaciones.php'>Ingresar Calificaciones</a></li><li> <a href='nombrarCalificaciones.php'>Establecer Nombres Pruebas</a></li></ul>";
               }
                
                
               if($seguridad->acceso_asistencia()){
                    echo "<p>Sección Asistencias</p>";
                    echo "<ul><li><a href='asistencia.php'>Ingresar Inasistencia</a></li><li><a href='atraso.php'>Ingresar Atrasos</a></li></ul>";
               }
               
               if($seguridad->acceso_calendario()){
                    echo "<p>Sección Calendario</p>";
                    echo "<ul><li><a href='calendario.php'>Reservar Sala Computación</a></li></ul>"; 
               }
                
               
               if($seguridad->acceso_observaciones()){
                    echo "<p>Sección Observaciones</p>";
                    echo "<ul><li><a href='observaciones.php'>Ingresar Observación</a></li></ul>";    
               } 
               
               if($seguridad->acceso_informes()){
                    echo "<p>Sección Informes</p>";
                    echo "<ul><li><a href='informe.php'>Informe de Notas Individual </a></li><li><a href='informe_test.php'>Informe de Notas Por Curso </a></li></ul>";    
               } 
               
               ?>

              </div>
        </main>
         <?php include('footer_1.php'); ?>
    </body>
</html>