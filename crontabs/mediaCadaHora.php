<?php 

	include "../conexion.php";
		//$consulta = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";
	//$consulta= "SELECT avg(valor) from medidasensor where HOUR(fecha_medida) > now()-1 and nombre='H'";
	$consulta= "SELECT avg(valor) from medidasensor where fecha_medida between fech_min and fecha_max and nombre='H'";
	//fecha = new Date("Y-m-d H:i:s");
	$hora = date('H');
	$dia= date('d');
	$mes = date('m');
	$ano = date('Y');


	if($hora==0){
		$fecha_inicio = $ano . '-'. $mes . '-'. $dia . ' ' . '22:00:00';
		$fecha_fin = $ano . '-'. $mes . '-'. $dia . ' ' . '23:00:00';

	} else if($hora == 1){
		$fecha_inicio = $ano . '-'. $mes . '-'. $dia . ' ' . '23:00:00';
		$fecha_fin = $ano . '-'. $mes . '-'. $dia . ' ' . '00:00:00';
	} else {
		$fecha_inicio = $ano . '-'. $mes . '-'. $dia . ' ' . $hora-2 . ':00:00';
		$fecha_fin = $ano . '-'. $mes . '-'. $dia . ' ' . $hora-1 . ':00:00';
	}

	


	if ($resultado = $mysqli->query($consulta)) {

	    /* obtener el array de objetos */
	    while ($fila = $resultado->fetch_row()) {
	        //printf ("%s \n", $fila[0]);
	        $media= $fila[0];

	    }


	    /* liberar el conjunto de resultados */
	    $resultado->close();
	}
	
	$hora= date ("h")-2;
	echo $media."<br>";
    echo  $hora."<br>";
    $sql="DELETE FROM medida_sensor
            WHERE  fecha_medida between fech_min and fecha_max and ";
    $result_cont = mysqli_query($mysqli,$sql) or die( mysqli_error($mysqli));

	$sql= "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES ('2018-06-15 ".$hora.":00:00', 'H', '2018-05-20 12:47:00', 'TH1h', '5', 'Aosong', 'DHT22', 'STC1', '".$media."');";

	//capturamos si hubiera algún error
    $result_cont = mysqli_query($mysqli,$sql) or die( mysqli_error($mysqli));
    //echo $result_cont;

    if ($result_cont == 1){
   	 echo "New record created successfully";
	} else {
	    echo "Error: " . $consulta . "<br>" . $mysqli->error;
	}
		
	/* cerrar la conexión */
	$mysqli->close();
	
	// //$sql = "SELECT * FROM usuarios WHERE email like '".$email."' AND password like '".$password."'";
	// //$sql = 'SELECT * FROM usuarios WHERE email like "'.$email.'" AND password like "'.$passwordUsuario.'"';
	// //echo "sql =>" . $sql;
	// $consulta = mysqli_query ($mysqli,$sql) or die(mysql_error());

	// //$numrow=mysqli_num_rows($consulta);


	// if ($resultado = mysqli_query($mysqli, $sql)) {

	//     /* obtener array asociativo */
	//     while ($row = mysqli_fetch_assoc($resultado)) {
	//         printf ("%s (%s)\n", $row["fecha_medida"], $row["valor"]);
	//     }

	//     /* liberar el conjunto de resultados */
	//     mysqli_free_result($resultado);
	// }
	


 ?>