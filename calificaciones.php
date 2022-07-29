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
        <script src="js/JScalificaciones.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>
        <main >
            <section id="sn_calificaciones">
            <div class="contenedor" id="sn_calificaciones_cont">
                <h2>Calificaciones</h2>
                <form id="formCalificaciones" action="mostrar_calificaciones.php" method="post" >
                <p>Seleccione el curso: </p>
                <select id="cal_select" name='curso_select' onchange="">
				  <option value="1B">Primero Básico</option>
				  <option value="2B">Segundo Básico</option>
				  <option value="3B">Tercero Básico</option>
				  <option value="4B">Cuarto Básico</option>
				  <option value="5B">Quinto Básico</option>
				  <option value="6B">Sexto Básico</option>
				  <option value="7B">Septimo Básico</option>
				  <option value="8B">Octavo Básico</option>
				</select>

                <p>Seleccione la Asignatura: </p>
                <select id="asig_select" name='asig_select' onchange="">
                  <option value="lenguaje">Lenguaje & Comunicaci&oacute;n</option>
                  <option value="matematica">Matem&aacute;ticas</option>
                  <option value="ingles">Ingl&eacute;s</option>
                  <option value="historia">Historia & geograf&iacute;a</option>
                  <option value="ciencias">Ciencias Naturales</option>
                  <option value="tecnologia">Tecnolog&iacute;a</option>
                  <option value="artes">Artes Visuales</option>
                  <option value="musica">M&uacute;sica</option>
                  <option value="fisica">Educaci&oacute;n F&iacute;sica & Salud</option>
                  <option value="religion">Religi&oacute;n</option>
                </select>
                <p>Seleccione el Semestre: </p>
                <select id="semestre_select" name='semestre_select' onchange="">
                  <option value="p1">Primer Semestre</option>
                  <option value="p2">Segundo Semestre</option>
               </select>
                
             <input type="submit" name='actualizar' value="ACTUALIZAR">
                </form> 
            </div>
            </section>
        </main>
        <?php include('footer_1.php'); ?>
    </body>
</html>