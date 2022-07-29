<?php
include('seguridad.php');
$seguridad= new Seguridad();

if ($seguridad->getUsuario()==null){
    header('Location: index.php');
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp"> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSSevento.css">
        
    </head>
    <body>
        <header>
            <div class="contenedor">
              <img class ="flotante"src="img/logoPNG.png" alt="Logo SGS La Florida" height="42" width="200">
              </div>
        </header>
        <form id='formEvento' action='registro_evento.php' method='post' >
           	<fieldset>
			<legend>::: Ingresar Evento :::</legend>
			<label for="ntitulo">Titulo:</label>
			<input id="ntitulo" type="text" name="ntitulo" value="" autocomplete="on" maxlength="20" autofocus required>
			<label for="ncontenido">Contenido:</label>
			<textarea id="ncontenido" name="ncontenido" rows="4" cols="50"></textarea>
			
	          <p>Seleccione el curso: </p>
                <select id="cale_select" name='cale_select' onchange="">
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

				<p>Seleccione el curso: </p>
                <select id="periodo_select" name='periodo_select' onchange="" required>
                  <option id="0" value="">Selecciona el bloque..</option>
				  <option id="1P" value="1P">1º BLOQUE (8:00 AM - 9:30 AM)</option>
				  <option id="2P" value="2P">2º BLOQUE (9:45 AM - 11:15 AM)</option>
				  <option id="3P" value="3P">3º BLOQUE (11:30 AM - 13:00 PM)</option>
				  <option id="4P" value="4P">4º BLOQUE (14:00 PM - 15:30 PM)</option>
				  <option id="5P" value="5P">5º BLOQUE (15:45 PM - 17:15 PM)</option>
				  <option id="6P" value="6P">6º BLOQUE (17:30 PM - 19:00 PM)</option>
				</select>

				<input type="submit" value="Ingresar">
				<?php
				echo "<input id='dia' type='text' name='ndia' value='".$_REQUEST['dia']."'>";
				echo "<input id='mes' type='text' name='nmes' value='".$_REQUEST['mes']."' >";
				?>
    
			</fieldset>
		</form> 
		<?php
				echo "<input id='dia' type='text' name='ndia' value='".$_REQUEST['dia']."'>";
				echo "<input id='mes' type='text' name='nmes' value='".$_REQUEST['mes']."' >";

				$host_db = "localhost";
            	$user_db = "csg39721_1";
            	$pass_db = "passUser";
            	$db_name = "csg39721_test";
        
            	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            	if ($conexion->connect_error) {
             		die("La conexion falló: " . $conexion->connect_error);
            	}

			$sql ="SELECT codigobloque FROM evento WHERE mes=".$_REQUEST['mes']." AND dia=".$_REQUEST['dia'].";";
				$result = $conexion->query($sql);

				echo "<script>";
				if ($result->num_rows > 0) 
				{
    				
    				while($row = $result->fetch_assoc())
					    {
					    	echo "document.getElementById('".$row['codigobloque']."').style.display='none';";
					    }
					  		
      			}
	            echo "</script>";
?>
	</body>
</html>
