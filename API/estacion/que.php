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
    $recogido = $_REQUEST['estacionID'];
    if($_REQUEST['estacionID']=='lista'){
      	$res = $mysqli->query("SELECT * FROM estacion");
        while($row = $res->fetch_object()){
    		$todosLasEstaciones[] = $row;
        }
    }
    if ($_REQUEST['estacionID']!=null){
        
        $res = $mysqli->query("SELECT * FROM estacion Where id='".$recogido."'");
		if ($mysqli->query("SELECT * FROM estacion Where id='".$recogido."'")){
            while($row = $res->fetch_object()){
                $todosLasEstaciones[] = $row;
            }
        }else {
                echo "errorrr";
            }
    }
    
    echo json_encode( $todosLasEstaciones );

$mysqli->close();

?>
