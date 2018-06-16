<?php

// Establecemos variables
$username = "dbo732013555";
$password = "Pa56word";
$hostname = "db732013555.db.1and1.com";
$dbname = "db732013555";

// Realizamos la conexión a la bbdd
$mysqli = new mysqli($hostname, $username, $password, $dbname);
$mysqli->set_charset("utf8");

?>