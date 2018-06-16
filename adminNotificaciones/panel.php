<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css" >
</head>
<body>
<?php
//si la variable de sesion existe y su valor es 1 mostramos contenido deseado sino volvemos al login
if(isset($_SESSION['misesion']) && $_SESSION['misesion']=="1"){
    include "adminPush.php";
}else {
   header("location: loginPush.php");
}
?>    
</body>
</html>

