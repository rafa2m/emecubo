<?php
    $regId = $_REQUEST["regId"];
    echo $regId;
    
    require("conexion.php");
    $sql= "select * from usuarios where regId like '" . $regId ."'";
    $result_cont = mysqli_query($mysqli,$sql);
    //echo "result_cont".$result_cont;
    $row_cnt = mysqli_num_rows($result_cont);
   // echo "row_cnt".$row_cnt;
    if($row_cnt>0){
        echo "se ha borrado el usuario";
        $sql= "delete from usuarios WHERE regId = '".$regId."'";
        mysqli_query($mysqli,$sql);
    }else {
        echo "el usuario no existe en la bbdd";
    }
    

?>