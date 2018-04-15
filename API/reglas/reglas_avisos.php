
<?
	header('Content-Type: application/json');
 

	$username = "root";
	$password = "";
	$hostname = "localhost";


	$dbhandle = mysql_connect($hostname, $username, $password) 
	or die("No es posible conectarse a MySQL");

	$seleccion = mysql_select_db("emecubo") 
	or die("Base de datos no disponible");
	
	


	

	function mostrar_activacion($detalle){
		
		if($detalle == "lista"){
			$resultado = mysql_query("SELECT idactivador FROM reglaactivacion");
		}else{
			$resultado = mysql_query("SELECT idactivador FROM reglaactivacion WHERE tipoactivador=".$detalle;
			//$resultado = mysql_query("SELECT tipo,id,modelo,marca,canal FROM sensor WHERE id=" . $detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosID[] = $fila;
		}

		return $todosLosID; 
	}

	function mostrar_avisos($detalle){
		if($detalle == "lista"){
			
			$resultado = mysql_query(" SELECT fecha_creada,periodicidad_incidencia,secuencial,estado,email FROM reglaaviso ");

		}else{
			$resultado = mysql_query("SELECT fecha_creada,periodicidad_incidencia,secuencial,estado,email FROM reglaaviso WHERE email='".$detalle."'");
			//$resultado = mysql_query("SELECT marca FROM sensor WHERE id=".$detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosModelos[] = $fila;
			//echo $fila;
		}

		return $todosLosModelos; 
	}

	if( $_GET['peticion'] == 'avisos'){

		$resultados = mostrar_avisos($_GET['detalle'] );

	}else if($_GET['peticion'] == 'activacion'){

		 $resultados = mostrar_activacion( $_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>