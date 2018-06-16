<?php 
// mensaje que vamos a enviar
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