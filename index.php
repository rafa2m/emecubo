<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

<?
	$url = 'http://emecubo.extremepromotionsproject.xyz/API/sensor/dht22.php';

	$JSON = file_get_contents($url);

	$datos = json_decode($JSON);

	echo "<h2>Sensor </h2>";
	echo "id =>  ".$datos->id."<br>";
	echo "tipo => ".$datos->tipo."<br>";
	echo "marca => ".$datos->marca."<br>";
	echo "modelo => ".$datos->modelo."<br>";
	echo "observacion => ".$datos->observacion."<br>";
	echo "tipo_comunicacion => ".$datos->tipo_comunicacion."<br>";
	echo "formato_integracion => ".$datos->formato_integracion."<br>";
	echo "canal => ".$datos->canal."<br>";
	echo "estado => ".$datos->estado."<br>";
	echo "potencia_soportada => ".$datos->potencia_soportada."<br>";



	$nombresURL= "http://emecubo.extremepromotionsproject.xyz/API/medidas/nombres";
	$tiposMedidasURL= "http://emecubo.extremepromotionsproject.xyz/API/medidas/lista";

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

	foreach ($tiposMedidas as $tiposMedida) {
		echo "-> ".$tiposMedida."<br>";
	}


?>

</body>
</html>
