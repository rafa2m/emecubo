<?php

//header('Content-Type: application/json;charset=utf-8');

/*
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbname = "db732013555";
	*/
	$username = "dbo732013555";
	$password = "Pa56word";
	$hostname = "db732013555.db.1and1.com";
	$dbname = "db732013555";
	//Creas una variable de tipo objeto mysqli con los datos de la bd y el charset que quieras
	$mysqli = new mysqli($hostname, $username, $password, $dbname);
	$mysqli->set_charset("utf8");
    
    /* comprobar la conexión */
    $date1 = date("Y-m-d H:i:s"); 
    //echo $date1;

    $recogido = $_REQUEST['idestacion'];
    echo "------------------<br>";
    echo $estacion = $_GET['idestacion']."<br>";
    echo $nombre = $_GET['nombre']."<br>";
    echo $fechaconfigsensor = $_GET['fechaconfigsensor']."<br>";
    echo $idsensor = $_GET['idsensor']."<br>";
    echo $tiposensor = $_GET['tiposensor']."<br>";
    echo $marcasensor = $_GET['marcasensor']."<br>";
    echo $modelosensor = $_GET['modelosensor']."<br>";
    echo $valor = $_GET['valor'];



//    idestacion=$1&nombre=$2&fechaconfigsensor=$3&idsensor=$4&tiposensor=$5&marcasensor=$6&modelosensor=$7&valor=$8

   /*  $insertar = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
    VALUES ('2018-04-30 00:00:00', 'sa1', '2018-04-15 00:00:00', 'AN1', '2', 'ANEMO KMS', 'MODELO - 1 ', 'STC1', '20');"; */
    if(isset($_GET['idsensor'])){
        
       echo "hola";
        
    }

    //else primero     
    else {

        echo "errrooRRR!!!";
    }
    //}// cierre si existe sensores
    
    
    
    //echo json_encode( $todosLasEstaciones );

$mysqli->close();

?>
