<?php

    // KEY de firebase cloud => Clave de servidor heredada

    define('SERVER_API_KEY','AIzaSyBhuVpm_bCFLQia9Nkn2Hg3rJSYQu27SHQ');

    // conexion a la bbdd para traernos los id de registro(tokens) que tenemos guardados
    require '../lib/DbConnect.php';

    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn-> prepare ('SELECT * FROM tokens');
    $stmt->execute();
    $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // recorremos y almacenamos los ids en el array
    foreach ($tokens as $token){
        $registrationIds[]=$token['token'];
    }

    // inicializamos la cabecera del curl
    $header = [
        'Authorization: Key=' .SERVER_API_KEY,
        'Content-Type: Application/json'

    ];

    // recogemos los valores en variables
    $titulo = $_REQUEST['titulo'];
    $cuerpo = $_REQUEST['cuerpo'];
    $icono = $_REQUEST['icono'];
    $imagen = $_REQUEST['image'];
    $click_action=$_REQUEST['enlace'];
    //$click_action='https://www.google.es';

    // creamos un array asociativo para pasar la data en el curl.
    // estas propiedades salen cuando estamos en la pantalla principal y no en background que usa del sw.js
    $msg = [
        'title' => $titulo,
        'body' => $cuerpo,
        'click_action' => $click_action,
        'icon' => $icono,//$icon,'img/icon180.png'
        'image' => $imagen

    ];

    // campos necesarios para el envio del curl
    $payload=[
        'registration_ids' => $registrationIds,
        'data'             => $msg
    ];


    // creamos el curl a ejecutar
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode( $payload ) ,
      CURLOPT_HTTPHEADER => $header
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

?>
