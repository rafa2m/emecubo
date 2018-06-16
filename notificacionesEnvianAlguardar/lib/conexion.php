<?php

// Establecemos variables
$username = "notificaciones";
$password = "e1dCs@41";
$hostname = "desarrollando-web.es";
$dbname = "notificaciones";

// Realizamos la conexión a la bbdd
$mysqli = new mysqli($hostname, $username, $password, $dbname);
$mysqli->set_charset("utf8");

?>