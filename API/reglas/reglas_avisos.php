
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
		$resultado ;
		if($detalle == "lista"){
			$resultado = mysql_query("SELECT idactivador FROM reglaaviso");
		}else{
			$resultado = mysql_query("SELECT idactivador FROM reglaav WHERE tipoactivador=".$detalle);
			
		}

		
		$todosLosID =[];
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
			
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosModelos[] = $fila;
			//echo $fila;
		}

		return $todosLosModelos; 
	}

	function obtener_medidas($detalle){
		if($detalle == "lista"){
			
			$resultado = mysql_query(" SELECT fecha_creada,periodicidad_incidencia,secuencial,estado,email FROM reglaaviso ");

		}else{
			$resultado = mysql_query("SELECT fecha_creada,periodicidad_incidencia,secuencial,estado,email FROM reglaaviso WHERE email='".$detalle."'");
			
		}
	}

	if( $_GET['peticion'] == 'avisos'){
		//echo "hola";
		$resultados = mostrar_avisos($_GET['detalle'] );

	}
	if( $_GET['peticion'] == 'medidas'){

		$resultados = obtener_medidas($_GET['detalle'] );

	}
	if($_GET['peticion'] == 'activacion'){

		 $resultados = mostrar_activacion( $_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>