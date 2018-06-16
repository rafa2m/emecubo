<?php



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
    if($_REQUEST['medidas']=='sensor'){
       // echo "asdfdas";
        if(isset($_GET['de'])){
            //https://final.extremepromotionsproject.xyz/API/obtener/sensor/H
            // http://emecubo.extremepromotionsproject.xyz/API/obtener/sensor/sa1    
            $res = $mysqli->query("SELECT fecha_medida,nombre,fechaconfigsensor,idsensor,tiposensor,marcasensor,modelosensor,idestacion,valor from medidasensor where nombre='".$_GET['de']."'");
        

            while($row = $res->fetch_object()){
                $todosLasEstaciones[] = $row;
            }
        }
    }
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
    if($_REQUEST['medidas']=='configsensor'){
            //echo "hola";
            if(isset($_GET['de'])){
                
                     
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/configsensor/AN1  
                    $res = $mysqli->query("select id as id_solicitado, fechahora,tipo,marca,modelo,idestacion,altura,calibracion,offset,slope,fechafinconfig from configuracionsensor 
                    WHERE `id` = '".$_GET['de']."'");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                
            }
            
    }
    if($_REQUEST['medidas']=='configsensor_regla'){
            //echo "hola";
            if(isset($_GET['de'])){
                
                     
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/configsensor_regla/AN1  
                    $res = $mysqli->query("select idsensor,fechareglaaviso, T2.periodicidad_incidencia, T2.secuencial, T2.estado,T2.email, T2.observacion from 
                    tipomedidasensor T1 inner join reglaaviso T2 on T1.fechareglaaviso = T2.fecha_creada 
                    WHERE `idsensor` = '".$_GET['de']."'");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                
            }
            
    }
    if($_REQUEST['medidas']=='configestacion'){
            //echo "hola";
            if(isset($_GET['de'])){
                
                     
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/configestacion/STC1  
                    $res = $mysqli->query("select fechahora,id tipo, marca,modelo,idestacion from configuracionsensor
                    WHERE `idestacion` = '".$_GET['de']."'");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                
            }
            
    }
    if($_REQUEST['medidas']=='estacion'){
            //echo "hola";
            if(isset($_GET['de'])){
                
                      
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/estacion/STC1  
                    $res = $mysqli->query("select id,longitud,latitud,altura,fecha,nombre_corto,observacion,altitud,idlogger from estacion
                    WHERE `id` = '".$_GET['de']."'");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                
            }
            
    }
    if($_REQUEST['medidas']=='avisos'){
            //echo "hola";
            if(isset($_GET['de'])){
                
                     
                    // http://emecubo.extremepromotionsproject.xyz/API/obtener/avisos/javiealiaga@gmail.com  
                    $res = $mysqli->query("select email,estado, fecha_Creada, observacion,periodicidad_incidencia,secuencial, 
                    fecha_incidencia as Tabla_INCIDENCIA ,detalles,resultado,fechareglaaviso
                    from reglaaviso T1
                    inner join incidencia T2 ON T1.fecha_creada = T2.fechareglaaviso WHERE `email` = '".$_GET['de']."'");
                    
                    while($row = $res->fetch_object()){
                        $todosLasEstaciones[] = $row;
                    }
                
            }
            
    }
    //else primero     
    else {

        //cho "errrooRRR!!!";
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
    
    //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
    
    //echo json_encode($jsondata);
    //$todosLasEstaciones = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($todosLasEstaciones));
    
// header('Content-type: application/json; charset=UTF-8');
// echo json_encode( $todosLasEstaciones );
// let myHeader = new Headers();
// myHeader.append('Accept', 'application/json');
// myHeader.append('Content-Type', 'application/json; charset=UTF-8');
// myHeader.append('Access-Control-Allow-Origin', '*');


header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

echo json_encode( $todosLasEstaciones );
exit();



$mysqli->close();

?>
