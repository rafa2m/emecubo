<?php   

/*
Base de datos
db740581726
Descripción
notificacionespush

Nombre de host
db740581726.db.1and1.com

Puerto
3306
Nombre de usuario
dbo740581726
Tipo y versión
MySQL 5.5

*/
//$consulta="select * from tabla where campo=".$campo;

$mysqli = new mysqli("db732013555.db.1and1.com", "dbo732013555", "Pa56word", "db732013555");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE City") === TRUE) {
    printf("Table myCity successfully created.\n");
    
}

// $consulta="SELECT * FROM `reglaaviso`";
$consulta="SELECT `valor` FROM `medidasensor` WHERE `nombre` ='A'";
$condicion =0;
/* Select queries return a resultset */

if ($result = $mysqli->query($consulta)) {
    printf("Select returned %d rows.\n", $result->num_rows);
    $contador =0;
    while ($res = $result->fetch_assoc()) {
        
        // $consulta="SELECT * FROM `reglaaviso`";
        // echo 'fecha_creada =>'.$res['fecha_creada'] . 'periodicidad_incidencia=> ' . $res['periodicidad_incidencia'].' secuencial=>'. $res['secuencial'].' estado=> ' . $res['estado'].' observacion=> ' . $res['observacion'].' email=> ' . $res['email'];
        $valor= $res['valor'];
        echo 'contador => '.$contador.' valor =>'.$valor.'<br>';
        
        if($valor== $condicion){
            $contador+=1;
            if ($contador ==10){
                echo "ha llegado al limite";
                include "enviarMail.php";
            }       
        }

        
    }
    /* free result set */
    $result->close();
}

/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
if ($result = $mysqli->query("SELECT * FROM City", MYSQLI_USE_RESULT)) {

    /* Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error */
    if (!$mysqli->query("SET @a:='this will not work'")) {
        printf("Error: %s\n", $mysqli->error);
    }
    $result->close();
}

$mysqli->close();

        // echo "<ul>\n";
        // while ($res = $resultado->fetch_assoc()) {
        //     // echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $usuario['usuario_id'] . "'>\n";
        //     echo $res['fecha_creada'] . ' ' . $res['periocidad_incidencia'];
        //     echo "</a></li>\n";
        // }
        // echo "</ul>\n";



?>