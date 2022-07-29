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
        <link rel="stylesheet" type="text/css" href="css/CSScalendario.css">
        <script src="js/JScalendario.js"></script>
    </head>
    <body>
        <header>
            <?php
                 include('banner_sitio.php');
            ?>
        </header>
        <main >
            <section id="sn_calendario">
                <div class="contenedor" id="sn_caledndario_cont" >
                  
                    <h2>Calendario</h2>
                    <p>Bienvenido al sistema de reserva del laboratorio de Computacion !!!<br><br></p>
                        <form id="formcalendario" action="mostrar_calendario.php" method="post" >
                                   
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