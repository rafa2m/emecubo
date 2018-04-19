<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Emecubo - Micro estación Metereológica Móvil</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col">
			

			<?
				$url = 'http://localhost/EMECUBO/API/sensor/dht22.php';

				$JSON = file_get_contents($url);

				$datos = json_decode($JSON);

				echo "<h2>Sensor </h2>";
				echo "<ul>";
				echo "<li>id =>  ".$datos->id."</li>";
				echo "<li>tipo => ".$datos->tipo."</li>";
				echo "<li>marca => ".$datos->marca."</li>";
				echo "<li>modelo => ".$datos->modelo."</li>";
				echo "<li>observacion => ".$datos->observacion."</li>";
				echo "<li>tipo_comunicacion => ".$datos->tipo_comunicacion."</li>";
				echo "<li>formato_integracion => ".$datos->formato_integracion."</li>";
				echo "<li>canal => ".$datos->canal."</li>";
				echo "<li>estado => ".$datos->estado."</li>";
				echo "<li>potencia_soportada => ".$datos->potencia_soportada."</li>";
				echo "<li>id_zona => ".$datos->id_zona."</li>";
				echo "</ul>";

				$nombresURL= "http://localhost/EMECUBO/API/medidas/nombres";
				$tiposMedidasURL= "http://localhost/EMECUBO/API/medidas/lista";

				$nombresJSON = file_get_contents($nombresURL);
				$tiposMedidasJSON = file_get_contents($tiposMedidasURL);
				
				$nombres = json_decode($nombresJSON);
				$tiposMedidas = json_decode($tiposMedidasJSON);

				echo '<h1>Tipos de medidas</h1>';
				
				echo '<ul>';
				foreach ($nombres as $nombre) {
					echo  "<li>".$nombre."</li>";
				}
				echo '</ul>';


				echo '<h2>Nombres de sensores</h2>';
				echo "<ul>";
				foreach ($tiposMedidas as $tiposMedida) {
					echo "<li>-> ".$tiposMedida."</li>";
				}
				echo "</ul>";


			?>

			<!-- <form action="API/medidas/sensor/nuevo" method="POST">
				<!-- 
				id					"SMD1"
				marca				"SMD BR"
				canal				"4"
				tipo_comunicacion	"1"
				formato_integracion	null
				estado				"1"
				potencia_soportada	"3-5.5V"
				 -->


				<!-- <h1> Registrar sensores </h1>

				<p><label> Sensor ID</label>
				<input type="text" name="sensorID"></p>
	
				<p><label> Marca</label>
				<input type="text" name="marca"></p>
				<p><label> Canal</label>
				<input type="text" name="canal"></p>
				<p><label> Tipo de comunicación</label>
				<input type="text" name="tipo_comunicacion"></p>
				<p><label> Formato Integracion</label>
				<input type="text" name="formato_integracion"></p>
				<p><label> Estado</label>
				<input type="text" name="estado"></p>
				<p><label> Potencia soportada</label>
				<input type="text" name="potencia_soportada"></p>


				
				<input type="submit" value="enviar" >
	
			</form>	 --> 
			<form action="API/medidas/sensor/nuevo" method="POST">
				<!-- 
				fecha_medida,nombre,fechaconfigsensor,idsensor,tiposensor,marcasensor,modelosensor,idestacion,valor
				 -->

				 <!-- INSERT INTO `medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('2018-04-19 00:00:00', 'sensor de prueba 1', '2018-04-19 00:00:00', 'sp1', '1', 'marca de prueba', 'modelo de prueba', 'est1', '29'); -->
				<h1> Registrar medida de sensor </h1>

				<p><label> fecha_medida</label>
				<input type="datetime-local" name="fecha_medida"></p>
	
				<p><label> nombre</label>
				<input type="text" name="nombre"></p>

				<p><label> fecha config sensor</label>
				<input type="datetime-local" name="fechaconfigsensor"></p>

				<p><label> idsensor </label>
				<input type="text" name="idsensor"></p>

				<p><label> tipo sensor</label>
				<input type="text" name="tiposensor"></p>

				<p><label> marca sensor</label>
				<input type="text" name="marcasensor"></p>

				<p><label> modelo sensor</label>
				<input type="text" name="modelosensor"></p>

				<p><label> id estacion</label>
				<input type="text" name="id estacion"></p>

				<p><label> valor</label>
				<input type="text" name="valor"></p>

				
				<input type="submit" value="registrar dato" />
	
			</form>	

			<div class="alert alert-success alert-dismissable fade " role="alert">
			  <strong>Inserción realizada!!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
		</div>
	</div>
</div>	
</body>
</html>