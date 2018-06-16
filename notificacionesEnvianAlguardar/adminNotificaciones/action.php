<?php


if(isset($_POST['token'])){
      require '../lib/DbConnect.php';
      require_once '../lib/Mobile_Detect.php';
      require_once '../lib/detect.php';
      $detect = new Mobile_Detect;
      $dispositivo = strtolower(Detect::deviceType());
      $ip = Detect::ip();
      if ( $detect->isMobile() ) {
      }
      if( $detect->isTablet() ){
      }
      if( $detect->isMobile() && !$detect->isTablet() ){
      }
      $db = new DbConnect;
      $conn = $db->connect();
      $cdate =date("Y-m-d H:i:s");
      $stmt = $conn->prepare("INSERT INTO tokens(token,dispositivo,ip,created_date,latitud,longitud) VALUES(:token, :disp, :ip, :cdate, :lat, :lon)");
      $stmt->bindParam(':token', $_POST['token']);
      $stmt->bindParam(':cdate', $cdate);
      $stmt->bindParam(':lat', $_POST['latitude']);
      $stmt->bindParam(':lon', $_POST['longitude']);
      $stmt->bindParam(':disp', $dispositivo);
      $stmt->bindParam(':ip', $ip);

      if($stmt->execute()){
          echo 'Token guardado...';
      }else{
          echo 'Fallo al guardar';
      }
    }
?>
