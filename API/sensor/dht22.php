<?
 
	header('Content-Type: application/json');

	function mostrar_datos_sensor(){

			$sensor = array(
				"id"=>"sensor DHT22",
				"tipo"=>"Sensor de humedad",// es un bigint 
				"marca"=>"RoarKit",
				"modelo"=>"AM2302",
				"observacion"=>"Con agujeros de tornillo fijos, instalación y fijación convenientes. Diámetro de 2.6mm",
				"tipo_comunicacion"=>"Sensor analógico",
				"formato_integracion"=>"5",// es un entero 
				"canal"=>"1",// es un entero 
				"estado"=>"1",// es un entero 
				"potencia_soportada"=>"3v - 5.5V",
				"id_zona"=>"zona A"
			);

		return $sensor;
	}

	echo json_encode( mostrar_datos_sensor());



?>