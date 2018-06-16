<?php
    $regId = $_REQUEST["regId"];
    $name = $_REQUEST["name"];
    echo $regId;
    echo $name;
    $time = date("Y-m-d H:i:s");
    echo $time;
    $latitud = $_REQUEST["latitude"];
    $longitud = $_REQUEST["longitude"];
    echo $latitud;
    echo $longitud;
    
    
    //require("Mobile_Detect.php");
    // Include or require the Mobile_Detect.php file from mobiledetect.net
    require_once 'lib/Mobile_Detect.php';

    // Include or require the class file
    require_once 'lib/detect.php';
    $detect = new Mobile_Detect;
 // Gets the device type ('Computer', 'Phone' or 'Tablet')
    $dispositivo = strtolower(Detect::deviceType());
    // Get the IP address of the device
    $ip = Detect::ip();


    // Any mobile device (phones or tablets).
    if ( $detect->isMobile() ) {
    
    }
    
    // Any tablet device.
    if( $detect->isTablet() ){
    
    }
    
    // Exclude tablets.
    if( $detect->isMobile() && !$detect->isTablet() ){
    
    }
    
   

    require("conexion.php");
    $sql= "select * from usuarios where regId like '" . $regId ."'";
    $result_cont = mysqli_query($mysqli,$sql);
    //echo "result_cont".$result_cont;
    $row_cnt = mysqli_num_rows($result_cont);
   // echo "row_cnt".$row_cnt;
    if($row_cnt==0){
        $sql= "insert into usuarios (regId,dispositivo,ip,fecha,latitud,longitud) 
        value('$regId','$dispositivo','$ip','$time','$latitud','$longitud')";
        mysqli_query($mysqli,$sql);
    }
    

?>