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
        <link rel="stylesheet" type="text/css" href="css/CSSobservaciones.css">
        <script src="js/JSobservaciones.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>
        <main >
            <section id="sn_observaciones">
                <div class="contenedor" id="sn_observaciones_cont" >
                  
                    <h2>Observaciones</h2>
                    <p><br><br></p>
                        <form id="formbservaciones" action="mostrar_observaciones2.php" method="post" >
                                    <p>Seleccione el curso: </p>
                                    <select id="curso_select_obs" name="curso_select_obs" onchange="">
                                      <option value="1B">Primero Básico</option>
                    				  <option value="2B">Segundo Básico</option>
                    				  <option value="3B">Tercero Básico</option>
                    				  <option value="4B">Cuarto Básico</option>
                    				  <option value="5B">Quinto Básico</option>
                    				  <option value="6B">Sexto Básico</option>
                    				  <option value="7B">Septimo Básico</option>
                    				  <option value="8B">Octavo Básico</option>
                    				</select>

                             <input type="submit" name='actualizar' value="Ingresar">
                    </form>
                </div>
            </section>
        </main>
        <?php include('footer_1.php'); ?>
    </body>
</html>