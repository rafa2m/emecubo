<?php
// remove all session variables
session_start();

session_unset();

// destroy the session
session_destroy();
header("location: page-login.php");
?>

<!-- <script type="text/javascript">
location.href ="https://pwa.desarrollando-web.es/FireBoot/page-login.php";
</script> -->
