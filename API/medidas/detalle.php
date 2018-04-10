<?
 
	header('Content-Type: application/json');
	
	// obtener datos de medidas
	
	// consultar medidas de sensores

	// registrar medidas de sensores
	
	//print_r($_GET);

	function mostrar_tipos_sensores(){

			$tipos = array('termohidrgrómetro','anemoveleta','pluviometro','barometro');

		return $tipos;
	}


	function mostrar_nombres_sensores(){

			$nombres = array('dht22','anemoveleta','WH-SP-RG','lecrow GY-68 BMP180');

		return $nombres;
	}

	if( $_GET['solicitud'] == 'lista'){

		$resultados = mostrar_tipos_sensores();

	}else if($_GET['solicitud'] == 'nombres'){

		 $resultados = mostrar_nombres_sensores();

	}else{

		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );


?>