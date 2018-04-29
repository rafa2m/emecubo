<?php

header('Content-Type: application/json;charset=utf-8');

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
    $recogido = $_REQUEST['medidas'];

    if($_REQUEST['medidas']=='lista'){

        if(isset($_GET['de'])){
            
            if($_GET['de']=='sensores'){
                // http://emecubo.extremepromotionsproject.xyz/API/obtener/lista/sensores    
                $res = $mysqli->query("SELECT T2.id as Estacion_ID, T1.id, T1.tipo, T1.marca
                FROM sensor T1 INNER JOIN estacion T2 ON T1.idestacion = T2.id");
                
                while($row = $res->fetch_object()){
                    $todosLasEstaciones[] = $row;
                }
            }

            
            if($_GET['de']=='estaciones'){
            // http://emecubo.extremepromotionsproject.xyz/API/obtener/lista/estaciones    
                $res = $mysqli->query("SELECT * FROM estacion");
                // SELECT T1.id, T1.tipo, T1.marca
                // FROM sensor T1 INNER JOIN estacion T2 ON T1.idestacion = T2.id
                while($row = $res->fetch_object()){
                    $todosLasEstaciones[] = $row;
                }
            }
        }
    }    
    if($_REQUEST['medidas']=='sensor'){
           
            if(isset($_GET['de'])){
                if($_GET['de']=='th2'){
                     //echo "aaaaaaaaa";
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/sensor/th2    
                    $res = $mysqli->query("SELECT T2.fechahora as Configuracion_activa, T1.id, T1.tipo, T1.marca
                    FROM sensor T1 INNER JOIN configuracionsensor T2 ON T1.id = T2.id  ");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                }
            }

        
            
    }
    //else primero     
    else {

        echo "errrooRRR!!!";
    }
    //}// cierre si existe sensores
    
    // if ($_REQUEST['medidas']!=null){
        
    //     $res = $mysqli->query("SELECT * FROM estacion");
	// 	if ($mysqli->query("SELECT * FROM estacion Where id='".$recogido."'")){
    //         while($row = $res->fetch_object()){
    //             $todosLasEstaciones[] = $row;
    //         }
    //     }else {
    //             echo "errorrr";
    //         }
    // }
    
    echo json_encode( $todosLasEstaciones );

$mysqli->close();

?>
