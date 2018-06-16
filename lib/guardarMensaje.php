<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<?php


    $titulo = $_REQUEST['titulo'];
    $mensaje = $_REQUEST['mensaje'];
    $enlace = $_REQUEST['enlace'];
    echo $titulo;
    echo $mensaje;
    echo $enlace;
   // echo $titulo;
    //echo $mensaje;
    //$mensaje ="Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.";
    //$titulo = "Esto es un titulo para notificacion";
    require("conexion.php");

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    $upload_dir = '../adminNotificaciones/user_images/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    //echo $imgExt;

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
        // Check file size '5MB'
        if($imgSize < 5000000)    {
        move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else{
        echo $errMSG = "Sorry, your file is too large.";
        }
    }
    else{
        echo $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    //$sql= "insert into mensajes (titulo,mensaje,imagen_url) value('".$titulo."','".$mensaje."')";
    $sql= "insert into mensajes (titulo,mensaje,imagen_url,enviado) values('".$titulo."','".$mensaje."','https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/user_images/".$userpic."','0')";
    //$sql= "insert into mensajes (titulo,mensaje) value('".$titulo."','".$mensaje."')";


    //capturamos si hubiera algún error
    $result_cont = mysqli_query($mysqli,$sql) or die( mysqli_error($mysqli));
    //echo $result_cont;

    if ($result_cont == 1){
     // echo "entra";
      ?>
      <script type="text/javascript">
      function lee(){

       $.ajax({
          url: 'https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/send.php?titulo=<?php echo $titulo;?>&cuerpo=<?php echo $mensaje;?>&icono=https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/user_images/<?php echo $userpic;?>&image=https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/user_images/<?php echo $userpic;?>&enlace=<?php echo $enlace;?>',
          method: 'POST'
        }).done(function(result){
          console.log(result);
          window.location.replace("https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/adminPush.php?er=7");
        })
      }
      lee();
      </script>

      <?php

        // $sql= "select titulo,mensaje,imagen_url from mensajes limit 1";
        // //capturamos si hubiera algún error
        // $result_cont = mysqli_query($mysqli,$sql) or die( mysqli_error());
        // echo $result_cont[''];

//        header("location: https://emecubo.extremepromotionsproject.xyz/adminNotificaciones/adminPush.php?er=7");
        //header("Refresh:0; url=../adminNotificaciones/adminPush.php?er=7");

    }


?>
