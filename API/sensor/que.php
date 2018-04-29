<?php

header('Content-Type: application/json');

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
	/* Crear una tabla que no devuelve un conjunto de resultados */

    //echo $_REQUEST['sensorID'];
    $recogido = $_REQUEST['sensorID'];
    if($_REQUEST['sensorID']=='lista'){
      	$res = $mysqli->query("SELECT * FROM sensor");
        while($row = $res->fetch_object()){
    		$todosLosSensores[] = $row;
            //echo $row->tipo;
            //echo $row->attType;
            //echo $row->attOptions;

        }
    }
    if ($_REQUEST['sensorID']!=null){
        //echo "hola caracola => ".$_GET['sensorID'];
         $res = $mysqli->query("SELECT * FROM sensor Where id='".$recogido."'");
				 if ($mysqli->query("SELECT * FROM sensor Where id='".$recogido."'")){
         while($row = $res->fetch_object()){
      	 	  $todosLosSensores[] = $row;
            }
         }else {
            echo "errorrr";
         }
    }
    //echo $_GET['sensorID'];
    echo json_encode( $todosLosSensores );

$mysqli->close();

?>
