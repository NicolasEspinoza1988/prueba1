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
        <link rel="stylesheet" type="text/css" href="css/CSScalificaciones.css">
        <script src="js/JSinforme.js"></script>
    </head>
    <body id='informe_sec '>
        <header>
            <div class="contenedor">
            <a href="portada.php"><img class ="flotante"src="img/logoPNG.png" alt="Logo SGS La Florida" height="42" width="200"></a>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                    <a href="calificaciones.php">Calificaciones</a> 
                    <a href="asistencia.php">Asistencia</a> 
                    <a href="calendario.php">Calendario</a> 
                    <a href="observaciones.php">Observaciones</a> 
                    <a href="informe.php">Informes</a>
            </nav>
            </div>
        </header>
        <main >
            <section id="sn_informe">
            <div class="contenedor" id="sn_informe_cont">
              
                <h2>Informes</h2>
                <p class='informe' >Bienvenido al sistema de informes del colegio !!!<br><br></p>
                <form id="forminforme" action="php/pdf/pdf_blanco_test.php" method="post" >
                <p class='informe' >Seleccione el curso: </p>
                <select id="cal_select" name='curso_select' onchange="actualizar_alumnos(this.value)" required >
                  <option value="" selected="selected" >Seleccione un curso ...</option>
				  <option value="1B">Primero Básico</option>
				  <option value="2B">Segundo Básico</option>
				  <option value="3B">Tercero Básico</option>
				  <option value="4B">Cuarto Básico</option>
				  <option value="5B">Quinto Básico</option>
				  <option value="6B">Sexto Básico</option>
				  <option value="7B">Septimo Básico</option>
				  <option value="8B">Octavo Básico</option>
				</select>

                <p class='informe' >Seleccione el Semestre: </p>
                <select id="semestre_select" name='semestre_select' onchange="">
                  <option value="S1">Primer Semestre</option>
                  <option value="S2">Segundo Semestre</option>
               </select>
                
             <input type="submit" name='actualizar' value="ACTUALIZAR">
                </form> 

            </div>
            </section>

        </main>

        <footer>
            <div class="contenedor">
                <p class="copy">Colegio Saint Germaine La Florida 2018 &copy;</p>
                <div class="sociales">
                    <a class="icon-facebook-official" href="#"></a>
                </div>
            </div>
        </footer>
    </body>
</html>
<?php
echo "<script >document.getElementById('cal_select').value='';document.getElementById('alumno_select').value='';</script>";
?>