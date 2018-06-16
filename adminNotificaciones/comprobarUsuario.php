<?php

session_start(); 
include ("./../lib/conexion.php"); 
$email = $_REQUEST["email"]; 
$passwordUsuario = $_REQUEST["password"]; 

//comprobamos que el usuario exista en la bbdd 
$sql = 'SELECT * FROM tokens WHERE email like "'.$email.'" AND password like "'.$passwordUsuario.'"';

$consulta = mysqli_query ($mysqli,$sql) or die(mysql_error());
$numrow=mysqli_num_rows($consulta);

// la consulta nos devuelve un registro o ninguno por eso hacemos comprobacion de numero de registros para redirigir
//echo $numrow;

if($numrow<= 0){ 	
    // nos redirige si no hay usuarios con ese usuario
    header("Location: loginPush.php?er=no existe el usuario");
} 
else{  
    $_SESSION['misesion']="1";     
    header("Location: panel.php");
    // si existe lo mandamos al panel de notificaciones
} 

?>  