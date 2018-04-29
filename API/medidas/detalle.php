
<?
	header('Content-Type: application/json');
 

	$username = "root";
	$password = "";
	$hostname = "localhost";


	$dbhandle = mysql_connect($hostname, $username, $password) 
	or die("No es posible conectarse a MySQL");

	$seleccion = mysql_select_db("emecubo") 
	or die("Base de datos no disponible");
	
	

	header('Content-Type: application/json');
 
	// function mostrar_datos_sensor(){

	// 	$sensor = array(
	// 		"id"=>"sensor DHT22",
	// 		"tipo"=>"Sensor de humedad",// es un bigint 
	// 		"marca"=>"RoarKit",
	// 		"modelo"=>"AM2302",
	// 		"observacion"=>"Con agujeros de tornillo fijos, instalación y fijación convenientes. Diámetro de 2.6mm",
	// 		"tipo_comunicacion"=>"Sensor analógico",
	// 		"formato_integracion"=>"5",// es un entero 
	// 		"canal"=>"1",// es un entero 
	// 		"estado"=>"1",// es un entero 
	// 		"potencia_soportada"=>"3v - 5.5V",
	// 		"id_zona"=>"zona A"
	// 	);

	// 	return $sensor;
	// }
	// echo json_encode( mostrar_datos_sensor());
	
	

	function mostrar($detalle){
		
		if($detalle == "lista"){
			$resultado = mysql_query("SELECT tipo,id,marca,canal,tipo_comunicacion,formato_integracion,canal,estado,potencia_soportada FROM sensor");
		}else{
			$resultado = mysql_query("SELECT tipo,id,marca,canal FROM sensor WHERE id=" . $detalle);
			//$resultado = mysql_query("SELECT tipo,id,modelo,marca,canal FROM sensor WHERE id=" . $detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosID[] = $fila;
		}

		return $todosLosID; 
	}

	

	if( $_GET['peticion'] == 'hola'){

		$resultados = mostrar($_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>