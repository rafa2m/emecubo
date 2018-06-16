<?php
//me tienen que copiar 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    // mensaje que vamos a enviar
    $from = "emecubo@extremepromotionsproject.xyz";
    $to = "javiealiaga@gmail.com";
    $subject = "Enviado desde el crontab!  en su estación";
    $message = "Hola $to,\n \nHa saltado una alerta desde su estación debido a una regla que creo. Por favor, acceda a su aplicación y revise los datos recogidos son correctos. \n\nSaludos,\nEmecubo\n";
    include "./../conexion.php";  
    $consulta ="SELECT email,fecha_creada FROM `reglaaviso` where estado=1";
    $arrayCorreos=[];
    $resultado = $mysqli->query($consulta);
        
        /* determinar el número de filas del resultado */
        $row_cnt = $resultado->num_rows;
       
               //comprobamos las incidencia como tantas haya
            while ($fila = $resultado->fetch_assoc()) {
                echo "-----------<br> ";
                echo "<br>regla creada=>".$fila['fecha_creada'];
                //sacamos cada fecha y comprobamos en tipo medida
                $fecha_creada = $fila['fecha_creada'];
                $consulta2 ="SELECT * FROM `tipomedidasensor` WHERE fechareglaaviso='$fecha_creada'";
                //SELECT * FROM `tipomedidasensor` WHERE fechareglaaviso='2018-06-10 10:57:28'
                if ($resultado = $mysqli->query($consulta2)) {
                    $row_cnt = $resultado->num_rows;
                    echo"sengundo bucle =>".$row_cnt;
                    while ($fila = $resultado->fetch_assoc()) {
                        $valores_error = $fila['valores_error'];
                        $nombreMedida = $fila['nombre'];
                        echo "<br> nombre de la medida =>".$nombreMedida;
                        
                        //comprobamos el codigo de errores previo 
                        //TODO split para pasar varios valores
                        switch ($valores_error) {
                            case 'negativos':
                            echo'negativos';
                                //INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES (CURRENT_DATE(), 'H', '2018-05-20 12:47:00', 'TH1t', '4', 'Aosong', 'DHT22', 'STC1', '-50');
                                // INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES (NOW(), 'T', '2018-05-20 12:47:00', 'TH1t', '4', 'Aosong', 'DHT22', 'STC1', '-50')

                                // filtramos los resultados con un intervalo de un día que es cada cuanto ejecutamos el crontab
                                $consulta3 ="SELECT valor,nombre FROM `medidasensor` WHERE valor<0 and nombre ='$nombreMedida' and fecha_medida > (NOW()-(NOW()-INTERVAL -1 DAY)) ";
                                if ($resultado = $mysqli->query($consulta3)) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        $valor = $fila['valor'];
                                        if($valor<0){
                                            echo "el valor es negativo ".$valor." - ".$fila['nombre']."<br>" ;
                                        }
                                    }
                                }
                                break;
                            case 'temperatura_alta':
                            echo "<br>";
                            echo "temperatura_alta";
                                //INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES (CURRENT_DATE(), 'H', '2018-05-20 12:47:00', 'TH1t', '4', 'Aosong', 'DHT22', 'STC1', '-50');
                                // INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) VALUES (NOW(), 'T', '2018-05-20 12:47:00', 'TH1t', '4', 'Aosong', 'DHT22', 'STC1', '-50')
                                $consulta3 ="SELECT valor,nombre FROM `medidasensor` WHERE valor>40 and nombre ='$nombreMedida' and fecha_medida > (NOW()-(NOW()-INTERVAL -1 DAY))";
                                if ($resultado = $mysqli->query($consulta3)) {
                                    while ($fila = $resultado->fetch_assoc()) {
                                        $valor = $fila['valor'];
                                        if($valor>40){
                                            echo "el valor es alto ".$valor." - ".$fila['nombre']."<br>" ;
                                        }
                                    }
                                }
                                break;
                            default:
                                echo "no hacemos nada";
                                break;
                        }
                    }
                }
                echo "<br>----------- ";
            }
        // for ($i = 0; $i<$row_cnt;$i++){
           
        //     echo "<br>";
        //     echo "ejecutamos el scirpt de comprobar creado el $fecha_creada";
        //     $consulta ="SELECT valor FROM `medidasensor`";

        //     if ($resultado = $mysqli->query($consulta)) {
        //             $contador=0;
        //     /* obtener un array asociativo */
        //             while ($fila = $resultado->fetch_assoc()) {
                        
        //                 $valor = $fila["valor"];
        //             // echo $valor."<br>".$contador." contador";
        //                 if($valor>="50" ){
        //                     $contador+=1;
        //                 }
        //                 if($valor>="20" && $contador==10){
        //                     $headers = "From:" . $from;
        //                 // mail($to,$subject,$message, $headers);
        //                 // echo "se ha enviado un mail a $to ";
        //                     $contador=0;
        //                 }
                        
        //             }
        //         /* liberar el conjunto de resultados */
        //         $resultado->free();
        //     }

        // }
    

    /* cerrar la conexión */
   $from = "alertas@emecubo.extremepromotionsproject.xyz";
    $to = "javiealiaga@gmail.com";
    $subject = "[include] Enviado desde el crontab![include]   en su estación";
    $message = "Hola $to,\n \nHa [include] saltado una alerta desde su estación debido a una regla que creo. Por favor, acceda a su aplicación y revise los datos recogidos son correctos. \n\nSaludos,\nEmecubo\n";
    include "./../conexion.php";  
    
    //mail('javiealiaga@gmail.com','Include cron mail','Test de envio por php mail lanzado desde crontab'); 
    $headers = "From:" . $from;

   
    $resultado = $mysqli->query($consulta);

   mail($to,$subject,$message, $headers);
     
?>