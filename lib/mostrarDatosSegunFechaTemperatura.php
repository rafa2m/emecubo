

<?php

include "../conexion.php";
//capturamos la variable de sessión uqe se ha creado en al pagina anterior para hacer la cosulta desde tiempo y optimizar la consulta
// y la pasamos ese valor de fecha como parametro
$fechaMedida = $_REQUEST['fechaMedida'];

// $consulta = "SELECT fecha_medida,valor FROM medidasensor where  fecha_medida = '".$fechaMedida."'";
$consulta = "SELECT fecha_medida,valor FROM medidasensor 
WHERE nombre like 'T' and fecha_medida BETWEEN '".$fechaMedida." 00:00:00' AND '".$fechaMedida." 23:59:59'";
//session_start();

if ($resultado = $mysqli->query($consulta)) {

    /* obtener un array asociativo */
    while ($fila = $resultado->fetch_assoc()) {

        $datetime = $fila["fecha_medida"];
        $todosLasEstaciones[] = $fila;
        //parseamos la fecha que nos viene de la bbdd para usarla en la gráfica
        $time = date('H:i:s', strtotime($datetime));
        //printf("%s",$time);
       // printf("%s - %s", $fila["fecha_medida"],$fila["valor"]);

    }

    /* liberar el conjunto de resultados */
    $resultado->free();
}

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

echo json_encode( $todosLasEstaciones );
exit();




/* cerrar la conexión */
$mysqli->close();

?>