<?php

session_start(); 
include ("./../lib/conexion.php"); 
$email = $_REQUEST["email"]; 
$passwordUsuario = $_REQUEST["password"]; 
echo $email."<br>";
echo $passwordUsuario."<br>";

//comprobamos que el usuario exista en la bbdd SELECT * FROM tipousuario WHERE email = 'javiealiaga@gmail.com' AND password = 'piramide'

//$sql = "SELECT * FROM usuarios WHERE email like 'javiealiaga@gmail.com' AND password like 'piramide'";
//$sql = "SELECT * FROM usuarios WHERE email like '".$email."' AND password like '".$password."'";
$sql = 'SELECT * FROM usuarios WHERE email like "'.$email.'" AND password like "'.$passwordUsuario.'"';
echo "sql =>" . $sql;
$consulta = mysqli_query ($mysqli,$sql) or die(mysql_error());

$numrow=mysqli_num_rows($consulta);

// la consulta nos devuelve un registro o ninguno por eso hacemos comprobacion de numero de registros para redirigir
echo $numrow;
if($numrow<= 0){ 	
    // nos redirige si no hay usuarios con ese usuario
    header("Location: loginPush.php?er=no existe el usuario");
        
} 
else{  
    // si existe lo mandamos al panel de notificaciones
    $_SESSION['misesion']="1";     
    header("Location: panel.php");
} 
?>  