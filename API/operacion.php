<?php

header('Content-Type: application/json');

$username = "root";
$password = "";
$hostname = "localhost";

$dbhandle = mysql_connect($hostname, $username, $password)
or die("No es posible conectarse a MySQL");

$seleccion = mysql_select_db("emecubo")
or die("Base de datos no disponible");


function mostrar()
{

    $resultado = mysql_query("SELECT tipo,id,marca,canal,tipo_comunicacion,formato_integracion,canal,estado,potencia_soportada FROM sensor");

    while ($fila = mysql_fetch_array($resultado)) {
        $todosLosID[] = $fila;
    }

    return $todosLosID;
}

if ($_GET["op"] == "suma") {
    echo "La suma es " . ($_GET["op1"] + $_GET["op2"]);
}
if ($_GET["op"] == "resta") {
    echo "La reata es " . ($_GET["op1"] - $_GET["op2"]);
}
if ($_GET["op"] == "multiplicacion") {
    echo "La multiplicacion es " . ($_GET["op1"] * $_GET["op2"]);
}
if ($_GET["op"] == "division") {
    echo "La diviison es " . ($_GET["op1"] / $_GET["op2"]);
}
if ($_GET["op"] == "hola") {
    echo "bienvenido sr/sra " . ($_GET["op1"] . " " . $_GET["op2"]);
}
if ($_GET["op"] == "dame") {

    if ($_GET["op1"] == "sensor"){
        echo "Sensor =>>: " . ($_GET["op1"])." ". ($_GET["op2"]);
    }
    //echo "respuesta de obtener: " . ($_GET["op1"])." ". ($_GET["op2"]);
    if (($_GET["op1"]) && (!is_string($_GET["op2"]))  ){
        echo "respuesta de obtener: " . ($_GET["op1"])." ". ($_GET["op2"]);
    }
    if (($_GET["op1"]) && (is_numeric($_GET["op2"])) && (isset($_GET["op3"])) ){
        echo "respuesta de obtener: " . ($_GET["op1"])." ". ($_GET["op2"]." ". ($_GET["op3"]));
    }
    

}
if ($_GET['op'] == 'inserta') {

    echo "insertamos datos en la bbdd: " . ($_GET["op1"]. " " . $_GET["op2"]);
} 

