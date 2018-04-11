
<?
	header('Content-Type: application/json');
 

	$username = "root";
	$password = "";
	$hostname = "localhost";


	$dbhandle = mysql_connect($hostname, $username, $password) 
	or die("No es posible conectarse a MySQL");

	$seleccion = mysql_select_db("phpws") 
	or die("Base de datos no disponible");
	
	


	function mostrar_modelo($detalle){
		//console.log("vamos a mostrar el modelo");
		if($detalle == "lista"){
			
			$resultado = mysql_query("SELECT modelo FROM sensor");

		}else{
			$resultado = mysql_query("SELECT modelo FROM sensor WHERE id=" . $detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosModelos[] = $fila;
			echo $fila;
		}

		return $todosLosModelos; 
	}

	function mostrar_id($detalle){
		
		if($detalle == "lista"){
			$resultado = mysql_query("SELECT id FROM sensor");
		}else{
			$resultado = mysql_query("SELECT id FROM sensor WHERE id=" . $detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosID[] = $fila;
		}

		return $todosLosID; 
	}


	if( $_GET['peticion'] == 'modelo'){

		$resultados = mostrar_modelo($_GET['detalle'] );

	}else if($_GET['peticion'] == 'id'){
		 
		 $resultados = mostrar_id( $_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>