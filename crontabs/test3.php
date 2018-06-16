<?php
function envia_mail_embebido(){

// incluye la clase phpmailer.php
require_once "../lib/PHPMailer.php";

// crear una nueva instancia
$mail = new PHPMailer();

// dirección de correo desde la que se envía el mail
$mail->From = "alertas@emecubo.extremepromotionsproject.xyz";

//Nombre que aparecerá al recibir el correo
$mail->FromName = "Administrador";

//Asunto del mensaje
$mail->Subject = "[Emecubo Alerts] Enviamos mensaje ";

// a traves de este host (tome el host smtp que aparece en el archive php.ini)
$mail->Host = "smtp.1and1.es";

//con este puerto, desde php.ini si es que existe (de lo contrario se usa por defecto el 25)
$mail->Port = 25;

// Identificación en SMTP
$mail->SMTPAuth = true;
$mail->Username = "usuario";
$mail->Password = "clave";

//Direccines destino 
$mail->Sender="mail@seas.com";
$mail->AddReplyTo("respuesta@seas.com", "Responde a este mail");
$mail->AddAddress("otromail@seas.com");
$mail->AddBCC("copiaoculta@seas.es");

//Edición del contenido del mail.
$mail->IsHTML(true);

// adjunta files/imagen.jpg
$mail->AddEmbeddedImage(‘files/imagen.jpg’,’imagen’,’file/imagen.jpg’,’base64′,’image/jpeg’);
$mail->Body = file_get_contents(‘plantilla_html.html’);

// una vez construído todo el mensaje es momento de enviarlo.
if($mail->Send()){
echo "Envio adecuado";
}else{
echo "Error enviando: " . $mail->ErrorInfo;;
}
}   //Fin de la function.
?>