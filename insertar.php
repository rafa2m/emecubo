<?php 

//Formato URl para recibir la información
//https://final.extremepromotionsproject.xyz/insertar.php?e=sct1&t=10.00&h=20.00&pl=30.00&vv=40.95&dv=50&io=60.00

//Pintamos para ver que todo se recibe bien
echo "Estación: " . $_REQUEST['e'] ."<br> fecha de toma: " . $_REQUEST['t'] . ", humedad: " . $_REQUEST['h'] . ", agualluvia: " .$_REQUEST['pl'] . ", velocidadViento: " .$_REQUEST['vv'] . ", direccionViento: " .$_REQUEST['dv']  . ", intesidad luminica: " .$_REQUEST['io']  . "<br>";

$variableTemperatura = $_REQUEST['t'];
$variableHumedad=  $_REQUEST['h'] ;
$variablePluviomentro= $_REQUEST['pl'] ;
$variableVelocidadViento= $_REQUEST['vv'] ;
$variableDireccionViento= $_REQUEST['dv'];
$variableIntensidadOptica= $_REQUEST['io'];

echo $variableTemperatura ."<br>";
echo $variableHumedad ."<br>";
echo $variablePluviomentro ."<br>";
echo $variableVelocidadViento ."<br>";
echo $variableDireccionViento ."<br>";
echo $variableIntensidadOptica ."<br>";

require "conexion.php";
//echo date("d-m-Y H:i:s");

echo "<br>".gmdate('Y-m-d h:i:s ', time())."<br>";
$fecha =gmdate('Y-m-d h:i:s ', time());
echo $fecha;
echo "<br>";

//TH1t
//configuarcion sensor 2018-05-20 12:47:00
if (isset($_REQUEST['t'])){
 $consulta ="INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
 VALUES (NOW(), 'T', '2018-05-20 12:47:00', 'TH1t', '4', 'Aosong', 'DHT22', 'STC1', '".$variableTemperatura."')";
 $resultado = $mysqli->query($consulta);
 if($consulta->errno) die($consulta->error);

echo $resultado;
}

//TH1h
//configuarcion sensor 2018-05-20 12:47:00
if (isset($_REQUEST['h'])){
$consulta = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`)
 VALUES (NOW(), 'H', '2018-05-20 12:47:00', 'TH1h', '5', 'Aosong', 'DHT22', 'STC1', '".$variableHumedad."')";

$resultado = $mysqli->query($consulta);
if ($consulta->errno) {
    die($consulta->error);
}


echo $resultado;
}
//PL1
//configuarcion sensor 2018-05-20 12:47:00
if (isset($_REQUEST['pl'])){
$consulta = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
VALUES (NOW(), 'P', '2018-05-20 12:44:00', 'PL1', '3', 'Sparkfun', 'SEN-08942', 'STC1', '".$variableVelocidadViento."')";

$resultado = $mysqli->query($consulta);
if ($consulta->errno) {
    die($consulta->error);
}

// /
echo $resultado;
}
//AC1
//configuarcion sensor 2018-05-20 12:47:00
if (isset($_REQUEST['vv'])){
$consulta = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
VALUES (NOW(), 'A', '2018-05-20 12:44:00', 'AC1', '2', 'Sparkfun', 'SEN-08942', 'STC1', '".$variableVelocidadViento."')";

$resultado = $mysqli->query($consulta);
if ($consulta->errno) {
    die($consulta->error);
}


echo $resultado;
}
//VV1
//configuarcion sensor 2018-05-20 12:44:00
if (isset($_REQUEST['dv'])){
$consulta = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
VALUES (NOW(), 'V', '2018-05-20 12:44:00', 'VV1', '1', 'Sparkfun', 'SEN-08942', 'STC1', '".$variableDireccionViento."')";

$resultado = $mysqli->query($consulta);
if ($consulta->errno) {
    die($consulta->error);
}


echo $resultado;
}
// IO1d
//configuarcion sensor 2018-05-20 12:44:00
if (isset($_REQUEST['io'])){
$consulta = "INSERT INTO `db732013555`.`medidasensor` (`fecha_medida`, `nombre`, `fechaconfigsensor`, `idsensor`, `tiposensor`, `marcasensor`, `modelosensor`, `idestacion`, `valor`) 
VALUES (NOW(), 'I', '2018-05-20 12:49:00', 'IO1d', '6', 'Rohm', 'BH1750FVI', 'STC1', '".$variableIntensidadOptica."')";

$resultado = $mysqli->query($consulta);
if ($consulta->errno) {
    die($consulta->error);
}else {
    echo "todo ha salido bien";
}


echo $resultado;
}


?>