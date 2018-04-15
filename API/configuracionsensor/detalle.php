
<?
	header('Content-Type: application/json');
 

	$username = "root";
	$password = "";
	$hostname = "localhost";


	$dbhandle = mysql_connect($hostname, $username, $password) 
	or die("No es posible conectarse a MySQL");

	$seleccion = mysql_select_db("emecubo") 
	or die("Base de datos no disponible");
	
	


	

	function mostrar_id($detalle){
		
		if($detalle == "lista"){
			$resultado = mysql_query("SELECT tipo,id,marca,canal,tipo_comunicacion,formato_integracion,canal,estado,potencia_soportada,id_zona FROM sensor");
		}else{
			$resultado = mysql_query("SELECT tipo,id,marca,canal FROM sensor WHERE id=" . $detalle);
			//$resultado = mysql_query("SELECT tipo,id,modelo,marca,canal FROM sensor WHERE id=" . $detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosID[] = $fila;
		}

		return $todosLosID; 
	}

	function mostrar_sensor($detalle){
		if($detalle == "lista"){
			
			$resultado = mysql_query(" SELECT id,marca,canal,tipo_comunicacion,formato_integracion,canal,estado,potencia_soportada FROM sensor ");

		}else{
			$resultado = mysql_query("SELECT id,marca,canal,tipo_comunicacion,formato_integracion,canal,estado,potencia_soportada FROM sensor WHERE id='".$detalle."'");
			//$resultado = mysql_query("SELECT marca FROM sensor WHERE id=".$detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosModelos[] = $fila;
			//echo $fila;
		}

		return $todosLosModelos; 
	}

	if( $_GET['peticion'] == 'idSensor'){

		$resultados = mostrar_sensor($_GET['detalle'] );

	}else if($_GET['peticion'] == 'ids'){

		 $resultados = mostrar_id( $_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>