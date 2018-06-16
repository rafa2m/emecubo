<?php

    define('SERVER_API_KEY','AIzaSyBhuVpm_bCFLQia9Nkn2Hg3rJSYQu27SHQ');

    require '../lib/DbConnect.php';

    $db = new DbConnect;
    $conn = $db->connect();
    $stmt = $conn-> prepare ('SELECT * FROM tokens');
    $stmt->execute();
    $tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $tokens = ['eYrBvp4i2oM:APA91bFYjb8XtP0pY77Ab9_geWkyXEA9GXkEPkxGTK3TOcsVFrmg9avDr0ej4XJvuKmn8tkxtr6owv7LtYIuprLzQXWpW0tn0iHuqONgFEE948ZzduA_LMDsa85VnRHCORXh19J0ABqj'];
    //print_r($tokens);
    foreach ($tokens as $token){
        $registrationIds[]=$token['token'];
    }
    //print_r($registrationIds);exit;
    $header = [
        'Authorization: Key=' .SERVER_API_KEY,
        'Content-Type: Application/json'

    ];
    // include "./../conexion.php";
    $titulo = $_REQUEST['titulo'];
    $cuerpo = $_REQUEST['cuerpo'];
    $icono = $_REQUEST['icono'];
    $imagen = $_REQUEST['image'];

    //estas propiedades salen cuando estamos en la pantalla principal y no en background que tira del sw.js
    $msg = [
        'title' => $titulo,
        'body' => $cuerpo,
        'icon' => $icono,//$icon,'img/icon180.png'
        'image' => $imagen,
        'eventTime' => 5000

    ];

    $payload=[
        'registration_ids' => $registrationIds,
        'data'             => $msg
    ];



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
