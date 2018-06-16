
<?php

include "../conexion.php";
//capturamos la variable de sessión uqe se ha creado en al pagina anterior para hacer la cosulta desde tiempo y optimizar la consulta
// y la pasamos ese valor de fecha como parametro
$fechaDeEntrada = $_REQUEST['fechaDeEntrada'];


$consulta ="SELECT * FROM medidasensor WHERE nombre = 'H' AND fecha_medida BETWEEN '".$fechaDeEntrada."' AND NOW() ORDER BY `fecha_medida` DESC limit 1";
//session_start();

if ($resultado = $mysqli->query($consulta)) {
    
    /* obtener un array asociativo */
    while ($fila = $resultado->fetch_assoc()) {
        
        $datetime = $fila["fecha_medida"];
        
        //parseamos la fecha que nos viene de la bbdd para usarla en la gráfica
        $time = date('H:i:s', strtotime($datetime));
        //printf("%s",$time);
        printf ("%s", $fila["valor"]);
        
    }

    /* liberar el conjunto de resultados */
    $resultado->free();
}

/* cerrar la conexión */
$mysqli->close();

?>