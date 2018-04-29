
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

	function mostrar_sensor($detalle){
		if($detalle == "lista"){
			
			$resultado = mysql_query(" SELECT  idsensor  FROM medidasensor ");

		}else{
			$resultado = mysql_query("SELECT nombre FROM medidasensor WHERE idsensor='".$detalle."'");
			//$resultado = mysql_query("SELECT marca FROM sensor WHERE id=".$detalle);
		}

		
 
		while ($fila = mysql_fetch_array($resultado)) {
			$todosLosModelos[] = $fila;
			//echo $fila;
		}

		return $todosLosModelos; 
	}

	function guardar_datos_sensor(){

		mysql_query("INSERT INTO medidasensor (fecha_medida,nombre,fechaconfigsensor,idsensor,tiposensor,marcasensor,modelosensor,idestacion,valor) 
			VALUES ('".$_POST['fecha_medida']."', '".$_POST['nombre']."','".$_POST['fechaconfigsensor']."','".$_POST['idsensor']."','".$_POST['tiposensor']."','".$_POST['marcasensor']."','".$_POST['modelosensor']."','".$_POST['idestacion']."','".$_POST['valor']."')");
		//INSERT INTO `medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('2018-04-19 00:00:00', 'sensor de prueba 1', '2018-04-19 00:00:00', 'sp1', '1', 'marca de prueba', 'modelo de prueba', 'est1', '29');

		header('Location: ../../../');

		exit;
	}
	if( $_GET['peticion'] == 'sensor'){
		if( $_GET['detalle'] == 'nuevo'){
			guardar_datos_sensor();
		}

	}	 

	if( $_GET['peticion'] == 'sensores'){

		$resultados = mostrar_sensor($_GET['detalle'] );

	}else{
		 
		header('HTTP/1.1 405 Method Not Allowed');
		exit;

	}

	echo json_encode( $resultados );

?>