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
        <title>:: Colegio Saint Germain Intranet - Asistencia ::</title>
        <meta charset="UTF-8">
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
        <main >
            <section id="sn_asistencia">
            <div class="contenedor" id="sn_asist_ver_cont">
            <form  action="mostrar_asistencia.php" method="post" >
                <h2>Asistencia</h2>
                <p>Bienvenido al sistema de asistencia del colegio !!!<br><br></p>
                <p>Seleccione el curso: </p>
                <select id="select_curso" name="select_curso" onchange="">
                  <option value="PKA">Pre-Kinder A</option>
				  <option value="PKB">Pre-Kinder B</option>
				  <option value="KA">Kinder A</option>
				  <option value="KB">Kinder B</option>
                  <option value="1B">Primero Básico</option>
                  <option value="2B">Segundo Básico</option>
                  <option value="3B">Tercero Básico</option>
                  <option value="4B">Cuarto Básico</option>
                  <option value="5B">Quinto Básico</option>
                  <option value="6B">Sexto Básico</option>
                  <option value="7B">Septimo Básico</option>
                  <option value="8B">Octavo Básico</option>
                </select> 

                 <select id="select_mes" name="select_mes" onchange="">
                  <option value="enero">Enero</option>
                  <option value="febrero">Febrero</option>
                  <option value="marzo">Marzo</option>
                  <option value="abril">Abril</option>
                  <option value="mayo">Mayo</option>
                  <option value="junio">Junio</option>
                  <option value="julio">Julio</option>
                  <option value="agosto">Agosto</option>
                  <option value="septiembre">Septiembre</option>
                  <option value="octubre">Octubre</option>
                  <option value="noviembre">Noviembre</option>
                  <option value="diciembre">Diciembre</option>
                </select> 
              <input type="submit" name='actualizar' value="ACTUALIZAR">

            </form>              
                
            </div>
            </section>

        </main>
<?php include('footer_1.php'); ?>
    </body>
</html>