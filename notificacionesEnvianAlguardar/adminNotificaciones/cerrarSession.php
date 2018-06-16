<?php
//removemos todas las variables de session
session_start();

session_unset();
//unset($_SESSION['misession']);
//destruimos la session
session_destroy();

header("location: loginPush.php");
?>